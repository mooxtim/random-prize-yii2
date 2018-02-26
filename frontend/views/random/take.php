<?php
/* @var $this yii\web\View */

use \yii\bootstrap\Html;

?>
<?php if ($prize->type == 'money') { ?>
<h3>The money has been sent to your bankcard</h3>

<?php } else if ($prize->type == 'points') { ?>
<h3>Points have been credited to your account</h3>

<?php } else { ?>
<h3>Your prize will be sent</h3>
<?php } ?>

<p><?= Html::a('Back', ['random/index'], ['class' => 'btn btn-primary']) ?></p>