<?php
/**
 * Виджет отображает конкретную работу из модели Portfolio.
 * @param Portfolio $workObj Объект (ActiveRecord) из модели Portfolio.
 * @var integer $countComment Колличество комментариев к работе.
 * */
class OneWork extends CWidget
{
    public $workObj;

    public function run()
    {
        if(!empty($this->workObj)){
            $countComment = Comment::model()->getCountComment($this->workObj->partition_portfolio, $this->workObj->id_portfolio);
            if($this->workObj->type_portfolio==1){
                $template = 'one/work_image';
            }
            else if($this->workObj->type_portfolio==2){
                $template = 'one/work_slideshow';
            }
            else if($this->workObj->type_portfolio==3){
                $template = 'one/work_gallery';
            }
            else if($this->workObj->type_portfolio==4){
                $template = 'one/work_video';
            }
            else if($this->workObj->type_portfolio==5){
                $template = 'one/work_audio';
            }
            else throw new CHttpException(500,"Нет представления для 'type_portfolio=".$this->workObj->type_portfolio."'");

            echo(Yii::app()->controller->renderPartial($template, array('workObj'=>$this->workObj,'countComment'=>$countComment), true));
        }
    }
}