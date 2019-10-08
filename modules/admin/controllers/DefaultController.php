<?php

namespace app\modules\admin\controllers;

use app\models\LoginForm;
use app\models\Posts;
use Yii;
use yii\web\Controller;
use phpQuery\phpQuery;
use yii\web\Response;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */

    public $layout = 'mhabr';

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

    public function actionParse($id)
    {



        set_time_limit(0);
        $user = 11;

        $category = $id;

        $categoryUrl= array(
            1=>"/news/in-stary-oskol-and-region/",
            2=>'/news/incidents/',
            3=>'/news/society/',
            4=>'/news/sports/',
            5=>'/news/auto/',
            6=>'/news/medicine',
            7=>'/news/culture',
            8=>'/news/utilities/',
            9=>'/news/views/',
            10=>'/news/economy',
            11=>'/news/education',
            12=>'/news/policy',
            13=>'/news/photo-report/',
            14=>'/news/tourism/',
            15=>'/news/industry/',
            16=>'/news/religion/',
            17=>'/news/45-oemc/',
            18=>'/news/public-news/',
        );

        $baseUri = 'https://oskol.city';

        $endNumber = 61582;

        $numberNews = file_get_contents('count.txt');
        if ($numberNews == 0) {
            return;
        }


        $url = $categoryUrl[$id] . $numberNews ;



        if (Yii::$app->response->isNotFound===true){


            $fd = fopen("count.txt", 'w') or die("не удалось создать файл");
            $str = $numberNews - 1;
            fwrite($fd, $str);
            fclose($fd);
            return $this->refresh();
        }

        $hbr = file_get_contents($baseUri . $url);

        $document = phpQuery::newDocument($hbr);

        $content = $document->find('.b_news-itm__txt');


        $h1 = $document->find('.h1');

        $rewriteimg = $content->find('img');

        foreach ($rewriteimg as $key => $value) {
            $img = pq($value);
            $pq = pq($value)->attr('src');
            $img->attr('src', $baseUri . $pq);

        }

        $contentHtml = $content->html();

        $arrForPost = array(
            'h1' => $h1,
            'product_category' => $id,
            'text' => $content,
            'username' => $user,

        );

        $model = new Posts();
        if ($model->h1==$h1){
            return;
        }
        $model->createPost($arrForPost);


        $fd = fopen("count.txt", 'w') or die("не удалось создать файл");
        $str = $numberNews - 1;
        fwrite($fd, $str);
        fclose($fd);

        return $this->render('index');
    }

}
