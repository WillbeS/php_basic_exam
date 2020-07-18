<?php

namespace App\Http;

use App\Data\UserDTO;
use App\Service\User\UserServiceInterface;
use Core\DataBinderInterface;
use Core\SessionInterface;
use Core\TemplateInterface;
use Exception\AppException;

abstract class HttpHandlerAbstract
{
    /**
     * @var TemplateInterface
     */
    private $template;

    /**
     * @var DataBinderInterface
     */
    protected $dataBinder;

    /**
     * @var SessionInterface
     */
    protected $session;

    public function __construct(TemplateInterface $template,
                                DataBinderInterface $dataBinder, 
                                SessionInterface $session)
    {
        $this->template = $template;
        $this->dataBinder = $dataBinder;
        $this->session = $session;
    }

    public function render(string $templateName, $data = null) : void
    {
        $this->template->render(
            $templateName, 
            $data, 
            $this->session->getMessages(), 
            $this->session->getErrors(),
            $this->session->getUsername()
        );
    }

    public function redirect(string $url) : void
    {
        header("Location: $url");
    }

    protected function getCurrentUser(UserServiceInterface $userService): UserDTO
    {
        $currentUser = $userService->getCurrentUser();
        $this->assertLoggedIn($currentUser);
        
        return $currentUser;
    }

    protected function assertLoggedIn(UserDTO $currentUser)
    {
        if (!$currentUser) {
            $this->redirect('login.php');
        }
    }
}