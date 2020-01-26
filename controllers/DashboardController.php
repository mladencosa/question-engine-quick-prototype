<?php

namespace app\controllers;

use app\components\form\FormHelper;
use Yii;
use yii\web\Controller;
use app\components\api\RiskineAPI;

class DashboardController extends Controller
{

    /**
     * Display Dashboard
     *
     * @return string
     */
    public function actionIndex()
    {
        $riskineDataForm = RiskineAPI::getMockData();
        $generatedForm = new FormHelper($riskineDataForm['result']['params']);
        $riskineForm = $generatedForm->generateForm();


        return $this->render('index', [
            'mockData' => $riskineForm
        ]);
    }
}
