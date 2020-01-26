<?php

namespace app\components\question;

use \yii\helpers\Html;

/**
 * Created by PhpStorm.
 * User: Mladen Cosic
 * Date: 24.01.2020
 * Time: 14:24
 */
class QuestionTextType implements QuestionBaseHandler
{

    private $fieldType = "text";
    private $placeholder = "";
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
     * @param $formData
     * @return array|bool
     */
    public function createQuestionField($formData)
    {
        if (array_key_exists("type", $formData) && $formData['type'] === $this->fieldType) {

            $this->placeholder = array_key_exists("placeholder", $formData) ? strtolower($formData['placeholder']) : '';

            return [
                'type' => $this->fieldType,
                'label' => '<label for="' . $this->placeholder . '">' . ucfirst($this->placeholder) . '</label>',
                'field' => Html::input($this->fieldType, $this->placeholder, null, $this->options),
            ];

        } else {
            return false;
        }
    }

    /**
     * @param $formData
     */
    public function setOptions($formData) {

        $this->options['class'] = "form-control";

        if ($this->hasValidation($formData)) {
            $this->options['maxLength'] = $formData['validate']['maxLength'];
        }

        if (array_key_exists('required', $formData) && $formData['required'] == true) {
            $this->options['required'] = true;
        }
    }

    /**
     * @param $formData
     * @return bool
     */
    public function hasValidation($formData)
    {
        if (array_key_exists("validate", $formData)) {
            if (array_key_exists("maxLength", $formData['validate'])) {
                return true;
            }
        }

        return false;

    }
}