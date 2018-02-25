<?php
/* @var $this yii\web\View */

use \yii\bootstrap\Html;

?>
<h3>You have received <?= $prize->convertPoints ?> points</h3>
<p><?= Html::a('Back', ['random/index'], ['class' => 'btn btn-primary']) ?></p>