<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\KPA */

$this->title = $goal->Title;
$this->params['breadcrumbs'][] = ['label' => $kpa->Title, 'url' => Url::to(['site/viewkpa','id'=>$kpa->ID])];
$this->params['breadcrumbs'][] = $this->title;
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
                <?= $form->field($goal, 'Weight') ?>
                <div class="form-group">
                    <?= Html::submitButton('Update', ['class' => 'btn btn-primary', 'name' => 'update-button']) ?>
                </div>
            <?php ActiveForm::end() ?>
        </div>
    </div>