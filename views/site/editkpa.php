<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<h2>Edit <?php echo $kpa->Title;?></h2>
    <?php if(Yii::$app->session->hasFlash('kpaUpdated')) : ?>
        <div class="alert alert-success">
            Your KPA has been updated!
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'update-form']); ?>
                <?= $form->field($kpa, 'Title') ?>
                <?= $form->field($kpa, 'Description') ?>
                <div class="form-group">
                    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'update-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>