<?php

namespace app\components\form;

use app\components\question\QuestionBase;
use app\components\question\QuestionBaseHandler;
use \yii\helpers\Html;

/**
 * Created by PhpStorm.
 * User: Mladen Cosic
 * Date: 24.01.2020
 * Time: 14:19
 */
class FormHelper
{

    private $formData = [];

    /**
     * FormHelper constructor.
     */
    public function __construct($formData)
    {
        $this->formData = $formData;
    }

    /**
     * A method used to generate dynamic form
     * @return string
     */
    public function generateForm()
    {
        $form = Html::beginForm();
        $fieldId = 1;

        foreach ($this->formData as $formField) {
            /** @var QuestionBaseHandler $questionInstance */
            foreach (QuestionBase::allowedQuestionTypes() as $questionTypeClass) {
                $questionInstance = new $questionTypeClass;
                if ($questionInstance->getQuestion($formField)) {
                    $questionfield = $questionInstance->getQuestion($formField);

                    if ($questionfield['type'] == QuestionBase::QUESTION_TEXT) {
                        $form .= '<div data-id="' . $fieldId . '" class="form-group">';
                        $form .= $questionfield['label'];
                        $form .= $questionfield['field'];
                        $form .= '</div>';
                    } else {
                        $form .= '<div data-id="' . $fieldId . '" class="form-group">';
                        $form .= '<div class="radio-group" role="group">';
                        $form .= '<h3>' . $questionfield['titleText'] . '<span class="info_btn">?</span><span class="info-text">' . $questionfield['infoText'] . '</span></h3>';
                        $form .= $questionfield['field'];
                        $form .= '</div>';
                        $form .= '</div>';
                    }

                    $fieldId++;
                }
            }
        }


        return $form;
    }

}