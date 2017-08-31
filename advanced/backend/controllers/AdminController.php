<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

class AdminController extends Controller
{ 
     public $layout=false;
    //后台首页
  public function actionIndex()
  {
    
    return $this->render('index');
  }
    //列表管理
   public function actionArticle_manage()
  {

    return $this->render('article_manage');
  }
    //添加
   public function actionArticle_add()
  {

    return $this->render('article_add');
  } 
   //分类添加
   public function actionCate_manage()
  {

    return $this->render('cate_manage');
  }
  /**
   * 旅游套餐
   */
  //信息列表
   public function actionLytc_manage()
   {
    return $this->render('lytc_manage');
   }
    //列表页轮播管理
    public function actionListbanner()
   {
    return $this->render('listbanner');
   }

}
