<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class CalculateForm extends Model{
    public $sender;
    public $getter;
    public $much;


    public function attributeLabels()
    {
        return [
          'sender' => 'Имя отправителя',
          'getter' => 'Имя получателя ',
          'much' => 'Сумма ',
        ];
    }
    public function rules()
    {
        return [
            [ ['sender','getter','much'], 'required'],
            [ 'much','double' ],
            [ 'sender','string','max'=> 6,'tooLong' => 'Имя должен быть больше 5 символов'],
            [ 'getter','string','max'=> 6,'tooShort' => 'Имя должен быть больше 4 символов' ],
            
        ];
    }


}