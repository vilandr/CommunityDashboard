<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\KPI */

$this->title = 'Add Metric';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if(Yii::$app->session->hasFlash('metricCreated')) : ?>
        <div class="alert alert-success">
            Your Key Performance Indicator has been created!
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'addmetric-form']); ?>
                <?= $form->field($model, 'Title') ?>
                <?= $form->field($model, 'Description')->textArea(['rows'=>6]) ?>
                <div class="form-group">
                    <?= Html::submitButton('Create Metric', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>