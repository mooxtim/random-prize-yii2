<?php
/* @var $this yii\web\View */

use \yii\bootstrap\Html;

?>

<h1>You Won:</h1>
<?php if ($prize->type == 'points') { ?>
<h3><?= $prize->count ?> points!</h3>
<p><?= Html::a('Refuse', ['random/refuse', 'id' => $prize->prize_id], ['class' => 'btn btn-danger']) ?></p>
<p><?= Html::a('Take Points', ['random/take', 'id' => $prize->prize_id], ['class' => 'btn btn-primary']) ?></p>

<?php } else if ($prize->type == 'money') { ?>
<h3>€<?= $prize->count ?>!</h3>
<p><?= Html::a('Refuse', ['random/refuse', 'id' => $prize->prize_id], ['class' => 'btn btn-danger']) ?></p>
<p><?= Html::a('Take the Money', ['random/take', 'id' => $prize->prize_id], ['class' => 'btn btn-primary']) ?></p>
<p><?= Html::a('Convert to Points', ['random/convert', 'id' => $prize->prize_id], ['class' => 'btn btn-success']) ?></p>

<?php } else { ?>
<h3>The <?= $prize->name ?>!</h3>
<p><?= Html::a('Refuse', ['random/refuse', 'id' => $prize->prize_id], ['class' => 'btn btn-danger']) ?></p>
<p><?= Html::a('Take the ' . $prize->name, ['random/take', 'id' => $prize->prize_id], ['class' => 'btn btn-primary']) ?></p>
<?php } ?>