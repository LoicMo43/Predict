<?php

namespace Predict\Api\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use Predict\Api\Resource\PredictConfig;
use Thelia\Model\ConfigQuery;

class PredictConfigProvider implements ProviderInterface
{
    /**
     * @param Operation $operation
     * @param array $uriVariables
     * @param array $context
     * @return PredictConfig|null
     */
    public function provide(Operation $operation, array $uriVariables = [], array $context = []): ?PredictConfig
    {
        $config = new PredictConfig();

        $config->predict_freeshipping = (bool) ConfigQuery::read('predict_freeshipping');
        $config->predict_freeshipping_amount = (float) ConfigQuery::read('predict_freeshipping_amount');
        $config->store_exapaq_account = ConfigQuery::read('store_exapaq_account');
        $config->store_cellphone = ConfigQuery::read('store_cellphone');
        $config->store_phone = ConfigQuery::read('store_phone');
        $config->store_predict_option = (bool) ConfigQuery::read('store_predict_option');
        $config->predict_tax_rule_id = (int) ConfigQuery::read('predict_tax_rule_id');

        return $config;
    }
}
