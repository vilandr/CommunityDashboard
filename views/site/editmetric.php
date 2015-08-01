<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\KPA */
$this->title = $metric->Title;
$this->params['breadcrumbs'][] = ['label' => $kpa->Title, 'url' => Url::to(['site/viewkpa','id'=>$kpa->ID])];
$this->params['breadcrumbs'][] = ['label' => $goal->Title, 'url' => Url::to(['site/viewgoal','id'=>$goal->ID])];
$this->params['breadcrumbs'][] = ['label' => $kpi->Title, 'url' => Url::to(['site/viewkpi','id'=>$kpi->ID])];
$this->params['breadcrumbs'][] = $this->title;
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