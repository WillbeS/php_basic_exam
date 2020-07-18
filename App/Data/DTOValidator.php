<?php

namespace App\Data;

use Exception\ValidationException;

class DTOValidator
{
    /**
     * @param $min
     * @param $max
     * @param $value
     * @param $type
     * @param $fieldName
     * @throws \Exception
     */
    public static function validate($min, $max, $value, $type, $fieldName)
    {
        if ($type === "text") {
            if (mb_strlen($value) < $min || mb_strlen($value) > $max) {
                throw new ValidationException("{$fieldName} must be between $min and $max characters!");
            }
        } else if ($type == "number") {
            if (is_numeric($value)) {
                if ($value < $min || $value > $max) {
                    throw new ValidationException("{$fieldName} must be between $min and $max!");
                }
            } else {
                throw new ValidationException("Please enter number!");
            }
        }
    }

    public static function validateDate($date, $fieldName, $format = 'Y-m-d')
    {
        $d = \DateTime::createFromFormat($format, $date);
        // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
        if ($d && $d->format($format) === $date) {
            throw new ValidationException("$fieldName is not a valid date.");
        }
    }
}
