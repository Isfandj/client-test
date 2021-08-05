<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;

use app\models\Orders;
use app\models\Payment;
use app\models\UserInfo;

class PaymentController extends Controller{
	public function actionPay($order_id){
		$model = new Orders();
		$payment = new Payment();
		$order = $model->findOne($order_id);
		$price_for_client = $order->amount / 100;

		$balance = $this->getBalanceUser($order);
		if ($balance < $order->amount) {
			echo 'Недастаточно средств на счету, на данный момент у вас на счету: ' . number_format($balance/100) . ' сум';
			die;
		}

		if ($payment->load(Yii::$app->request->post())) {
			$payment_form = $_POST['Payment'];
			$order_form = $_POST['Orders'];
			if (isset($payment_form['card_num'])) {
				$valid_card = $this->is_valid_credit_card($payment_form['card_num']);
				if (!$valid_card) {
					return $this->render('pay',[
						'order'=>$order,
						'price_for_client'=>$price_for_client,
						'payment'=>$payment
					]);
				}
				$payment_status = $this->makePayment($order_form,$payment_form['card_num']);
				if ($payment_status['errorMsg'] == 'Ok') {
					$user_info = new UserInfo();
					$balance = $user_info->findOne($order_form['user_id']);
					if ($balance != null) {
						$balance_new = $balance->balance +  $order_form['amount'];
						$balance->balance = $balance_new;
						if ($balance->save()) {
							
							$this->redirect('/');	
						}
					}
				}
			}else{
				$payment_status = $this->makePayment($order_form,$payment_form['card_num']);
				if ($payment_status['errorMsg'] == 'Ok') {
					$user_info = new UserInfo();
					$balance = $user_info->findOne($order_form['user_id']);
					if ($balance != null) {
						$balance_new = $balance->balance +  $order_form['amount'];
						$balance->balance = $balance_new;
						if ($balance->save()) {
							$this->redirect('/');	
						}
					}
				}

			}
		}

		return $this->render('pay',[
			'order'=>$order,
			'price_for_client'=>$price_for_client,
			'payment'=>$payment
		]);
	}

	public function getBalanceUser($order){
		$client = new \mongosoft\soapclient\Client([
            'url' => 'http://server-test.loc/api/',
        ]);

        $array = [
            'username' => 'user',
            'password' => 'pwd',
            'parameters' => [
                'user_id' => $order->user_id,
            ],
            'serviceId' => $order->service_id
        ];
        $request = $client->GetInformation(json_encode($array));
        return $request['parameters']['balance'];
	}


	public function is_valid_credit_card($s) {
		$check_is_virtual_card = substr($s, 0, 3);
		if ($check_is_virtual_card != 999) {
			return false;
			exit;
		}
	    $s = strrev(preg_replace('/[^\d]/','',$s));
	    $sum = 0;
	    for ($i = 0, $j = strlen($s); $i < $j; $i++) {
	        if (($i % 2) == 0) {
	            $val = $s[$i];
	        } else {
	            $val = $s[$i] * 2;
	            if ($val > 9)  $val -= 9;
	        }
	        $sum += $val;
	    }
	    return (($sum % 10) == 0);
	}

	public function makePayment($order,$payment_form){
		$client = new \mongosoft\soapclient\Client([
            'url' => 'http://server-test.loc/api',
        ]);

        $array = [
            'username' => 'user',
            'password' => 'pwd',
            'parameters' => [
                'user_id' => $order['user_id'],
                'amount' => $order['amount'],
            ],
            'serviceId' => $order->service_id
        ];
        $request = $client->PerfomTransaction(json_encode($array));
        return $request;
	}
}