<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class Documents extends ActiveRecord {

    public static function tableName()
    {
        return 'documents';
    }
    public function insert_db($from,$to,$much){
          $values = [
            'from' => (int) $from,
            'to' => (int) $to,
            'much' => (int) $much,
        ];
        $base = new Documents();
          $base->from = $values['from'];
          $base->to = $values['to'];
          $base->much = $values['much'];
          $base->save();
      }
      public function check_param($sender,$getter,$much){
         // $general = new General();
          if(General::search_id($sender)==General::search_id($getter)){
              return false;
          }
      }

}