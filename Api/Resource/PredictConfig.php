<?php

namespace Predict\Api\Resource;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Patch;
use Predict\Api\State\PredictConfigPersister;
use Predict\Api\State\PredictConfigProvider;
use Symfony\Component\Serializer\Annotation\Groups;

#[ApiResource(
    operations: [
        new Get(
            uriTemplate: '/front/predict/config',
            name: 'api_predict_config_get',
            provider: PredictConfigProvider::class
        ),
        new Patch(
            uriTemplate: '/front/predict/config',
            name: 'api_predict_config_patch',
            processor: PredictConfigPersister::class
        ),
    ],
    normalizationContext: ['groups' => [self::GROUP_ADMIN_READ]],
    denormalizationContext: ['groups' => [self::GROUP_ADMIN_WRITE]]
)]
class PredictConfig
{
    public const GROUP_ADMIN_READ = 'admin:predict_config:read';
    public const GROUP_ADMIN_WRITE = 'admin:predict_config:write';

    /**
     * @var bool|null
     */
    #[Groups([self::GROUP_ADMIN_READ, self::GROUP_ADMIN_WRITE])]
    public ?bool $predict_freeshipping = null;

    /**
     * @var float|null
     */
    #[Groups([self::GROUP_ADMIN_READ, self::GROUP_ADMIN_WRITE])]
    public ?float $predict_freeshipping_amount = null;

    /**
     * @var string|null
     */
    #[Groups([self::GROUP_ADMIN_READ, self::GROUP_ADMIN_WRITE])]
    public ?string $store_exapaq_account = null;

    /**
     * @var string|null
     */
    #[Groups([self::GROUP_ADMIN_READ, self::GROUP_ADMIN_WRITE])]
    public ?string $store_cellphone = null;

    /**
     * @var string|null
     */
    #[Groups([self::GROUP_ADMIN_READ, self::GROUP_ADMIN_WRITE])]
    public ?string $store_phone = null;

    /**
     * @var bool|null
     */
    #[Groups([self::GROUP_ADMIN_READ, self::GROUP_ADMIN_WRITE])]
    public ?bool $store_predict_option = null;

    /**
     * @var int|null
     */
    #[Groups([self::GROUP_ADMIN_READ, self::GROUP_ADMIN_WRITE])]
    public ?int $predict_tax_rule_id = null;

    /**
     * @return bool|null
     */
    public function getPredictFreeshipping(): ?bool
    {
        return $this->predict_freeshipping;
    }

    /**
     * @param bool|null $predict_freeshipping
     * @return void
     */
    public function setPredictFreeshipping(?bool $predict_freeshipping): void
    {
        $this->predict_freeshipping = $predict_freeshipping;
    }

    /**
     * @return float|null
     */
    public function getPredictFreeshippingAmount(): ?float
    {
        return $this->predict_freeshipping_amount;
    }

    /**
     * @param float|null $predict_freeshipping_amount
     * @return void
     */
    public function setPredictFreeshippingAmount(?float $predict_freeshipping_amount): void
    {
        $this->predict_freeshipping_amount = $predict_freeshipping_amount;
    }

    /**
     * @return string|null
     */
    public function getStoreExapaqAccount(): ?string
    {
        return $this->store_exapaq_account;
    }

    /**
     * @param string|null $store_exapaq_account
     * @return void
     */
    public function setStoreExapaqAccount(?string $store_exapaq_account): void
    {
        $this->store_exapaq_account = $store_exapaq_account;
    }

    /**
     * @return string|null
     */
    public function getStoreCellphone(): ?string
    {
        return $this->store_cellphone;
    }

    /**
     * @param string|null $store_cellphone
     * @return void
     */
    public function setStoreCellphone(?string $store_cellphone): void
    {
        $this->store_cellphone = $store_cellphone;
    }

    /**
     * @return bool|null
     */
    public function getStorePredictOption(): ?bool
    {
        return $this->store_predict_option;
    }

    /**
     * @param bool|null $store_predict_option
     * @return void
     */
    public function setStorePredictOption(?bool $store_predict_option): void
    {
        $this->store_predict_option = $store_predict_option;
    }

    /**
     * @return int|null
     */
    public function getPredictTaxRuleId(): ?int
    {
        return $this->predict_tax_rule_id;
    }

    /**
     * @param int|null $predict_tax_rule_id
     * @return void
     */
    public function setPredictTaxRuleId(?int $predict_tax_rule_id): void
    {
        $this->predict_tax_rule_id = $predict_tax_rule_id;
    }

    /**
     * @return string|null
     */
    public function getStorePhone(): ?string
    {
        return $this->store_phone;
    }

    /**
     * @param string|null $store_phone
     * @return void
     */
    public function setStorePhone(?string $store_phone): void
    {
        $this->store_phone = $store_phone;
    }
}
