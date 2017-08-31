<?php 
namespace frontend\models;
use yii\base\Model;
class Upload extends Model
{
	//public $imageFile;
	//多文件属性
	public $imageFiles;
    public $file;


	public function attributeLabels()
	{
		return ['imageFile'=>'文件上传'];
	}
	//验证规则
	public function rules()
    {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => false,'extensions' => 'txt','maxFiles' => 4],
        ];
    }
      //单文件上传方法
	// public function upload()
 //    {
 //        if ($this->validate()) {
 //            $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
 //            return true;
 //        } else {
 //            return false;
 //        }
 //    }
 //    多文件上传方法
     public function upload()
    { 
        if ($this->validate()) 
            { 
            foreach ($this->imageFiles as $file)
             {
             $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension); 
             } 
             return  $file; 
            } 
            else 
            {
                return false; 
            } 
    }


}

 
 ?>