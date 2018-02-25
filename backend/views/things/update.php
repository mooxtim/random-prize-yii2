<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Things */

$this->title = Yii::t('app', 'Update Things: {nameAttribute}', [
    'nameAttribute' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Things'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->thing_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="things-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
