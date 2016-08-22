<?php

namespace app\controllers;
use Yii;
use yii\data\ActiveDataProvider;
use app\models\Employees;
use yii\data\ArrayDataProvider;
use yii\data\Pagination;

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

    
    public function actionEmployees3(){

     $employees= new Employees();
     $employees->employeeNumber='12345';
     $employees->lastName='abu';
     $employees->officeCode=4;
   if($employees->validate()){
    $employees->save();
   }else{

   $status= $employees->getErrors();

   print_r($status);

   }
}

   public function actionEmployees4(){
       
 $model= Employees::find()
 ->select('lastName,email');
 //->where(['officeCode'=>1]);


  $provider=new ActiveDataProvider([
             'query'=>$model,
             'pagination'=>['pagesize'=>10]

            ]);


$d['dataprovider']=$provider;

  return $this->render('employees4',$d);


   }


   public function actionEmployees5(){


    $model=Employees::find()->joinWith('officeCode0');
    $count =$model->count();

    $pagination= new Pagination(['totalCount'=>$count,
        'pageSize'=>10]);

    $employees= $model->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();


      $d['models']=$employees;
      $d['pages']=$pagination;  
      $d['count']=$pagination->offset;       

    return $this->render('employees5',$d);

   }
     



 public function actionDetailEmployees($id){

    $model=Employees::findOne($id);


    $d['model']=$model;

    return $this->render('employees6',$d);



 }

 public function actionEmployees7(){

    $model = new Employees();

    $d['model']= $model;

   if ($model->load(Yii::$app->request->post()) && $model->validate()) {
return $this->render('employees7',$d);

   

    }else{

$status= $model->getErrors();

  // print_r($status);
//
return $this->render('employees7',$d);
    }


   //return $this->render('employees7',$d);



 }

    







}
