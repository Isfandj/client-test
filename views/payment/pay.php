<?php 
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use borales\extensions\phoneInput\PhoneInput;
 ?>
<div class="wrap-pay">

	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="pay-card">
					
					<h1>Пополнение кошелька на сумму: <?=number_format($price_for_client)?></h1>
					<div class="pay-form">
						<div class="col-md-6">
							<?php $form = ActiveForm::begin()?>
								<label>Оплата по номеру телефону</label>
								<?= $form->field($payment, 'phone')->label(false)->widget(PhoneInput::className(), ['jsOptions' => ['preferredCountries' => ['uz'],]]); ?>
								<?= $form->field($order, 'user_id')->hiddenInput(['value'=> "1"])->label(false); ?>
                				<?= $form->field($order, 'amount')->hiddenInput(['value'=> $order->amount])->label(false); ?>
                				<?= $form->field($order, 'service_id')->hiddenInput(['value'=> "1"])->label(false); ?>
								<?= Html::submitButton('Пополнить', ['class' => 'btn btn-success']) ?>
							<?php ActiveForm::end() ?>
						</div>
						<div class="col-md-6">
							<?php $form = ActiveForm::begin()?>
								<?= $form->field($payment, 'card_num')->label('Оплата по карте')->textInput(['class'=>'phone-form form-control', 'maxlength' => '16','placeholder'=>'9991222233334444','onkeypress' => 'validate(event)']); ?>
								<?= $form->field($order, 'user_id')->hiddenInput(['value'=> "1"])->label(false); ?>
                				<?= $form->field($order, 'amount')->hiddenInput(['value'=> $order->amount])->label(false); ?>
                				<?= $form->field($order, 'service_id')->hiddenInput(['value'=> "1"])->label(false); ?>
								<?= Html::submitButton('Пополнить', ['class' => 'btn btn-success']) ?>
							<?php ActiveForm::end() ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function validate(evt) {
  var theEvent = evt || window.event;

  // Handle paste
  if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
  } else {
  // Handle key press
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
  }
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}
</script>