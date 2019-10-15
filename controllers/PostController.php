<?php

namespace app\controllers;

use app\models\Comment;
use app\models\Comments;
use app\models\CreatePost;
use app\models\Posts;
use app\models\UploadForm;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\UploadedFile;

class PostController extends Controller
{
    /**
     * {@inheritdoc}
     */

    public $layout='mhabr';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {

        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }



    public function actionIndex($id)
    {
        $comments= Comments::findAll(['post' => $id]);
        $comment = new Comment();
        $model= Posts::findOne($id);
        $model->updateCounters(['count_view' => 1]);

        if ($comment->load(Yii::$app->request->post()) && $comment->validate()) {
            if ($comment->postComment($id)){

                return $this->renderAjax('comment',['comment'=>$comment]);
            }

            else{
                var_dump($model);
            }
        }

        $this->view->registerMetaTag([
            'name' => 'keywords',
            'content' => 'OskolNews, oskolnews, новости оскола, старый оскол, новости'
        ]);
        $this->view->registerMetaTag([
            'name' => 'description',
            'content' => 'Бесплатно Просмотр, Публикация - статей, новостей'
        ]);

        return $this->render('index',['model'=>$model,'comment'=> $comment,'comments'=>$comments]);
    }

    public function actionPostcreate()
    {
        $model = new CreatePost();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->newPost()){
                return $this->render('success');
            }
            else{
                var_dump($model);
            }
        }
        return $this->render('postcreate',['model'=>$model]);
    }


    public function actionRatingplus($id)
    {
        $model= Posts::findOne($id);
        $model->updateCounters(['rating' => 1]);
        return $this->redirect('/post/'.$id.'#rating');
    }
    public function actionRatingminus($id)
    {
        $model= Posts::findOne($id);
        $model->updateCounters(['rating' => -1]);
        return $this->redirect('/post/'.$id.'#rating');
    }




    public function actionComments($id)
    {
        $model=Posts::find()->where(['id'=>$id])->all();
        return $this->render('comments',['model'=>$model]);
    }

}
