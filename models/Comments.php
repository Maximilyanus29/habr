<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property int $user_id
 * @property int $post
 * @property string $date
 * @property string $messege
 *
 * @property Posts $post0
 * @property Users $user
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'post', 'date', 'messege'], 'required'],
            [['user_id', 'post'], 'integer'],
            [['date'], 'safe'],
            [['messege'], 'string', 'max' => 255],
            [['post'], 'exist', 'skipOnError' => true, 'targetClass' => Posts::className(), 'targetAttribute' => ['post' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'post' => 'Post',
            'date' => 'Date',
            'messege' => 'Messege',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost0()
    {
        return $this->hasOne(Posts::className(), ['id' => 'post']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }

    public function getTime()
    {
        $time= new Query();
        $time->select('CURRENT_TIME()');
        return $time;
    }

    public function createComment($arr){

        $this->messege=$arr['text'];
        $this->user_id=$arr['username'];
        $this->date=date('Y-m-d');
        $this->time=$this->getTime();
        $this->post=$arr['post'];
        $this->save();
    }
}
