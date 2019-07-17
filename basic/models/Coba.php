<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "coba".
 *
 * @property int $idcoba
 * @property string $namacoba
 * @property string $isicoba
 */
class Coba extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'coba';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['namacoba', 'isicoba'], 'required'],
            [['isicoba'], 'string'],
            [['namacoba'], 'string', 'max' => 50],
        ];
    }


    public function getNamaCoba() {
        return $this->namacoba . ' ' . $this->isicoba;
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'idcoba' => 'Idcoba',
            'namacoba' => 'Namacoba',
            'isicoba' => 'Isicoba',
        ];
    }


    /* Your model attribute labels */

//    public function attributeLabels() {
//        return [
//            /* Your other attribute labels */
//            'fullName' => Yii::t('app', 'Full Name')
//        ];
//    }

}
