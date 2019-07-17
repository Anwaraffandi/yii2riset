<?php

namespace app\models;

use yii\db\ActiveRecord;

class Akun extends ActiveRecord
{
    public static function tableName()
    {
        return 'account';
    }
    public function rules()
    {
        return [
            ['username', 'required','message' => 'Username gak boleh kosong'],
            ['name', 'string','max'=>'20'],
            ['password', 'required','message' => 'Password gak boleh kosong'],
            ['role', 'string','max'=>'25'],
        ];
    }
}