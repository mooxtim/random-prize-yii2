<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Payments */

$this->title = Yii::t('app', 'Update Payments: {nameAttribute}', [
    'nameAttribute' => $model->payment_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Payments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->payment_id, 'url' => ['view', 'id' => $model->payment_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="payments-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
