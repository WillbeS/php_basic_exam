<?php

namespace App\Service\Offer;

use App\Data\OfferDTO;
use App\Data\ProfileDTO;
use App\Repository\Offer\OfferRepositoryInterface;

class OfferService implements OfferServiceInterface
{
    /**
     * @var OfferRepositoryInterface
     */
    private $offerRepository;

    public function __construct(OfferRepositoryInterface $offerRepository)
    {
        $this->offerRepository = $offerRepository;
    }

    /**
     * @param OfferDTO $offerDTO
     */
    public function add(OfferDTO $offerDTO)
    {
        $this->offerRepository->insert($offerDTO);
    }

    /**
     * @param OfferDTO $offerDTO
     */
    public function edit(OfferDTO $offerDTO)
    {
        $this->offerRepository->update($offerDTO);
    }

    /**
     * @param int $id
     */
    public function delete(int $id)
    {
        $this->offerRepository->delete($id);
    }

   
    public function getAllByUser(int $id): ProfileDTO
    {
        $profileDTO = new ProfileDTO;
        $offersGenerator = $this->offerRepository->findAllByUserId($id);

        $offers = [];
        $count = 0;
        $totalProfit = 0;

        foreach ($offersGenerator as $offer) {
            /** @var OfferDTO $offer */
            $offers[] = $offer;
            $count++;
            $totalProfit += $offer->getPrice();
        }

        return $profileDTO->setOffers($offers)
                    ->setCount($count)
                    ->setTotalProfit($totalProfit);
    }
}