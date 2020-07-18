<?php

namespace Core;


class Template implements TemplateInterface
{
    const TEMPLATE_FOLDER = "App/Template/";
    const TEMPLATE_EXTENSION = ".php";

    public function render(string $templateName, 
                            $data = null, 
                            array $messages = [], 
                            array $errors = [], 
                            string $username = null): void
    {
        require_once self::TEMPLATE_FOLDER
            . $templateName
            . self::TEMPLATE_EXTENSION;
    }
}