<?php
namespace common\components;

use yii\db\ActiveQuery;

class CActiveQuery extends ActiveQuery
{
    public function visible($del_flg = 0, $tableName = '')
    {
      if(!empty($tableName)) {
        $tableName = $tableName.'.';
      }
      $this->andWhere($tableName.'del_flg = :del_flg',[':del_flg'=>$del_flg]);

      return $this;
    }
}

