<?php 
namespace app\controllers;

use Yii;
use yii\web\Controller;
use mongosoft\soapserver\Action;
use app\models\Users;
class ApiController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'GetInformation' => 'mongosoft\soapserver\Action',
        ];
    }

    /**
     * @param string $request
     * @return string
     * @soap
     */
    public function GetInformation($request)
    {
       
        $user = $this->checkLogin($request);
        if ($user == false) {
            $this->sendError("login");
            exit;
        }
        $this->GetInformationResponse($user);
    }

    private function checkLogin($request){
        $request = json_decode($request,true);
        $users = new Users();
        $user = $users->findOne($request['parameters']['user_id']);
        if ($user != null) {
            return $user;
            exit;
        }else{
            return false;
        }
    }

    private function GetInformationResponse($request){
        $data_to_return = [
            'errorMsg' => 'Ok',
            'status' => '0',
            'timeStamp' => Yii::$app->formatter->asTimestamp(date('Y-d-m h:i:s')),
            'parameters' => [
                'balance' => $user->balance,
                'username' => $user->username 
            ]
        ];
        
    }


}
 ?>