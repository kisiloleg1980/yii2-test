<?php

namespace app\storage;

use yii\db\ActiveRecord;
use Yii;

class UsersRecord extends ActiveRecord
{
    public static function tableName()
    {
        return '{{users}}';
    }

    public function rules()
    {
        return [
            ['id', 'integer'],
            ['name', 'string'],
            ['login', 'string'],
            ['hash', 'string'],
        ];
    }


}