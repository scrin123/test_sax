<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\General;
use app\models\Documents;
use app\models\CalculateForm;


class MainController extends Controller{

                public $layout = 'main';
                    
                public function actionIndex(){
                   // $table_user= new General();
                   // $base = new Documents();
                    $calculate_model= new CalculateForm();
                    $date=General::search();
                    if($calculate_model->load(Yii::$app->request->post())){
                        //var_dump(General::search_id(Yii::$app->request->post()['CalculateForm']['sender']));
                        if (($calculate_model->validate()) and 
                        (Yii::$app->request->post()['CalculateForm']['much'] <= General::balance(Yii::$app->request->post()['CalculateForm']['sender']))){
                            $sender_id=General::search_id(Yii::$app->request->post()['CalculateForm']['sender']);
                            $getter_id=General::search_id(Yii::$app->request->post()['CalculateForm']['getter']);
                                Documents::check_param($sender,$getter,Yii::$app->request->post()['CalculateForm']['much']);
                                Documents::insert_db($sender_id,$getter_id,Yii::$app->request->post()['CalculateForm']['much']);
                                Yii::$app->session->setFlash('success','Данные записаны');
                                    
                        
                           return $this->refresh();
                           
                        }elseif(((General::search_id(Yii::$app->request->post()['CalculateForm']['sender'])== NULL) or (General::search_id(Yii::$app->request->post()['CalculateForm']['getter'])== NULL)) ){
                            Yii::$app->session->setFlash('error','Одного из пользователей не сущесвует. Введите пользователя из таблицы доступных пользователей');
                        }
                        else{
                            //echo "ОШИБКА";
                            //echo General::search_id(Yii::$app->request->post()['CalculateForm']['sender']);
                            Yii::$app->session->setFlash('error','Баланса не достаточно');
                        }
                    }
                    return $this->render('index',compact('date','calculate_model'));
                }


}





?>