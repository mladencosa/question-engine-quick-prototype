<?php


namespace app\components\question;


interface QuestionBaseHandler
{
    /**
     * @param $formData
     * @return mixed
     */
    public function getQuestion($formData);
}