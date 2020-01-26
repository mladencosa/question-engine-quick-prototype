<?php

/**
 * Created by PhpStorm.
 * User: Mladen Cosic
 * Date: 24.01.2020
 * Time: 14:37
 */

namespace app\components\question;

use \yii\helpers\Html;

class QuestionRadioType implements QuestionBaseHandler
{

    private $fieldType = "radio";
    private $options = [];

    /**
     * @param $formData
     * @return array|bool
     */
    public function getQuestion($formData)
    {
        $this->setOptions($formData);

        return $this->createQuestionField($formData);
    }

    /**
     * Generate HTML form field
     * @param $formData
     * @return array|bool
     */
    public function createQuestionField($formData)
    {
        if (array_key_exists("type", $formData) && $formData['type'] === $this->fieldType) {
            $fields = '';

            foreach ($formData['options'] as $option) {
                $name = $this->createNameID($option);
                $fields .= '<div class="radio-set">';
                $fields .= Html::radio(
                    $name,
                    false,
                    ['value' => $option['value'], 'class' => 'radio-field']);
                $fields .= $this->createLabel($option);
                $fields .= '</div>';
            }

            return [
                'type' => $this->fieldType,
                'field' => $fields,
                'titleText' => array_key_exists("label", $formData) ? $formData['label']['raw'] : 'No Title available',
                'infoText' => array_key_exists("infotext", $formData) ? $formData['infotext'] : ''
            ];

        } else {
            return false;
        }
    }

    /**
     * @param $formData
     */
    public function setOptions($formData)
    {
        if (array_key_exists('required', $formData) && $formData['required'] == true) {
            $this->options['required'] = true;
        }
    }

    /**
     * @param $inputField
     * @return string
     */
    public function createLabel($inputField)
    {
        return '<label  class="radio-label" for="' . $this->createNameID($inputField) . '"><span>' . $inputField['label'] . '</span></label>';
    }

    /**
     * Label from response wil bi used as a unique ID for label and input
     * @param $inputField
     * @return mixed
     */
    public function createNameID($inputField)
    {
        return str_replace([" ", ",", "."], ["_", "", ""], $inputField['label']);
    }
}


