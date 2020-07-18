<?php

namespace App\Repository\Offer;

use App\Data\BrandDTO;
use App\Data\OfferDTO;
use App\Data\UserDTO;
use App\Repository\RepositoryAbstract;

class OfferRepository extends RepositoryAbstract implements OfferRepositoryInterface
{
    /**
     * @param OfferDTO $offerDTO
     */
    public function insert(OfferDTO $offerDTO)
    {
        $this->db->query(
            "INSERT INTO offers
                (name, price, image_url, description, brand_id, user_id)
            VALUES
                (?, ?, ?, ?, ?, ?)
            "
        )->execute([
            $offerDTO->getName(),
            $offerDTO->getPrice(),
            $offerDTO->getImageUrl(),
            $offerDTO->getDescription(),
            $offerDTO->getBrand()->getId(),
            $offerDTO->getUser()->getId()
        ]);
    }

    /**
     * @param OfferDTO $offerDTO
     */
    public function update(OfferDTO $offerDTO)
    {
        $this->db->query(
            "UPDATE items
             SET
                name = ?, 
                price = ?, 
                image_url = ?, 
                description = ?, 
                brand_id =?, 
                user_id = ?
            WHERE 
                id = ?
        "
        )->execute([
            $offerDTO->getName(),
            $offerDTO->getPrice(),
            $offerDTO->getImageUrl(),
            $offerDTO->getDescription(),
            $offerDTO->getBrand()->getId(),
            $offerDTO->getUser()->getId(),
            $offerDTO->getId()
        ]);
    }

    /**
     * @param int $id
     */
    public function delete(int $id)
    {
        $this->db->query("DELETE FROM offers WHERE id = ?")
        ->execute([$id]);
    }


    public function findAllByUserId(int $id): \Generator
    {
        $rows = $this->db->query(
            "SELECT
                o.id as offerId,
                o.name,
                o.price,
                o.image_url,
                b.id as brandId,
                b.brand as brandName
            FROM
                offers AS o
            INNER JOIN
                brands AS b
            ON
                o.brand_id = b.id
            WHERE 
                o.user_id = ?
            ORDER BY
                o.price DESC
            "
        )->execute([$id])
        ->fetchAssoc();
        
        foreach($rows as $row) {
            //var_dump($row);die;
            yield $this->lazyLoadItem($row, false, true);
        }
    }

    private function lazyLoadItem(array $row, bool $hasUser, bool $hasBrand): OfferDTO
    {
        /** @var OfferDTO $offer  */
        $offer = ($this->dataBinder->bind($row, new OfferDTO()))->setId($row['offerId']);

        if ($hasUser) {
            /** @var UserDTO $user  */
            $user = $this->dataBinder->bind($row, new UserDTO());
            $user->setId($row['userId']);
            $offer->setUser($user);
        }

        if ($hasBrand) {
            /** @var BrandDTO $brand  */
            $brand = $this->dataBinder->bind($row, new BrandDTO());
            $brand->setId($row['brandId']);
            $brand->setBrand($row['brandName']);
            $offer->setBrand($brand);
        }

        return $offer;
    }
}