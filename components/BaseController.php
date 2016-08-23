<?php
namespace app\components;

use yii;
use app\models\Role;
use yii\web\HttpException;

class BaseController extends yii\web\Controller
{
	public function init($child){
		parent::init();
		$ctrl = $child->id;
		//print_r($child->module);
		if(Yii::$app->user->isGuest){
            $this->redirect(['/user/login']);
        }else{
        	$user = Yii::$app->user->getIdentity();
        	if($ctrl=="products"){
        		if($user->role->id==Role::ROLE_ADMIN_NEGERI){
        			throw new HttpException(403,"Akses tidak dibenarkan");
        		}
        	}elseif($ctrl=="orders"){
        		if($user->role->id==Role::ROLE_ADMIN){
        			throw new HttpException(403,"Akses tidak dibenarkan");
        		}
        	}
        }
	}
}