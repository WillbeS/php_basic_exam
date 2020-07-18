<?php

namespace Core;


interface DataBinderInterface
{
    /**
     * @param array $formData
     * @param object $object
     */
    public function bind(array $formData, $object,bool $saveFirstError = true);
}