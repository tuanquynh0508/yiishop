<?php

use yii\db\Schema;
use jamband\schemadump\Migration;

class m150412_060246_alterProductOptionTable extends Migration
{
    public function up()
    {		
		//Add new column for Option Group table
		$this->addColumn('{{%product_option}}', 'option_value', Schema::TYPE_STRING . "(255) NULL DEFAULT 'text' AFTER `option_id`");
    }
}
