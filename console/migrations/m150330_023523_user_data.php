<?php

use yii\db\Schema;
use jamband\schemadump\Migration;

class m150330_023523_user_data extends Migration
{
   public function up()
    {
        //insert( $table, $columns )
        $users = $this->getUsers();
        $this->batchInsert('{{%user}}', [
            'username',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'first_name',
            'last_name',
            'email',
            'status',
            'created_at',
            'del_flg'
        ], $users);
    }

    public function down()
    {
        // $this->dropIndex('username_idx', '{{%user}}');
        // $this->dropIndex('email_idx', '{{%user}}');
        // $this->dropTable('{{%user}}');
        $this->truncateTable('{{%user}}');
    }

    protected function getUsers() {
        $security = Yii::$app->security;
        return array(
            array(
                'admin',
                $security->generateRandomString(),
                $security->generatePasswordHash('123456'),
                $security->generateRandomString() . '_' . time(),
                'Nguyen Nhu',
                'Tuan',
                'tuanquynh0508@gmail.com',
                10,
                date('Y-m-d H:i:s'),
                0
            ),
        );
    }
}
