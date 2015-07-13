<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\KPA */
?>

<h2>Edit <?php echo $goal->Title;?></h2>
    <?php if(Yii::$app->session->hasFlash('goalUpdated')) : ?>
        <div class="alert alert-success">
            Your Goal has been updated!
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'updategoal-form']); ?>
                <?= $form->field($goal, 'Title') ?>
                <?= $form->field($goal, 'Description')->textArea(['rows'=>6]) ?>
                <div class="form-group">
                    <?= Html::submitButton('Update', ['class' => 'btn btn-primary', 'name' => 'update-button']) ?>
                </div>
            <?php ActiveForm::end() ?>
        </div>
    </div>