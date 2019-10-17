<?php


namespace app\models;


use Yii;
use yii\base\Model;

class Comment extends Model
{
    public $text;
    public $username;
    public $post;


    public function rules()
    {
        return [
            // username and password are both required
            [['text'], 'required']
            // rememberMe must be a boolean value
            // password is validated by validatePassword()


        ];
    }

    public function postComment($id)
    {
        $this->post=$id;
        if (!Yii::$app->user->isGuest){

            $this->username = Yii::$app->user->identity->getId();
        }
        else{
            return false;
        }
        $createComment = new Comments();
        $createComment->createComment((array)$this);
        return true;
    }


}