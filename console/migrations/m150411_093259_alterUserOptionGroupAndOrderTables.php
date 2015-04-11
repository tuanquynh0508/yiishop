<?php

use yii\db\Schema;
use jamband\schemadump\Migration;

class m150411_093259_alterUserOptionGroupAndOrderTables extends Migration
{
    public function up()
    {
        //Add new column for User table
		$this->addColumn('{{%user}}', 'is_super', Schema::TYPE_SMALLINT . "(1) NULL DEFAULT '0' AFTER `status`");
		
		//Add new column for Option Group table
		$this->addColumn('{{%option_group}}', 'option_type', Schema::TYPE_STRING . "(25) NULL DEFAULT 'text' AFTER `title`");
		
		//Add new column for Order table
		$this->addColumn('{{%order}}', 'is_readed', Schema::TYPE_SMALLINT . "(1) NULL DEFAULT '0' AFTER `shipment_method`");
    }
}
