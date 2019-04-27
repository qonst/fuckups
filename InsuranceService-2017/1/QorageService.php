<?php

namespace App\Services;

use App\Models\Qorage\AccidentTerms;
use App\Models\Qorage\AssistantCompanies;
use App\Models\Qorage\BaseMain;
use App\Models\Qorage\CoatingExpansion;
use App\Models\Qorage\Countries;
use App\Models\Qorage\DaysFactors;
use App\Models\Qorage\FeeReduce;
use App\Models\Qorage\FlightsCount;
use App\Models\Qorage\InsuredAges;
use App\Models\Qorage\InsuredCount;
use App\Models\Qorage\MedTerms;
use App\Models\Qorage\MonthsFactors;
use App\Models\Qorage\MultiPolicyTerms;
use App\Models\Qorage\PropertyInsuranceSums;
use App\Models\Qorage\RegionsList;
use App\Models\Qorage\SumPatterns;
use App\Models\Qorage\UnconditionalFranchises;

/**
 * Class QorageService
 * Сервис хранилища конфигурационных CSV файлов программ продуктов
 * @package App\Modules
 */
class QorageService
{
    protected static function modelsList()
    {
        return [
            MonthsFactors::TYPE => MonthsFactors::class,
            Countries::TYPE => Countries::class,
            FeeReduce::TYPE => FeeReduce::class,
            FlightsCount::TYPE => FlightsCount::class,
            InsuredAges::TYPE => InsuredAges::class,
            CoatingExpansion::TYPE => CoatingExpansion::class,
            InsuredCount::TYPE => InsuredCount::class,
            DaysFactors::TYPE => DaysFactors::class,
            SumPatterns::TYPE => SumPatterns::class,
            UnconditionalFranchises::TYPE => UnconditionalFranchises::class,
            AssistantCompanies::TYPE => AssistantCompanies::class,
            RegionsList::TYPE => RegionsList::class,
            MedTerms::TYPE => MedTerms::class,
            PropertyInsuranceSums::TYPE => PropertyInsuranceSums::class,
            MultiPolicyTerms::TYPE => MultiPolicyTerms::class,
            AccidentTerms::TYPE => AccidentTerms::class,
        ];
    }

    /**
     * @param $name
     * @return BaseMain|null
     */
    public static function getClassType($name)
    {
        if (!$name) {
            return null;
        }

        $models_list = self::modelsList();

        return isset($models_list[$name]) ? $models_list[$name] : null;
    }

    public static function getTypes()
    {
        return array_keys(self::modelsList());
    }
}