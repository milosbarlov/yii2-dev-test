<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Contract */
/* @var $clients app\models\Client */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contract-form">

    <?php $form = ActiveForm::begin([
        'id' => 'create-contract',
    ]); ?>

    <?= $form->field($model, 'number')->textInput() ?>
    <?=
    $form->field($model, 'buyer_client')
        ->dropDownList(
            $clients
        )
    ?>

    <?=
    $form->field($model, 'seller_client')
        ->dropDownList(
            $clients
        )
    ?>

    <?= $form->field($model, 'date')->widget(\yii\jui\DatePicker::classname(), [
        'options' => ['class' => 'form-control'],
        'dateFormat' => 'php:Y-m-d',
        'clientOptions' => [
            'language' => 'en',
        ]

    ]) ?>

    <?= $form->field($model, 'financial_amount')->textInput() ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
