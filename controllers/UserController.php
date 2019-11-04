<?php


namespace app\controllers;


use app\models\Findincollection;
use app\models\Comments;
use app\models\Users;
use Yii;
use yii\web\Controller;
use app\models\Posts;

class UserController extends Controller
{
    public $layout='mhabr';


    public function actionIndex()
    {
        $model=Users::find()->limit(10)->all();
        return $this->render('userslist',['model'=>$model]);
    }

    public function actionUser($id)
    {
        $model=Users::find()->where(['id'=>$id])->one();
        return $this->render('profile',['model'=>$model]);
    }

    public function actionProfile($id)
    {
        $model=Users::find()->where(['id'=>$id])->one();
        if ($model==null){
            return $this->renderAjax('empty');
        }



        return $this->renderAjax('profileAjax',['model'=>$model]);
    }

    public function actionComments($id)
    {
        $model=Comments::find()->where(['user_id'=>$id])->all();
        if ($model==null){
            return $this->renderAjax('empty');
        }
        return $this->renderAjax('comments',['model'=>$model]);
    }

    public function actionPosts($id)
    {
        $model=Posts::find()->where(['owned_by_user'=>$id])->all();
        if ($model==null){
            return $this->renderAjax('empty');
        }
        return $this->renderAjax('postlist',['model'=>$model]);
    }

    public function actionPashal($id)
    {
        $model=Users::find()->where(['id'=>$id])->one();
        return $this->renderAjax('pashal',['model'=>$model]);
    }

//    public function actionMypost()
//    {
//        $user = Yii::$app->user->identity->getId();
//        $model=Posts::find()->where(['owned_by_user'=>$user])->all();
//        return $this->renderAjax('postlist',['model'=>$model]);
//    }

    public function actionBookmarks($id)
    {
//        if (Yii::$app->user->isGuest){
//            return $this->redirect('/post/'.$id);
//        }
//
        $query=Users::find()->where(['id'=>$id])->one();
        $book=$query->bookmarks;

        $collection = Findincollection::parse($book);

        $model=Posts::find()->where(['id' => $collection])->all();

//        $model=Posts::find()->where(['user_id'=>$id])->all();
        if ($model==null){
            return $this->renderAjax('empty');
        }
        return $this->renderAjax('bookmarks',['model'=>$model]);
    }

}