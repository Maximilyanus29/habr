<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "posts".
 *
 * @property int $id
 * @property string $h1
 * @property string $pageText
 * @property string $description
 * @property int $in_category
 * @property int $owned_by_user
 * @property int $count_view
 * @property int $count_bookmarked
 * @property int $rating
 * @property string $date
 *
 * @property Category $inCategory
 * @property Users $ownedByUser
 */
class Posts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['h1', 'pageText', 'description', 'in_category', 'owned_by_user', 'count_view', 'count_bookmarked', 'rating', 'date'], 'required'],
            [['pageText'], 'string'],
            [['in_category', 'owned_by_user', 'count_view', 'count_bookmarked', 'rating'], 'integer'],
            [['date'], 'safe'],
            [['h1', 'description'], 'string', 'max' => 255],
            [['in_category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['in_category' => 'Id']],
            [['owned_by_user'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['owned_by_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'h1' => 'H1',
            'pageText' => 'Page Text',
            'description' => 'Description',
            'in_category' => 'In Category',
            'owned_by_user' => 'Owned By User',
            'count_view' => 'Count View',
            'count_bookmarked' => 'Count Bookmarked',
            'rating' => 'Rating',
            'date' => 'Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInCategory()
    {
        return $this->hasOne(Category::className(), ['Id' => 'in_category']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOwnedByUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'owned_by_user']);
    }

    public function getDate()
    {

    }

}
