<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\KPA */
$this->title = $kpa->Title;

$this->params['breadcrumbs'][] = $this->title;
?>

<h2>Edit <?php echo $kpa->Title;?></h2>
    <?php if(Yii::$app->session->hasFlash('kpaUpdated')) : ?>
        <div class="alert alert-success">
            Your KPA has been updated!
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'updatekpa-form']); ?>
                <?= $form->field($kpa, 'Title') ?>
                <?= $form->field($kpa, 'Description')->textArea(['rows'=>6]) ?>
                <div class="form-group">
                    <?= Html::submitButton('Update', ['class' => 'btn btn-primary', 'name' => 'update-button']) ?>
                </div>
            <?php ActiveForm::end() ?>
        </div>
    </div>