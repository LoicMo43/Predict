<?php

namespace Predict\Api\State;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use Predict\Api\Resource\PredictPriceSlice;
use Predict\Model\PricesQuery;

class PredictPriceSliceProvider implements ProviderInterface
{
    /**
     * @param Operation $operation
     * @param array $uriVariables
     * @param array $context
     * @return object|array|object[]|null
     */
    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        $prices = PricesQuery::getPrices();

        // Get by ID style "area_weight"
        if (isset($uriVariables['id'])) {
            [$area, $weight] = explode('_', $uriVariables['id'], 2);
            if (isset($prices[$area]['slices'][$weight])) {
                $resource = new PredictPriceSlice();
                $resource->id = $area . '_' . $weight;
                $resource->area = (int) $area;
                $resource->weight = (float) $weight;
                $resource->price = (float) $prices[$area]['slices'][$weight];
                return $resource;
            }
            return null;
        }

        // GetCollection
        $resources = [];
        foreach ($prices as $area => $areaData) {
            if (!isset($areaData['slices']) || $area === '') continue;
            foreach ($areaData['slices'] as $weight => $price) {
                $resource = new PredictPriceSlice();
                $resource->id = $area . '_' . $weight;
                $resource->area = (int) $area;
                $resource->weight = (float) $weight;
                $resource->price = (float) $price;
                $resources[] = $resource;
            }
        }
        return $resources;
    }
}
