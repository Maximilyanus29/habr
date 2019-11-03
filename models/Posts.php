<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

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
 * @property string $time
 * @property string $uservoted
 * @property string $viewed
 *
 * @property Comment[] $comments
 * @property Category $inCategory
 * @property User $ownedByUser
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

            [['pageText', 'viewed'], 'string'],
            [['in_category', 'owned_by_user', 'count_view', 'count_bookmarked', 'rating'], 'integer'],
            [['date', 'time'], 'safe'],
            [['h1', 'description'], 'string', 'max' => 255],
            [['uservoted'], 'string', 'max' => 255],
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
            'time' => 'Time',
            'uservoted' => 'Uservoted',
            'viewed' => 'Viewed',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['post' => 'id']);
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


    public function processCountViewPost()
    {
        $session = Yii::$app->session;
        // Если в сессии отсутствуют данные,
        // создаём, увеличиваем счетчик, и записываем в бд
        if (!isset($session['blog_post_view'])) {
            $session->set('blog_post_view', [$this->id]);
            $this->updateCounters(['count_view' => 1]);
            // Если в сессии уже есть данные то проверяем засчитывался ли данный пост
            // если нет то увеличиваем счетчик, записываем в бд и сохраняем в сессию просмотр этого поста
        } else {
            if (!ArrayHelper::isIn($this->id, $session['blog_post_view'])) {
                $array = $session['blog_post_view'];
                array_push($array, $this->id);
                $session->remove('blog_post_view');
                $session->set('blog_post_view', $array);
                $this->updateCounters(['count_view' => 1]);
            }
        }
        return true;
    }


//    public function createPost($arr){
//
//        $this->h1=$arr['h1'];
//        $this->pageText=$arr['text'];
//        $this->description='faesgrdtfyfd';
//        $this->in_category=$arr['product_category'];
//        $this->owned_by_user=$arr['username'];
//        $this->count_view=0;
//        $this->count_bookmarked=0;
//        $this->rating=0;
//        $this->date=date('Y-m-d H:i:s');
//        $this->save();
//    }
}
