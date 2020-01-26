<?php
/**
 * Created by PhpStorm.
 * User: Mladen Cosic
 * Date: 24.01.2020
 * Time: 15:40
 */

namespace app\components\question;


class QuestionBase
{
    const QUESTION_TEXT = 'text';
    const QUESTION_RADIO = 'radio';

    /**
     * In this method we defined all type of question we want to generate. All classes will be instantiated.
     * @return array
     */
    public static function allowedQuestionTypes()
    {
        return [
            self::QUESTION_TEXT => 'app\components\question\QuestionTextType',
            self::QUESTION_RADIO => 'app\components\question\QuestionRadioType'
        ];
    }

}