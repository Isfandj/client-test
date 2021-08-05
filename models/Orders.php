<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

/**
 * Order 
 *
 * 
 *
 */
class Orders extends ActiveRecord{
    public function rules()
    {
        return [
            [['user_id', 'amount', 'service_id'], 'required']
        ];
    }

    public function formatAmount($amount){
        return $amount * 100;
    }
}