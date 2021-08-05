<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<div class="container">
<div class="site-index">

    <div class="jumbotron">
        <h1>Текущий счет:<?=number_format($balance->balance / 100)?> сумм</h1>
        <h2>Выберите сумму</h2>
        <p class="lead">Для пополнения кошелька выберите сумму</p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>500 000 сум</h2>
                <?php $form = ActiveForm::begin()?>
                <?= $form->field($order, 'user_id')->hiddenInput(['value'=> "1"])->label(false); ?>
                <?= $form->field($order, 'amount')->hiddenInput(['value'=> "500000"])->label(false); ?>
                <?= $form->field($order, 'service_id')->hiddenInput(['value'=> "1"])->label(false); ?>
                <p> <?= Html::submitButton('Пополнить', ['class' => 'btn btn-success']) ?></p>
                <?php ActiveForm::end() ?>
            </div>
            <div class="col-lg-4">
                <h2>1 500 000 сум</h2>

                <?php $form = ActiveForm::begin()?>
                <?= $form->field($order, 'user_id')->hiddenInput(['value'=> "1"])->label(false); ?>
                <?= $form->field($order, 'amount')->hiddenInput(['value'=> "1500000"])->label(false); ?>
                <?= $form->field($order, 'service_id')->hiddenInput(['value'=> "1"])->label(false); ?>
                <p> <?= Html::submitButton('Пополнить', ['class' => 'btn btn-success']) ?></p>
                <?php ActiveForm::end() ?>
            </div>
            <div class="col-lg-4">
                <h2>2 000 000 сум</h2>

                <?php $form = ActiveForm::begin()?>
                <?= $form->field($order, 'user_id')->hiddenInput(['value'=> "1"])->label(false); ?>
                <?= $form->field($order, 'amount')->hiddenInput(['value'=> "2000000"])->label(false); ?>
                <?= $form->field($order, 'service_id')->hiddenInput(['value'=> "1"])->label(false); ?>
                <p> <?= Html::submitButton('Пополнить', ['class' => 'btn btn-success']) ?></p>
                <?php ActiveForm::end() ?>
            </div>
        </div>

    </div>
    <div class="jumbotron">
        <p class="lead">Или укажите сумму пополнения сами:</p>
        <?php $form = ActiveForm::begin()?>
        <?= $form->field($order, 'user_id')->hiddenInput(['value'=> "1"])->label(false); ?>
        <?= $form->field($order, 'amount')->label('Сумма пополнения'); ?>
        <?= $form->field($order, 'service_id')->hiddenInput(['value'=> "1"])->label(false); ?>
        <p> <?= Html::submitButton('Пополнить', ['class' => 'btn btn-success']) ?></p>
        <?php ActiveForm::end() ?>
    </div>

</div>
</div>
