<?php

namespace App\Http;

use App\Data\CreateOfferDTO;
use App\Data\OfferDTO;
use App\Data\UserDTO;
use App\Service\Brand\BrandServiceInterface;
use App\Service\Offer\OfferServiceInterface;
use App\Service\User\UserServiceInterface;
use Core\DataBinderInterface;
use Core\SessionInterface;
use Core\TemplateInterface;
use Exception\AppException;

class OfferHttpHandler extends HttpHandlerAbstract
{
    /**
     * @var UserServiceInterface
     */
    private $userService;

    /**
     * @var OfferServiceInterface
     */
    private $offerService;

    /**
     * @var BrandServiceInterface
     */
    private $brandService;

    public function __construct(
        TemplateInterface $template,
        DataBinderInterface $dataBinder,
        SessionInterface $session,
        UserServiceInterface $userService,
        OfferServiceInterface $offerService,
        BrandServiceInterface $brandService
    ) {
        parent::__construct($template, $dataBinder, $session);

        $this->userService = $userService;
        $this->offerService = $offerService;
        $this->brandService = $brandService;
    }

    public function create(array $postData = [])
    {
        $currentUser = $this->getCurrentUser($this->userService);

        if (isset($postData['create_offer'])) {
            $this->handleCreateProccess($postData, $currentUser);
        } else {
            $brands = $this->brandService->getAll();
            $createOfferDTO = new CreateOfferDTO();
            $createOfferDTO->setBrands($brands);

            $this->render("offers/create", $createOfferDTO);
        }
    }

    private function handleCreateProccess(array $formData, UserDTO $user)
    {
        $offer = new OfferDTO();

        try {
            $this->dataBinder->bind($formData, $offer);
            $brand = $this->brandService->getOneById($formData['brand_id']);
            $offer->setBrand($brand)->setUser($user);
            $this->offerService->add($offer);
            $this->redirect("profile.php");
        } catch (AppException $e) {
            $this->session->addError($e->getMessage());

            $brands = $this->brandService->getAll();
            $createOfferDTO = new CreateOfferDTO();
            $createOfferDTO->setBrands($brands);
            $this->render("offers/create", $createOfferDTO);
        }
    }
}
