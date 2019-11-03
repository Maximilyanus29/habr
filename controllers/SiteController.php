<?php

namespace app\controllers;

use app\models\Category;
use app\models\Comment;
use app\models\Comments;
use app\models\Companyes;
use app\models\CreateUser;
use app\models\LoginForm;
use app\models\Posts;
use app\models\Users;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\data\Pagination;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */

    public $layout='mhabr';
//    public $css=
//        'css/main.css'
//    ;



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
    public function BeforeActions()
    {
        var_dump($this);
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

    /**
     * Displays homepage.
     *
     * @return string
     */
//    public function actionIndex()
//    {
//
//        $model = Posts::find()->orderBy('rating DESC')->limit(10)->all();
//
//
//        return $this->render('index',['model'=>$model]);
//
//
//    }

    public function actionIndex()
    {
        // выполняем запрос
//        $query = Posts::find()->where(['owned_by_user' => 11]);
        $query = Posts::find()->orderBy('rating DESC');


        // делаем копию выборки
        $countQuery = clone $query;
        // подключаем класс Pagination, выводим по 10 пунктов на страницу
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 10]);

        // приводим параметры в ссылке к ЧПУ
        $pages->pageSizeParam = false;
        $model = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        $this->view->registerMetaTag([
            'name' => 'keywords',
            'content' => 'OskolNews, oskolnews, новости оскола, старый оскол, новости'
        ]);
        $this->view->registerMetaTag([
            'name' => 'description',
            'content' => 'Бесплатно Просмотр, Публикация - статей, новостей'
        ]);

//        $comments=Comments::find()->where(['post' => $model ])->all();
        // Передаем данные в представление
        return $this->render('index', [
            'model' => $model,
            'pages' => $pages,
        ]);
    }


    public function actionAll()
    {
        $query = Posts::find()->orderBy('date DESC');
//        var_dump($query);
        // делаем копию выборки
        $countQuery = clone $query;
        // подключаем класс Pagination, выводим по 10 пунктов на страницу
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 10]);
        // приводим параметры в ссылке к ЧПУ
        $pages->pageSizeParam = false;
        $model = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        // Передаем данные в представление
        return $this->render('index', [
            'model' => $model,
            'pages' => $pages,
        ]);



    }


    public function actionCategory($id)
    {
        $query = Posts::find()->where(['in_category'=>$id])->orderBy('date DESC');
//        var_dump($query);
        // делаем копию выборки
        $countQuery = clone $query;
        // подключаем класс Pagination, выводим по 10 пунктов на страницу
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 10]);
        // приводим параметры в ссылке к ЧПУ
        $pages->pageSizeParam = false;
        $model = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        if (empty($model)){
            return $this->render('empty');
        }
        // Передаем данные в представление
        return $this->render('index', [
            'model' => $model,
            'pages' => $pages,
        ]);

        return $this->render('index',['model'=>$model]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionSearch()
    {
        $model = Companyes::find()->all();
        return $this->render('search');
    }

    public function actionCompanyes()
    {
        $model = Companyes::find()->all();
        return $this->render('companyes',['model'=>$model]);
    }

    public function actionCompany($id)
    {
        $model = Companyes::find()->where(['id'=>$id])->one();
        return $this->render('company',['model'=>$model]);
    }

    public function actionHelp()
    {
        return $this->render('help');
    }

    public function actionCallback()
    {
        return $this->render('callback');
    }



    public function actionLogin()
    {

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionReg()
    {



        $model = new CreateUser();

        if ($model->load(Yii::$app->request->post())&& $model->validate()) {

            if ($model->newUser()){
                return $this->render('succes');
            }
            else{
                return $this->render('nosucces');
            }

        }

        $model->password = '';
        return $this->render('reg', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }



    public function actionAddbookmark($id)
    {

        if (!Yii::$app->user->isGuest) {
            $users = new Users();
            $user = $users->find()->where(['id' => Yii::$app->user->identity->getId()])->one();
            $user->bookmarks=$user->bookmarks.','.$id;

            $post = Posts::findOne($id);
            $post->updateCounters(['count_bookmarked' => 1]);

            $user->save();
            var_dump($user);
            return $this->redirect('/');

        }

        return false;
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
//    public function actionContact()
//    {
//        $model = new ContactForm();
//        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
//            Yii::$app->session->setFlash('contactFormSubmitted');
//
//            return $this->refresh();
//        }
//        return $this->render('contact', [
//            'model' => $model,
//        ]);
//    }
//
//    /**
//     * Displays about page.
//     *
//     * @return string
//     */
//    public function actionAbout()
//    {
//        return $this->render('about');
//    }
}
