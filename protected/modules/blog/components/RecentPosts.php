<?php
/**
 * Виджет Последние посты
 * Выбирает нужное колличество записей из модели Blog и передает массив записей $postsObjArr в представление
 * в зависимости от $type. Если $type=2, то вибираются сначала записи у которых footer_blog=1.
 * @param integer $col Колличество постов для вывода.
 * @param integer $type Параметр для определения типа отображения. Может принимать два значения (1 или 2).
 * @var array $postsObjArr Массив записей (ActiveRecord) постов.
 * */
class RecentPosts extends CWidget
{
    public $col=3;
    public $type=1;

    public function run()
    {
        if(is_int($this->col) and $this->col>0){
            if($this->type==1){
                $criteria=new CDbCriteria;
                $criteria->order = 'sort_blog desc';
                $criteria->limit = $this->col;
                $postsObjArr = Blog::model()->findAll($criteria);
                if(count($postsObjArr)>0)
                    echo Yii::app()->controller->renderPartial('recent_sidebar', array('postsObjArr'=>$postsObjArr), true);
            }
            else if($this->type==2){
                $criteria=new CDbCriteria;
                $criteria->condition = 'footer_blog=1';
                $criteria->order = 'sort_blog desc';
                $criteria->limit = $this->col;
                $postsObjArr = Blog::model()->findAll($criteria);
                if(count($postsObjArr)<$this->col){
                    $criteria=new CDbCriteria;
                    $criteria->order = 'sort_blog desc';
                    $criteria->limit = $this->col-count($postsObjArr);
                    $postsObjArr2 = Blog::model()->findAll($criteria);
                    $postsObjArr=array_merge($postsObjArr,$postsObjArr2);
                }
                if(count($postsObjArr)>0)
                    echo Yii::app()->controller->renderPartial('blog.views.posts.recent_footer', array('postsObjArr'=>$postsObjArr), true);
            }
            else
                throw new CHttpException(404,'Неверный параметр type для RecentPosts');
        }
    }
}