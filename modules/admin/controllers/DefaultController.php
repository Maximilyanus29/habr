<?php

namespace app\modules\admin\controllers;

use app\models\LoginForm;
use Yii;
use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */

    public $layout='mhabr';

    public function actionIndex()
    {

        if (!Yii::$app->user->isGuest) {
            return $this->render('index');
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('/admin');
        }

        $model->password = '';
        return $this->render('auth', [
            'model' => $model,
        ]);

//        return $this->render('index');
    }
    public function parse(){
        return $this->render('auth');

        require_once('../parser/phpQuery.php');

        $baseUri='https://oskol.city';

        $numberNews = 61582;

        $url="/news/in-stary-oskol-and-region/".$numberNews."/";

        $hbr = file_get_contents($baseUri.$url);

        $document = phpQuery::newDocument($hbr);

        $content= $document->find('.b_news-itm__txt');

        $h1 = $document->find('.h1');

        $rewriteimg = $content->find('img');

        foreach ($rewriteimg as $value) {

            $rewriteimg->attr('src', $baseUri.$rewriteimg->attr('src'));

        }

        echo($h1);
        echo($content->html());

        echo('dobavleno');




    }
}
