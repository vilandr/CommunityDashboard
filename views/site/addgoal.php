<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\web\View;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\Goal */

$this->title = 'Add Goal';
//$this->params['breadcrumbs'][] = ['label' => $kpa->Title, 'url' => Url::to(['site/viewkpa','id'=>$kpa->ID])];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if(Yii::$app->session->hasFlash('goalCreated')) : ?>
        <div class="alert alert-success">
            Your Goal has been created!
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'addgoal-form']); ?>
                <?= $form->field($model, 'Title') ?>
                <?= $form->field($model, 'Description')->textArea(['rows'=>6]) ?>
                <?= $form->field($model, 'Weight') ?>
                <div class="form-group">
                    <?= Html::submitButton('Create Goal', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>