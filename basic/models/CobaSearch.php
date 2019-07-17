<?php

namespace app\models;
 
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

use app\models\Coba;
 
/**
 * CompaniesSearch represents the model behind the search form about `backend\models\Companies`.
 */
class CobaSearch extends \yii\db\ActiveRecord
{
    /* your calculated attribute */
public $namacoba;
public $isicoba;


/* setup rules */
public function rules() {
   return [
    /* your other rules */
    [['namacoba'], 'safe'],
    [['isicoba'], 'safe']
   ];
}

/**
 * setup search function for filtering and sorting 
 * based on fullName field
 */
public function search($params) {
    $query = Coba::find();
    $dataProvider = new ActiveDataProvider([
        'query' => $query,
    ]);

    $dataProvider->setSort([
        'attributes' => [
            'idcoba',
            'namacoba' => [
                'asc' => ['first_name' => SORT_ASC, 'last_name' => SORT_ASC],
                'desc' => ['first_name' => SORT_DESC, 'last_name' => SORT_DESC],
                'label' => 'Nama Coba',
                'default' => SORT_ASC
            ],
            'isicoba'
        ]
    ]);
    
    if (!($this->load($params) && $this->validate())) {
        return $dataProvider;
    }

    $this->addCondition($query, 'idcoba');
    $this->addCondition($query, 'namacoba', true);
    $this->addCondition($query, 'isicoba', true);

    // filter by person full name
    $query->andWhere('namacoba LIKE "%' . $this->namacoba . '%" ' .
        'OR isicoba LIKE "%' . $this->isicoba . '%"'
    );
    
    return $dataProvider;
}
}


