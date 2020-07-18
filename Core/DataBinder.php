<?php

namespace Core;

use Exception\AppException;
use Exception\ValidationException;

class DataBinder implements DataBinderInterface
{

    public function bind(array $formData, $object, bool $saveFirstError = true)
    {
        $errors = [];

        foreach ($formData as $name => $value) {
            if (empty($value)) {
                continue;
            }

            $nameParts  = explode('_', $name);
            $methodName = 'set';

            foreach ($nameParts as $part) {
                $methodName .= ucfirst($part);
            }

            if (method_exists($object, $methodName)) {
                try {
                    $object->$methodName($value);
                } catch (ValidationException $exception) {
                    $errors[] = $exception->getMessage();
                }
            }
        }

        if (!empty($errors)) {
            if ($saveFirstError) {
                $message = $errors[0];
            } else {
                $message = "You have validation errors in your form: \n" . implode("\n", $errors);
            }
            
            throw new AppException($message);
        }

        return $object;
    }


    // /**
    //  * @param $formData
    //  * @param $className
    //  * @return mixed
    //  */
    // public function bind($formData, $className)
    // {
    //     $object = new $className();

    //     foreach ($formData as $key => $value) {
    //         $methodName = "set" . implode("",
    //                 array_map(function ($el) {
    //                     return ucfirst($el);
    //                 }, explode("_", $key)));

    //         if (method_exists($object, $methodName)) {
    //             $object->$methodName($value);
    //         }
    //     }
    //     return $object;
    // }
}