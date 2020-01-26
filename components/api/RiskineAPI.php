<?php

namespace app\components\api;

use Yii;
/**
 * Created by PhpStorm.
 * User: Mladen Cosic
 * Date: 24.01.2020
 * Time: 13:46
 */

class RiskineAPI
{
    /**
     * For test purposes we will use this mock json file
     * @return mixed
     */
    public static function getMockData () {
        $string = file_get_contents(Yii::getAlias('@app/assets/mockData/') ."mockup.json");

        $paises = json_decode($string,true);

        return $paises;
    }

}