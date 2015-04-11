<?php
namespace backend\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class ChangePasswordForm extends Model
{
    public $passwordOld;
	public $password;
    public $passwordConfirm;    

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['password', 'passwordConfirm', 'passwordOld'], 'required'],
			[['passwordConfirm'], 'compare', 'compareAttribute' => 'password'],
            ['password', 'string', 'min' => 6],
			['passwordOld', 'oldPasswordValidation'],
			
        ];
    }
	
	/**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
			'password' => Yii::t('user', 'Password'),
			'passwordConfirm' => Yii::t('user', 'Password Confirm'),
			'passwordOld' => Yii::t('user', 'Password Old'),
        ];
    }
	
	public function oldPasswordValidation($attribute, $params){
		// add custom validation
		if(!Yii::$app->user->identity->validatePassword($this->$attribute))
			$this->addError($attribute,Yii::t('user', 'Nhập sai mật khẩu cũ'));
	}
	
    /**
     * Change password User
     */
    public function changePassword()
    {
        if ($this->validate()) {
			Yii::$app->user->identity->setPassword($this->password);
			return Yii::$app->user->identity->save();
        }

        return null;
    }
}
