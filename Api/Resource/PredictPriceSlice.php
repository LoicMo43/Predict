<?php

namespace Predict\Api\Resource;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use Predict\Api\State\PredictPriceSlicePersister;
use Predict\Api\State\PredictPriceSliceProvider;
use Symfony\Component\Serializer\Annotation\Groups;

#[ApiResource(
    operations: [
        new Get(
            uriTemplate: '/front/predict/price-slice/{id}',
            name: 'api_predict_price_slice_get',
            provider: PredictPriceSliceProvider::class
        ),
        new GetCollection(
            uriTemplate: '/front/predict/price-slices',
            name: 'api_predict_price_slice_get_collection',
            provider: PredictPriceSliceProvider::class
        ),
        new Post(
            uriTemplate: '/front/predict/price-slice',
            name: 'api_predict_price_slice_post',
            processor: PredictPriceSlicePersister::class
        ),
        new Patch(
            uriTemplate: '/front/predict/price-slice/{id}',
            name: 'api_predict_price_slice_patch',
            processor: PredictPriceSlicePersister::class
        ),
        new Delete(
            uriTemplate: '/front/predict/price-slice/{id}',
            name: 'api_predict_price_slice_delete',
            processor: PredictPriceSlicePersister::class
        )
    ],
    normalizationContext: ['groups' => [self::GROUP_ADMIN_READ]],
    denormalizationContext: ['groups' => [self::GROUP_ADMIN_WRITE]],
)]
class PredictPriceSlice
{
    public const GROUP_ADMIN_READ = 'admin:predict_price_slice:read';
    public const GROUP_ADMIN_WRITE = 'admin:predict_price_slice:write';

    /**
     * @var string|null
     */
    #[Groups([self::GROUP_ADMIN_READ])]
    public ?string $id = null; // ex: "1_12"

    /**
     * @var int|null
     */
    #[Groups([self::GROUP_ADMIN_READ, self::GROUP_ADMIN_WRITE])]
    public ?int $area = null;

    /**
     * @var float|null
     */
    #[Groups([self::GROUP_ADMIN_READ, self::GROUP_ADMIN_WRITE])]
    public ?float $weight = null;

    /**
     * @var float|null
     */
    #[Groups([self::GROUP_ADMIN_READ, self::GROUP_ADMIN_WRITE])]
    public ?float $price = null;

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     * @return void
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int|null
     */
    public function getArea(): ?int
    {
        return $this->area;
    }

    /**
     * @param int|null $area
     * @return void
     */
    public function setArea(?int $area): void
    {
        $this->area = $area;
    }

    /**
     * @return float|null
     */
    public function getWeight(): ?float
    {
        return $this->weight;
    }

    /**
     * @param float|null $weight
     * @return void
     */
    public function setWeight(?float $weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * @param float|null $price
     * @return void
     */
    public function setPrice(?float $price): void
    {
        $this->price = $price;
    }
}
