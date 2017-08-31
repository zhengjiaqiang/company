<?php 
namespace common\components;
use yii;
/**
* 
*/
class CommonFunc
{
 /**
  * excel 导出
  * @param  [type] $data     [数据库中查询出来的数组]
  * @param  [type] $header   [Excel的表头信息] 比如这次的["sid", "学号", "姓名","年龄","性别","所属课程"]；
  * @param  string $title    [表头]
  * @param  string $filename [Excel文件名称]
  * @return [type]           [下载框]
  */
 public static function exportData ($data, $header, $title = "simple", $filename = "data")
 {
     //require relation class files
     require(Yii::getAlias("@common")."/components/phpexcel/PHPExcel.php");
     require(Yii::getAlias("@common")."/components/phpexcel/PHPExcel/Writer/Excel2007.php");
     if (!is_array ($data) || !is_array ($header)) return false;
     $objPHPExcel = new \PHPExcel();
     // Set properties
     $objPHPExcel->getProperties()->setCreator("Maarten Balliauw");
     $objPHPExcel->getProperties()->setLastModifiedBy("Maarten Balliauw");
     $objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
     $objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
     $objPHPExcel->getProperties()->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.");
     // Add some data
     $objPHPExcel->setActiveSheetIndex(0);
     //添加头部
     $hk = 0;
     foreach ($header as $k => $v)
     {
         $colum = \PHPExcel_Cell::stringFromColumnIndex($hk);
         $objPHPExcel->setActiveSheetIndex(0) ->setCellValue($colum."1", $v);
         $hk += 1;
     }
     $column = 2;
     $objActSheet = $objPHPExcel->getActiveSheet();
     foreach($data as $key => $rows)  //行写入
     {
         $span = 0;
         foreach($rows as $keyName => $value) // 列写入
         {
             $j = \PHPExcel_Cell::stringFromColumnIndex($span);
             $objActSheet->setCellValue($j.$column, $value);
             $span++;
         }
         $column++;
     }
     // Rename sheet
     $objPHPExcel->getActiveSheet()->setTitle($title);
     // Save Excel 2007 file
     $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
     header("Pragma:public");
     header("Content-Type:application/x-msexecl;name=\"{$filename}.xls\"");
     header("Content-Disposition:inline;filename=\"{$filename}.xls\"");
     $objWriter->save("php://output");
 }
 /**
  * excel   导入
  * @param  [type] $filename [文件的路径加上文件名]
  * @param  string $encode   [文字编码 默认utf-8]
  * @return [type]           [由excel转化出来的数组]
  */
 public static function read($filename,$encode='utf-8'){
  require(Yii::getAlias("@common")."/components/phpexcel/PHPExcel.php");
  $objReader = \PHPExcel_IOFactory::createReader('Excel2007');
  $objReader->setReadDataOnly(true);
  $objPHPExcel = $objReader->load($filename);
  $objWorksheet = $objPHPExcel->getActiveSheet();
  $highestRow = $objWorksheet->getHighestRow();
  $highestColumn = $objWorksheet->getHighestColumn();
  
  $highestColumnIndex = \PHPExcel_Cell::columnIndexFromString($highestColumn);
  $excelData = array();
  for ($row = 1; $row <= $highestRow; $row++) {
   for ($col = 0; $col < $highestColumnIndex; $col++) {
    $excelData[$row][] =(string)$objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
   }
  }
  return $excelData;
 }
}



 ?>