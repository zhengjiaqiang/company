<?php 
namespace backend\controllers;
use yii\web\Controller;
use yii\data\Pagination;
use yii;
class CompanyController extends Controller
{   
	public function actionPublic_super_cg()
	{
	 return $this->renderPartial('public_super_cg');
	}
	//后台首页
	public function actionIndex()
	{
	 return $this->renderPartial('index');
	}
	
	public function actionPublic_left()
	{
		return $this->renderPartial('public_left');
	}
	public function actionPublic_header()
	{
		return $this->renderPartial('public_header');
	}
	public function actionWenzhang_xinwen()
	{    

		return $this->renderPartial('wenzhang_xinwen');
	}
	
	
}

 ?>