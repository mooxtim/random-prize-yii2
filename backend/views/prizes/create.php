<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Prizes */

$this->title = Yii::t('app', 'Create Prizes');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Prizes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prizes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
