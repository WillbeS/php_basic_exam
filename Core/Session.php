<?php


namespace Core;

/**
 * Class Session
 * @package Core
 */
class Session implements SessionInterface
{

    public function setUserId(int $id): SessionInterface
    {
        $_SESSION['userId'] = $id;

        return $this;
    }

    public function getUserId(): ?int
    {
        if (isset($_SESSION['userId'])) {
            return $_SESSION['userId'];
        }

        return null;
    }

    public function setUsername(string $name): SessionInterface
    {
        $_SESSION['name'] = $name;

        return $this;
    }

    public function getUsername(): ?string
    {
        if (isset($_SESSION['name'])) {
            return $_SESSION['name'];
        }

        return null;
    }



    public function getMessages(): array
    {
        if (!isset($_SESSION['messages'])) {
            $_SESSION['messages'] = [];
        }

        $messages = $_SESSION['messages'];
        $_SESSION['messages'] = [];

        return $messages;
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        if (!isset($_SESSION['errors'])) {
            $_SESSION['errors'] = [];
        }

        $errors = $_SESSION['errors'];
        $_SESSION['errors'] = [];

        return $errors;
    }

    /**
     * @param string $message
     * @return SessionInterface
     */
    public function addMessage(string $message): SessionInterface
    {
        $_SESSION['messages'][] = $message;

        return $this;
    }

    /**
     * @param string $error
     * @return SessionInterface
     */
    public function addError(string $error): SessionInterface
    {
        $_SESSION['errors'][] = $error;

        return $this;
    }
}
