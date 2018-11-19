<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
//use app\models\Documents;
/**
 * ContactForm is the model behind the contact form.
 */
class General extends ActiveRecord {

    public static function tableName()
    {
        return 'general';
    }
    public static function search(){
        $data=General::findBySql('SELECT name,balance FROM general')->asArray()->all();
    return $data; 
    }
    public function balance($name){
        $query = General::findOne(['name' => $name,]);
        $balance = $query->balance;
        return $balance;
    }
    public function search_id($name){
        $query = General::findOne(['name' => $name,]);
        $id_user = $query->id_user;
        return $id_user;
    }
}