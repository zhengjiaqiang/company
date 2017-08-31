<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;
?>
<?php $form = ActiveForm::begin
(
    [
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
    ]
); ?>
    
    <?= $form->field($model, 'file')->checkboxList($arr)  ?>
<?php ActiveForm::end(); ?>
 <button class="bing">合并</button>
<script>
$(function(){
    $('.bing').click(function(){
          var ids=$('input[name="Upload[file][]"]');
          var id='';
        for (var i = 0; i < ids.length; i++) 
        {
           if(ids[i].checked)
         {
         id=id+","+ids[i].value; 
         }
          new_id=id.substr(1);
         
        }
       $.ajax({
  type:"get",
  url:"?r=upload/test",
  data:"id="+new_id,
  success:function(data){
   alert(data);
  }
 })


    });
})

</script>
