<?php
/**
 * @param integer $_pageSize Колличество записей на странице.
 * @param integer $_cols Колличество столбцов записей на странице.
 * */
class DefaultController extends Controller
{
    private $_pageSize = 4;
    private $_cols = 2;

    protected function beforeAction($action){
        $this->typePage = 'works';
        $this->_namePartition = 'works';
        $this->menu = MainMenu::model()->getMenuItems($this->_namePartition);
        $currentPartObj = Partition::model()->getCurrentPart($this->_namePartition);
        $this->_idPartition = $currentPartObj->id_partition;
        $this->seoPartArr = Partition::model()->getSeoPart($currentPartObj);
        return parent::beforeAction($action);
    }

    public function actionIndex($job="",$cols=2)
	{
        if(is_numeric($cols) and $cols<5) $this->_cols = (int)$cols;

        $this->layout = '//layouts/page';

        if(!empty($job)){
            $job = parent::getSaveVar($job);
            $this->breadcrumbs=array('Работы'=>array('/works'),$job);
            $workObj = Portfolio::model()->getOneWork($this->_idPartition, $job);
            $this->render('work', array('workObj'=>$workObj));
        }
        else{
            $categoryObj = CategoryPortfolio::model()->getCategoryPortfolio($this->_idPartition);
            $this->breadcrumbs=array('Работы',);
            $worksArr = Portfolio::model()->getWorks($this->_idPartition, $this->_pageSize);
            $this->render('index', array('worksObj'=>$worksArr['postsObj'], 'pages'=>$worksArr['pages'], 'categoryObj'=>$categoryObj, 'cols'=>$this->_cols));
        }
	}
}