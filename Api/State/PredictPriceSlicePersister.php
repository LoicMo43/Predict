<?php

namespace Predict\Api\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use Predict\Model\PricesQuery;

class PredictPriceSlicePersister implements ProcessorInterface
{
    /**
     * @param $data
     * @param Operation $operation
     * @param array $uriVariables
     * @param array $context
     * @return mixed|null
     * @throws \Exception
     */
    public function process($data, Operation $operation, array $uriVariables = [], array $context = [])
    {
        if (isset($uriVariables['id'])) {
            [$area, $weight] = explode('_', $uriVariables['id'], 2);
        } else {
            $area = $data->area ?? null;
            $weight = $data->weight ?? null;
        }

        // POST
        if ($operation->getMethod() === 'POST') {
            \Predict\Model\PricesQuery::setPostageAmount(
                $data->price,
                $area,
                $weight
            );
            return $data;
        }

        // PATCH
        if ($operation->getMethod() === 'PATCH' && $area && $weight) {
            $newPrice = $data->price ?? null;
            if ($newPrice === null) {
                throw new \InvalidArgumentException('Price value required for patch.');
            }
            \Predict\Model\PricesQuery::setPostageAmount($newPrice, $area, $weight);
            $data->area = (int) $area;
            $data->weight = (float) $weight;
            return $data;
        }

        // DELETE
        if ($operation->getMethod() === 'DELETE' && $area && $weight) {
            \Predict\Model\PricesQuery::setPostageAmount(false, $area, $weight);
            return null;
        }

        return $data;
    }
}
