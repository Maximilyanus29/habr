<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $username
 * @property string $img
 * @property string $password
 * @property string $authKey
 * @property string $accessToken
 *
 * @property Posts[] $posts
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'img', 'password', 'authKey', 'accessToken'], 'required'],
            [['username', 'img', 'password', 'authKey'], 'string', 'max' => 255],
            [['accessToken'], 'string', 'max' => 2555],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'img' => 'Img',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */


    public function getPosts()
    {
        return $this->hasMany(Posts::className(), ['owned_by_user' => 'id']);
    }

    public function createUser($arr){

        $this->username=$arr['username'];
        $this->password=$arr['password'];
        $this->img='1';
        $this->authKey='1';
        $this->accessToken='1';
        $this->rating=0;
        $this->karma=0;
        $this->name=0;
        $this->is_admin=0;
        $this->date=0;
        $this->bookmarks=0;
        $this->save();
    }

}
