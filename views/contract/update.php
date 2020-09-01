<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Contract */
/* @var $clients app\models\Client */

$this->title = 'Update Contract: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Contracts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="contract-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'clients' => $clients
    ]) ?>

</div>
