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

    /**
     * {@inheritdoc}
     */
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

    /**
     * Displays homepage.
     *
     * @return string
     */
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

//        var_dump($model);


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
//        var_dump($model);
        $model->updateCounters(['rating' => 1]);
        return $this->redirect('/post/'.$id.'#rating');
    }
    public function actionRatingminus($id)
    {
        $model= Posts::findOne($id);
//        var_dump($model);
        $model->updateCounters(['rating' => -1]);
        return $this->redirect('/post/'.$id.'#rating');
    }


    public function actionMyposts()
    {
        $model=Posts::find()->where(['owned_by_user'=>Yii::$app->user->identity->id])->all();
        return $this->render('user',['model'=>$model]);
    }

    public function actionUser($id)
    {
        $model=Posts::find()->where(['owned_by_user'=>$id])->all();
        return $this->render('to_user',['model'=>$model]);
    }

    public function actionComments($id)
    {
        $model=Posts::find()->where(['id'=>$id])->all();
        return $this->render('Comments',['model'=>$model]);
    }
//ratingplus
    /**
     * Login action.
     *
     * @return Response|string
     */

    /**
     * Logout action.
     *
     * @return Response
     */

}
