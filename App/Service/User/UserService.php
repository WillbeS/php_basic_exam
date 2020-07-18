<?php

namespace App\Service\User;


use App\Data\UserDTO;
use App\Repository\User\UserRepositoryInterface;
use App\Service\Encryption\EncryptionServiceInterface;
use Core\SessionInterface;
use Exception\AppException;

class UserService implements UserServiceInterface
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * @var EncryptionServiceInterface
     */
    private $encryptionService;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * UserDTO
     */
    private $currentUser;

    public function __construct(UserRepositoryInterface $userRepository,
                                EncryptionServiceInterface $encryptionService, 
                                SessionInterface $session)
    {
        $this->userRepository = $userRepository;
        $this->encryptionService = $encryptionService;
        $this->session = $session;
    }

    public function register(UserDTO $userDTO, string $confirmPassword)
    {
        if (null !== $this->userRepository->findOneByEmail($userDTO->getEmail())) {
            //var_dump('here');die;
            throw new AppException('The given email is already used!');
        }

        if (null !== $this->userRepository->findOneByFullName($userDTO->getFullName())) {
            throw new AppException('The given full name is already used!');
        }

        if($userDTO->getPassword() !== $confirmPassword){
            throw new AppException('The given passwords do not match!');
        }

        $hash = $this->encryptionService->hash($userDTO->getPassword());
        $userDTO->setPassword($hash);

        return $this->userRepository->insert($userDTO);
    }

    public function login(string $username, string $password): UserDTO
    {
        $userFromDB = $this->userRepository->findOneByEmail($username);

        if(null === $userFromDB){
            throw new AppException(
                'There is no such user registered with that email!'
            );
        }

        if(false === $this->encryptionService->verify($password, $userFromDB->getPassword())){
           throw new AppException('Invalid Password!');
        }

        return $userFromDB;
    }

    public function getCurrentUser(): ?UserDTO
    {
        if(!$this->session->getUserId()) {
            return null;
        }

        if (!$this->currentUser) {
            $this->currentUser = $this->userRepository->findOneById($this->session->getUserId());
        }

        return $this->currentUser;
    }
}