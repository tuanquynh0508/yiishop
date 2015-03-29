<?php
use yii\db\Schema;
use yii\db\Migration;

class m150329_044207_User extends Migration
{
    // public function init()
    // {
    //     $this->db = 'db2';
    //     parent::init();
    // }

    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => Schema::TYPE_PK,
            'username' => Schema::TYPE_STRING . ' NOT NULL',
            'auth_key' => Schema::TYPE_STRING . '(32) NOT NULL',
            'password_hash' => Schema::TYPE_STRING . ' NOT NULL',
            'password_reset_token' => Schema::TYPE_STRING,
            'first_name' => Schema::TYPE_STRING . '(50) NOT NULL',
            'last_name' => Schema::TYPE_STRING . '(50) NOT NULL',
            'email' => Schema::TYPE_STRING . ' NOT NULL',

            'status' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
            'last_login' => Schema::TYPE_DATETIME,
            'created_at' => Schema::TYPE_DATETIME . ' NOT NULL',
            'updated_at' => Schema::TYPE_DATETIME,
            'del_flg' => Schema::TYPE_SMALLINT . '(1) NOT NULL DEFAULT 0',
        ], $tableOptions);

        $this->createIndex('username_idx', '{{%user}}', 'username', true);
        $this->createIndex('email_idx', '{{%user}}', 'email', true);

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
        $this->dropTable('{{%user}}');
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
