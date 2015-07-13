<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\KPA */
?>

<h2>Edit <?php echo $kpi->Title;?></h2>
    <?php if(Yii::$app->session->hasFlash('kpiUpdated')) : ?>
        <div class="alert alert-success">
            Your KPI has been updated!
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'updatekpi-form']); ?>
                <?= $form->field($kpi, 'Title') ?>
                <?= $form->field($kpi, 'Description')->textArea(['rows'=>6]) ?>
                <div class="form-group">
                    <?= Html::submitButton('Update', ['class' => 'btn btn-primary', 'name' => 'update-button']) ?>
                </div>
            <?php ActiveForm::end() ?>
        </div>
    </div>