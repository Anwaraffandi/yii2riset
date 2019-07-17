<?php

namespace app\models;

use yii\db\ActiveRecord;

class Post extends ActiveRecord
{
    public static function tableName()
    {
        return 'post';
    }
    public function rules()
    {
        return [
            ['title', 'required','message' => 'gak boleh kosong'],
            ['content', 'required','message' => 'gak boleh kosong'],];
    }
    public function getKomen(){
        return $this->hasMany(Komen::className(), ['idpost' => 'idpost']);
    }

    
}