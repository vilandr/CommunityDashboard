<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\KPA */
?>

<h2>Edit <?php echo $metric->Title;?></h2>
    <?php if(Yii::$app->session->hasFlash('metricUpdated')) : ?>
        <div class="alert alert-success">
            Your Metric has been updated!
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'updatemetric-form']); ?>
                <?= $form->field($metric, 'Title') ?>
                <?= $form->field($metric, 'Description')->textArea(['rows'=>6]) ?>
                <?= $form->field($metric, 'Weight') ?>
                <?= $form->field($metric, 'Current') ?>
                <?= $form->field($metric, 'Target') ?>
                <div class="form-group">
                    <?= Html::submitButton('Update', ['class' => 'btn btn-primary', 'name' => 'update-button']) ?>
                </div>
            <?php ActiveForm::end() ?>
        </div>
    </div>