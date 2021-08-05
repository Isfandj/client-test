<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use borales\extensions\phoneInput\PhoneInputValidator;

/**
 * Payment 
 *
 * 
 *
 */
class Payment extends ActiveRecord{
    public $phone = false;
    public $card_num = false;

    public function rules()
    {
        return [
            [['phone'], 'string'],
            [['phone'], PhoneInputValidator::className()],
        ];
    }
}