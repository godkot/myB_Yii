<?php
/**
 * @var $post Blog
 * */
class MainPosts extends CWidget
{
    public $params; //полученные параметры

    public function run()
    {
        if(count($this->params)>0){
            foreach($this->params as $post){
                $countComment = Comment::model()->getCountComment($post->partition_blog, $post->id_blog);
                if($post->type_blog==1){
                    $template = 'list/post_txt';
                }
                else if($post->type_blog==2){
                    $template = 'list/post_img';
                }
                echo Yii::app()->controller->renderPartial($template, array('post'=>$post,'countComment'=>$countComment), true);
            }
        }
    }
}