<?php
use yii\db\Schema;
use jamband\schemadump\Migration;

class m150330_021937_init extends Migration
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
      $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
    }

    // tbl_category
    $this->createTable('{{%category}}', [
        'id' => Schema::TYPE_PK,
        'parent_id' => Schema::TYPE_INTEGER . "(11) NULL",
        'slug' => Schema::TYPE_STRING . "(255) NOT NULL",
        'title' => Schema::TYPE_STRING . "(255) NOT NULL",
        'description' => Schema::TYPE_TEXT . " NULL",
        'created_at' => Schema::TYPE_DATETIME . " NULL",
        'updated_at' => Schema::TYPE_DATETIME . " NULL",
        'del_flg' => Schema::TYPE_SMALLINT . "(1) NULL DEFAULT '0'",
    ], $tableOptions);

    // tbl_category_product
    $this->createTable('{{%category_product}}', [
        'category_id' => Schema::TYPE_INTEGER . "(11) NOT NULL",
        'product_id' => Schema::TYPE_BIGINT . "(20) NOT NULL",
        'PRIMARY KEY (category_id, product_id)',
    ], $tableOptions);

    // tbl_customer
    $this->createTable('{{%customer}}', [
        'id' => Schema::TYPE_PK,
        'first_name' => Schema::TYPE_STRING . "(50) NOT NULL",
        'last_name' => Schema::TYPE_STRING . "(50) NOT NULL",
        'sex' => Schema::TYPE_SMALLINT . "(1) NULL DEFAULT '0'",
        'email' => Schema::TYPE_STRING . "(255) NOT NULL",
        'tel' => Schema::TYPE_STRING . "(30) NULL",
        'district_id' => Schema::TYPE_INTEGER . "(11) NULL",
        'address' => Schema::TYPE_TEXT . " NULL",
        'customer_pwd' => Schema::TYPE_STRING . "(255) NULL",
        'created_at' => Schema::TYPE_DATETIME . " NULL",
        'updated_at' => Schema::TYPE_DATETIME . " NULL",
        'del_flg' => Schema::TYPE_SMALLINT . "(1) NULL DEFAULT '0'",
    ], $tableOptions);

    // tbl_firm
    $this->createTable('{{%firm}}', [
        'id' => Schema::TYPE_PK,
        'title' => Schema::TYPE_STRING . "(255) NOT NULL",
        'logo' => Schema::TYPE_STRING . "(255) NULL",
        'created_at' => Schema::TYPE_DATETIME . " NULL",
        'updated_at' => Schema::TYPE_DATETIME . " NULL",
        'del_flg' => Schema::TYPE_SMALLINT . "(1) NULL DEFAULT '0'",
    ], $tableOptions);

    // tbl_news
    $this->createTable('{{%news}}', [
        'id' => Schema::TYPE_PK,
        'slug' => Schema::TYPE_STRING . "(255) NOT NULL",
        'title' => Schema::TYPE_STRING . "(255) NOT NULL",
        'content' => Schema::TYPE_TEXT . " NULL",
        'views' => Schema::TYPE_INTEGER . "(11) NULL",
        'created_at' => Schema::TYPE_DATETIME . " NULL",
        'updated_at' => Schema::TYPE_DATETIME . " NULL",
        'del_flg' => Schema::TYPE_SMALLINT . "(1) NULL DEFAULT '0'",
    ], $tableOptions);

    // tbl_option
    $this->createTable('{{%option}}', [
        'id' => Schema::TYPE_PK,
        'option_group_id' => Schema::TYPE_INTEGER . "(11) NOT NULL",
        'title' => Schema::TYPE_STRING . "(255) NULL",
        'created_at' => Schema::TYPE_DATETIME . " NULL",
        'updated_at' => Schema::TYPE_DATETIME . " NULL",
        'del_flg' => Schema::TYPE_SMALLINT . "(1) NULL DEFAULT '0'",
    ], $tableOptions);

    // tbl_option_group
    $this->createTable('{{%option_group}}', [
        'id' => Schema::TYPE_PK,
        'title' => Schema::TYPE_STRING . "(255) NULL",
        'created_at' => Schema::TYPE_DATETIME . " NULL",
        'updated_at' => Schema::TYPE_DATETIME . " NULL",
        'del_flg' => Schema::TYPE_SMALLINT . "(1) NULL DEFAULT '0'",
    ], $tableOptions);

    // tbl_order
    $this->createTable('{{%order}}', [
        'id' => Schema::TYPE_BIGPK,
        'customer_id' => Schema::TYPE_INTEGER . "(11) NULL",
        'fullname' => Schema::TYPE_STRING . "(255) NULL",
        'email' => Schema::TYPE_STRING . "(255) NULL",
        'tel' => Schema::TYPE_STRING . "(30) NULL",
        'address' => Schema::TYPE_TEXT . " NULL",
        'order_code' => Schema::TYPE_STRING . "(50) NOT NULL",
        'note' => Schema::TYPE_TEXT . " NULL",
        'payment_method' => Schema::TYPE_STRING . "(10) NOT NULL DEFAULT 'money' COMMENT 'money|bank'",
        'shipment_method' => Schema::TYPE_STRING . "(10) NOT NULL DEFAULT 'self' COMMENT 'self|city|outskirt'",
        'created_at' => Schema::TYPE_DATETIME . " NULL",
        'updated_at' => Schema::TYPE_DATETIME . " NULL",
        'del_flg' => Schema::TYPE_SMALLINT . "(1) NULL DEFAULT '0'",
    ], $tableOptions);

    // tbl_page
    $this->createTable('{{%page}}', [
        'id' => Schema::TYPE_PK,
        'slug' => Schema::TYPE_STRING . "(255) NOT NULL",
        'title' => Schema::TYPE_STRING . "(255) NULL",
        'content' => Schema::TYPE_TEXT . " NULL",
        'views' => Schema::TYPE_INTEGER . "(11) NULL",
        'created_at' => Schema::TYPE_DATETIME . " NULL",
        'updated_at' => Schema::TYPE_DATETIME . " NULL",
        'del_flg' => Schema::TYPE_SMALLINT . "(1) NULL DEFAULT '0'",
    ], $tableOptions);

    // tbl_product
    $this->createTable('{{%product}}', [
        'id' => Schema::TYPE_BIGPK,
        'firm_id' => Schema::TYPE_INTEGER . "(11) NOT NULL",
        'upc' => Schema::TYPE_STRING . "(255) NOT NULL",
        'slug' => Schema::TYPE_STRING . "(255) NOT NULL",
        'title' => Schema::TYPE_STRING . "(255) NOT NULL",
        'description' => Schema::TYPE_TEXT . " NULL",
        'wholesale_prices' => Schema::TYPE_FLOAT . " NULL",
        'retail_price' => Schema::TYPE_FLOAT . " NULL",
        'cost' => Schema::TYPE_FLOAT . " NULL DEFAULT '0'",
        'made' => Schema::TYPE_STRING . "(2) NULL DEFAULT 'vn'",
        'quantity' => Schema::TYPE_INTEGER . "(11) NULL DEFAULT '0'",
        'out_of_stock' => Schema::TYPE_SMALLINT . "(1) NULL DEFAULT '0'",
        'is_new' => Schema::TYPE_SMALLINT . "(1) NULL DEFAULT '0'",
        'is_special' => Schema::TYPE_SMALLINT . "(1) NULL DEFAULT '0'",
        'views' => Schema::TYPE_INTEGER . "(11) NULL",
        'created_at' => Schema::TYPE_DATETIME . " NULL",
        'updated_at' => Schema::TYPE_DATETIME . " NULL",
        'del_flg' => Schema::TYPE_SMALLINT . "(1) NULL DEFAULT '0'",
    ], $tableOptions);

    // tbl_product_img
    $this->createTable('{{%product_img}}', [
        'id' => Schema::TYPE_BIGPK,
        'product_id' => Schema::TYPE_BIGINT . "(20) NOT NULL",
        'file' => Schema::TYPE_STRING . "(255) NULL",
        'width' => Schema::TYPE_FLOAT . " NULL",
        'height' => Schema::TYPE_FLOAT . " NULL",
        'size' => Schema::TYPE_FLOAT . " NULL",
        'ext' => Schema::TYPE_STRING . "(5) NULL",
        'is_default' => Schema::TYPE_SMALLINT . "(1) NULL DEFAULT '0'",
        'created_at' => Schema::TYPE_DATETIME . " NULL",
        'updated_at' => Schema::TYPE_DATETIME . " NULL",
        'del_flg' => Schema::TYPE_SMALLINT . "(1) NULL DEFAULT '0'",
    ], $tableOptions);

    // tbl_product_option
    $this->createTable('{{%product_option}}', [
        'product_id' => Schema::TYPE_BIGINT . "(20) NOT NULL",
        'option_id' => Schema::TYPE_INTEGER . "(11) NOT NULL",
        'created_at' => Schema::TYPE_DATETIME . " NULL",
        'updated_at' => Schema::TYPE_DATETIME . " NULL",
        'del_flg' => Schema::TYPE_SMALLINT . "(1) NULL DEFAULT '0'",
        'PRIMARY KEY (product_id, option_id)',
    ], $tableOptions);

    // tbl_product_order
    $this->createTable('{{%product_order}}', [
        'order_id' => Schema::TYPE_BIGINT . "(20) NOT NULL",
        'product_id' => Schema::TYPE_BIGINT . "(20) NOT NULL",
        'cost' => Schema::TYPE_FLOAT . " NOT NULL",
        'quantity' => Schema::TYPE_INTEGER . "(11) NOT NULL",
        'upc' => Schema::TYPE_STRING . "(255) NOT NULL",
        'created_at' => Schema::TYPE_DATETIME . " NULL",
        'updated_at' => Schema::TYPE_DATETIME . " NULL",
        'PRIMARY KEY (order_id, product_id)',
    ], $tableOptions);

    // tbl_product_review
    $this->createTable('{{%product_review}}', [
        'id' => Schema::TYPE_BIGPK,
        'product_id' => Schema::TYPE_BIGINT . "(20) NOT NULL",
        'fullname' => Schema::TYPE_STRING . "(255) NULL",
        'email' => Schema::TYPE_STRING . "(255) NULL",
        'content' => Schema::TYPE_TEXT . " NULL",
        'rate' => Schema::TYPE_SMALLINT . "(6) NULL",
        'ip' => Schema::TYPE_STRING . "(50) NULL",
        'created_at' => Schema::TYPE_DATETIME . " NULL",
        'updated_at' => Schema::TYPE_DATETIME . " NULL",
        'del_flg' => Schema::TYPE_SMALLINT . "(1) NULL DEFAULT '0'",
    ], $tableOptions);

    // tbl_product_sale
    $this->createTable('{{%product_sale}}', [
        'sale_id' => Schema::TYPE_INTEGER . "(11) NOT NULL",
        'product_id' => Schema::TYPE_BIGINT . "(20) NOT NULL",
        'PRIMARY KEY (sale_id, product_id)',
    ], $tableOptions);

    // tbl_sale
    $this->createTable('{{%sale}}', [
        'id' => Schema::TYPE_PK,
        'title' => Schema::TYPE_STRING . "(255) NOT NULL",
        'sale' => Schema::TYPE_FLOAT . " NOT NULL",
        'start_date' => Schema::TYPE_DATETIME . " NULL",
        'end_date' => Schema::TYPE_DATETIME . " NULL",
        'created_at' => Schema::TYPE_DATETIME . " NULL",
        'updated_at' => Schema::TYPE_DATETIME . " NULL",
        'del_flg' => Schema::TYPE_SMALLINT . "(1) NULL DEFAULT '0'",
    ], $tableOptions);

    // tbl_user
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

    ///////////////////////////////////////////////////////////////////////////////////

    // fk: tbl_category_product
    $this->addForeignKey('fk_tbl_category_product_category_id', '{{%category_product}}', 'category_id', '{{%category}}', 'id');
    $this->addForeignKey('fk_tbl_category_product_product_id', '{{%category_product}}', 'product_id', '{{%product}}', 'id');

    // fk: tbl_option
    $this->addForeignKey('fk_tbl_option_option_group_id', '{{%option}}', 'option_group_id', '{{%option_group}}', 'id');

    // fk: tbl_product
    $this->addForeignKey('fk_tbl_product_firm_id', '{{%product}}', 'firm_id', '{{%firm}}', 'id');

    // fk: tbl_product_img
    $this->addForeignKey('fk_tbl_product_img_product_id', '{{%product_img}}', 'product_id', '{{%product}}', 'id');

    // fk: tbl_product_option
    $this->addForeignKey('fk_tbl_product_option_product_id', '{{%product_option}}', 'product_id', '{{%product}}', 'id');
    $this->addForeignKey('fk_tbl_product_option_option_id', '{{%product_option}}', 'option_id', '{{%option}}', 'id');

    // fk: tbl_product_order
    $this->addForeignKey('fk_tbl_product_order_order_id', '{{%product_order}}', 'order_id', '{{%order}}', 'id');
    $this->addForeignKey('fk_tbl_product_order_product_id', '{{%product_order}}', 'product_id', '{{%product}}', 'id');

    // fk: tbl_product_review
    $this->addForeignKey('fk_tbl_product_review_product_id', '{{%product_review}}', 'product_id', '{{%product}}', 'id');

    // fk: tbl_product_sale
    $this->addForeignKey('fk_tbl_product_sale_sale_id', '{{%product_sale}}', 'sale_id', '{{%sale}}', 'id');
    $this->addForeignKey('fk_tbl_product_sale_product_id', '{{%product_sale}}', 'product_id', '{{%product}}', 'id');

    ///////////////////////////////////////////////////////////////////////////////////
    // index: tbl_category
    $this->createIndex('slug_idx', '{{%category}}', 'slug', true);

    // index: tbl_customer
    $this->createIndex('email_idx', '{{%customer}}', 'email', true);
    $this->createIndex('tel_idx', '{{%customer}}', 'tel', false);

    // index: tbl_news
    $this->createIndex('slug_idx', '{{%news}}', 'slug', true);
    $this->createIndex('title_idx', '{{%news}}', 'title', false);

    // index: tbl_order
    $this->createIndex('fullname_idx', '{{%order}}', 'fullname', false);
    $this->createIndex('email_idx', '{{%order}}', 'email', false);
    $this->createIndex('tel_idx', '{{%order}}', 'tel', false);
    $this->createIndex('order_code_idx', '{{%order}}', 'order_code', false);

    // index: tbl_page
    $this->createIndex('slug_idx', '{{%page}}', 'slug', true);
    $this->createIndex('title_idx', '{{%page}}', 'title', false);

    // index: tbl_product
    $this->createIndex('upc_idx', '{{%product}}', 'upc', true);
    $this->createIndex('slug_idx', '{{%product}}', 'slug', true);
    $this->createIndex('firm_id_idx', '{{%product}}', 'firm_id', false);
    $this->createIndex('title_idx', '{{%product}}', 'title', false);
    $this->createIndex('cost_idx', '{{%product}}', 'cost', false);
    $this->createIndex('made_idx', '{{%product}}', 'made', false);

    // index: tbl_user
    $this->createIndex('username_idx', '{{%user}}', 'username', true);
    $this->createIndex('email_idx', '{{%user}}', 'email', true);
  }

  public function down()
  {
    //$this->dropTable('{{%user}}');
  }
}
