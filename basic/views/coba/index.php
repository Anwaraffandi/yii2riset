<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cobas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coba-index">
    
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Coba', ['create'], ['class' => 'btn btn-success']) ?>
    </p>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $cobaSearch,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'namacoba',
            'isicoba:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>

