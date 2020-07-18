<?php


namespace Core;

/**
 * Interface SessionInterface
 * @package Core
 */
interface SessionInterface
{
    /**
     * @param int $id
     * @return SessionInterface
     */
    public function setUserId(int $id): SessionInterface;

    /**
     * @return int|null
     */
    public function getUserId(): ?int;

    /**
     * @param string $name
     * @return SessionInterface
     */
    public function setUsername(string $name): SessionInterface;

    /**
     * @return string|null
     */
    public function getUsername(): ?string;

    /**
     * @return array
     */
    public function getMessages(): array;

    /**
     * @param string $message
     * @return SessionInterface
     */
    public function addMessage(string $message): SessionInterface;

    /**
     * @return array
     */
    public function getErrors(): array;

    /**
     * @param string $error
     * @return SessionInterface
     */
    public function addError(string $error): SessionInterface;
}
