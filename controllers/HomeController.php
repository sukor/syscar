<?php

namespace app\controllers;

use yii\data\ActiveDataProvider;
use app\models\Employees;
use yii\data\ArrayDataProvider;

class HomeController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionWelcome()
    {

        return $this->render('welcome');
    }


      public function actionEmployees()
    {
        $query=Employees::find();
        /* select * from employess
        */

        $provider=new ActiveDataProvider([
        	 'query'=>$query,
        	 'pagination'=>['pagesize'=>10]

        	]);

         
         $d['dataprovider']=$provider;

      
        return $this->render('employees',$d);
    }



     public function actionEmployees2()
    {
        $query=Employees::find()->all();
        /* select * from employess
        */

        $provider=new ArrayDataProvider([
        	 'allModels'=>$query,
        	 'pagination'=>['pagesize'=>10]

        	]);

         
         $d['dataprovider']=$provider;

      
        return $this->render('employees',$d);
    }









}
