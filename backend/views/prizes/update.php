<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Prizes */

$this->title = Yii::t('app', 'Update Prizes: {nameAttribute}', [
    'nameAttribute' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Prizes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->prize_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="prizes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
