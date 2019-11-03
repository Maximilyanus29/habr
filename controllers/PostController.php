<?php

namespace app\controllers;

use app\models\Comment;
use app\models\Comments;
use app\models\CreatePost;
use app\models\Posts;
use app\models\UploadForm;
use app\models\User;
use app\models\Users;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\UploadedFile;
use app\models\Findincollection;

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
        $model->processCountViewPost();
//        $model->updateCounters(['count_view' => 1]);



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
        if (Yii::$app->user->isGuest){
            return $this->redirect('/login');
        }

        $user = Yii::$app->user->identity->getId();

        $model= Posts::findOne($id);




        if (empty(Findincollection::parse($model->uservoted))){
            $model->updateCounters(['rating' => 1]);
            $model->uservoted = $model->uservoted.$user.', ';
            $model->save();
            return $this->redirect('/post/'.$id.'#rating');
        }
        else{
            return 'Вы уже голосовали';
        }


    }
    public function actionRatingminus($id)
    {
        if (Yii::$app->user->isGuest){
            return $this->redirect('/login');
        }


        $user = Yii::$app->user->identity->getId();

        $model= Posts::findOne($id);




        if (empty(Findincollection::parse($model->uservoted))){
            $model->updateCounters(['rating' => -1]);
            $model->uservoted = $model->uservoted.$user.', ';
            $model->save();
            return $this->redirect('/post/'.$id.'#rating');
        }
        else{
            return 'Вы уже голосовали';
        }
    }




    public function actionComments($id)
    {


        $model=Posts::find()->where(['id'=>$id])->one();
        $comments=Comments::find()->where(['post'=>$id])->orderBy('date ASC')->all();
        $commentForm= new Comment();

        if ($commentForm->load(Yii::$app->request->post()) && $commentForm->validate()) {
            if ($commentForm->postComment($id)){

                return $this->refresh();
            }

            else{
                var_dump($commentForm);
                $err='Не отправлено';
                return $this->render('comments',['model'=>$model,'comments'=>$comments,'commentForm'=>$commentForm,'err'=>$err]);
            }
        }
        return $this->render('comments',['model'=>$model,'comments'=>$comments,'commentForm'=>$commentForm]);
    }



}
