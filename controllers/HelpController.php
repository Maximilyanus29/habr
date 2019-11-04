<?php

namespace app\controllers;

class HelpController extends \yii\web\Controller
{

    public $layout='mhabr';

//    public function actionIndex()
//    {
//        return $this->render('index');
//    }

    public function actionRegistration()
    {
        return $this->renderAjax('registration');
    }

    public function actionRules()
    {
        return $this->renderAjax('rulesAjax');
    }

    public function actionSandbox()
    {
        return $this->renderAjax('sandbox');
    }

    public function actionHabracentre()
    {
        return $this->renderAjax('habracentre');
    }

    public function actionKarma()
    {
        return $this->renderAjax('karma');
    }

    public function actionSettings()
    {
        return $this->renderAjax('settings');
    }

    public function actionHubs()
    {
        return $this->renderAjax('hubs');
    }

    public function actionLenta()
    {
        return $this->renderAjax('lenta');
    }

    public function actionPosts()
    {
        return $this->renderAjax('posts');
    }

    public function actionTracker()
    {
        return $this->renderAjax('tracker');
    }

    public function actionHabramail()
    {
        return $this->renderAjax('habramail');
    }

    public function actionCompanies()
    {
        return $this->renderAjax('companies');
    }

    public function actionProblems()
    {
        return $this->renderAjax('problems');
    }

    public function actionSponsorshipinfo()
    {
        return $this->renderAjax('sponsorship-info');
    }

    public function actionOther()
    {
        return $this->renderAjax('other');
    }


}
