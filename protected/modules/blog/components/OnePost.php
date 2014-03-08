<?php
/**
 * @param Blog $postObj
 * */
class OnePost extends CWidget
{
    public $postObj;

    public function run()
    {
        if(count($this->postObj)>0){
                $countComment = Comment::model()->getCountComment($this->postObj->partition_blog, $this->postObj->id_blog);
                if($this->postObj->type_blog==1){
                    $template = 'one/post_txt';
                }
                else if($this->postObj->type_blog==2){
                    $template = 'one/post_img';
                }

                echo(Yii::app()->controller->renderPartial($template, array('postObj'=>$this->postObj,'countComment'=>$countComment), true));
        }
    }
}