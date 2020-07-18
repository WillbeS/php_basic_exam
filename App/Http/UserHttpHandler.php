<?php

namespace App\Http;

use App\Data\ProfileDTO;
use App\Data\UserDTO;
use App\Service\Offer\OfferServiceInterface;
use App\Service\User\UserServiceInterface;
use Core\DataBinderInterface;
use Core\SessionInterface;
use Core\TemplateInterface;
use Exception\AppException;

class UserHttpHandler extends HttpHandlerAbstract
{
    /**
     * @var UserServiceInterface
     */
    private $userService;

    public function __construct(TemplateInterface $template,
                                DataBinderInterface $dataBinder,
                                SessionInterface $session, 
                                UserServiceInterface $userService)
    {   
        parent::__construct($template, $dataBinder, $session);

        $this->userService = $userService;
    }

    public function index()
    {
        $this->render("home/index");
    }

    public function profile(OfferServiceInterface $offerService)
    {
        $currentUser = $this->getCurrentUser($this->userService);

        $profileDTO = $offerService->getAllByUser($currentUser->getId());

        $profileDTO->setUser($currentUser);

        $this->render("users/profile", $profileDTO);
    }

    public function login(array $formData = [])
    {
        if (isset($formData['login'])) {
            $this->handleLoginProcess($formData);
        } else {
            $this->render("users/login", new UserDTO());
        }
    }

    public function register(array $formData = [])
    {
        if (isset($formData['register'])) {
            $this->handleRegisterProcess($formData);
        } else {
            $this->render("users/register", new UserDTO());
        }
    }

    private function handleRegisterProcess($formData)
    {  
        $user = new UserDTO();

        try {
            $this->dataBinder->bind($formData, $user);
            $this->userService->register($user, $formData['confirm_password']);

            $this->session->addMessage("{$user->getFullName()}, welcome to our shelf");
            $this->redirect("login.php");
        } catch (AppException $e) {
            $this->session->addError($e->getMessage());
            $this->render('users/register', $user);
        }
    }

    private function handleLoginProcess($formData)
    {
        $loginData = new UserDTO();
        
        try {
            $this->dataBinder->bind($formData, $loginData);
            $user = $this->userService->login($loginData->getEmail(), $loginData->getPassword());
            $this->session->setUserId($user->getId());
            $this->session->setUsername($user->getFullName());
            $this->redirect("profile.php");
        } catch (AppException $e) {
            $this->session->addError($e->getMessage());
            $this->render(
                "users/login",
                $loginData,
                [$e->getMessage()]
            );
        }
    }
}