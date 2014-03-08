<?php
/**
 * Виджет Список работ Works.
 * Выводит список работ из модели Portfolio.
 * @param array $worksObj Массив объектов (ActiveRecord) из модели Portfolio.
 * @var Portfolio $work Объект (ActiveRecord) из модели Portfolio.
 * @var integer $cols Колличество столбцов для вывода списка работ (2,3,4).
 * */
class ListWorks extends CWidget
{
    public $worksObj;
    public $cols;

    private $jsFile = '/vendor/js/Portfolio.js';

    public function init() {
        // Подключаем стиль, если выводится HTML и если этот ваш стиль вообще задан.
        if (!is_null($this->jsFile)) {
            Yii::app()->getClientScript()->registerScriptFile(Yii::app()->theme->baseUrl.$this->jsFile, CClientScript::POS_END);
        }
        parent::init();
    }

    public function run()
    {
        if(count($this->worksObj)>0){
            ?><ul id="portfolio-grid" class="filterable-portfolio thumbnails portfolio-<?php echo $this->cols;?>cols" data-cols="<?php echo $this->cols;?>cols"><?php
            foreach($this->worksObj as $work){
                if($work->type_portfolio==1){
                    $template = 'list/works_image';
                }
                else if($work->type_portfolio==2){
                    $template = 'list/works_slideshow';
                }
                else if($work->type_portfolio==3){
                    $template = 'list/works_gallery';
                }
                else if($work->type_portfolio==4){
                    $template = 'list/works_video';
                }
                else if($work->type_portfolio==5){
                    $template = 'list/works_audio';
                }
                else throw new CHttpException(500,"Нет представления для 'type_portfolio=".$this->workObj->type_portfolio."'");

                echo Yii::app()->controller->renderPartial($template, array('work'=>$work, 'cols'=>$this->cols), true);
            }
            ?></ul><?php
        }
    }
}