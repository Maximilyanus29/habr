<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class CreateUser extends Model
{
    public $username;
    public $password;



//    public $uploadFile;



    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required']
            // rememberMe must be a boolean value
            // password is validated by validatePassword()


        ];
    }




    public function newUser()
    {
        $createUser= Users::find()->where(['username'=>$this->username])->one();
        if(!$createUser){
            $createUser=new Users();
            $createUser->createUser((array)$this);
            return true;
        }
        else {
            return 'такой пользователь уже есть';
        }


    }




    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */


    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */


    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */



}
