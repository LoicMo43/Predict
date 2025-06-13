<?php

namespace Predict\Api\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use Thelia\Model\ConfigQuery;

class PredictConfigPersister implements ProcessorInterface
{
    /**
     * @param $data
     * @param Operation $operation
     * @param array $uriVariables
     * @param array $context
     * @return mixed
     */
    public function process($data, Operation $operation, array $uriVariables = [], array $context = [])
    {
        if (isset($data->predict_freeshipping)) {
            ConfigQuery::write('predict_freeshipping', $data->predict_freeshipping ? '1' : '0');
        }
        if (isset($data->predict_freeshipping_amount)) {
            ConfigQuery::write('predict_freeshipping_amount', $data->predict_freeshipping_amount);
        }
        if (isset($data->store_exapaq_account)) {
            ConfigQuery::write('store_exapaq_account', $data->store_exapaq_account);
        }
        if (isset($data->store_phone)) {
            ConfigQuery::write('store_phone', $data->store_phone);
        }
        if (isset($data->store_cellphone)) {
            ConfigQuery::write('store_cellphone', $data->store_cellphone);
        }
        if (isset($data->store_predict_option)) {
            ConfigQuery::write('store_predict_option', $data->store_predict_option ? '1' : '0');
        }
        if (isset($data->predict_tax_rule_id)) {
            ConfigQuery::write('predict_tax_rule_id', $data->predict_tax_rule_id);
        }

        return $data;
    }
}
