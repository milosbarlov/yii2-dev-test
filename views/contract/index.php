<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ContractSeacrh */
/* @var $clients array */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contracts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contract-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Contract', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'number',
            [
                'attribute' => 'buyer_client',
                'value'=>function ($model, $key, $index, $column) {
                    return $model->buyerClient->name;
                },
                'filter' => Html::activeDropDownList($searchModel, 'buyer_client', $clients,['class'=>'form-control','prompt' => 'Select Buyer']),
            ],
            [
                'attribute' => 'seller_client',
                'value'=>function ($model) {
                    return $model->sellerClient->name;
                },
                'filter' => Html::activeDropDownList($searchModel, 'seller_client', $clients,['class'=>'form-control','prompt' => 'Select Seller']),
            ],
            [
                'attribute' =>  'date',
                'filter' => \yii\jui\DatePicker::widget([
                    'model'=>$searchModel,
                    'attribute'=>'date',
                    'language' => 'en',
                    'dateFormat' => 'php:Y-m-d',
                    'options' => [
                        'class' => 'form-control'
                    ],
                ]),
                'format' => 'raw',
            ],
            //'financial_amount',
            //'description:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
