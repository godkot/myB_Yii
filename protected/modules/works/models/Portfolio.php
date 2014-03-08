<?php

/**
 * This is the model class for table "portfolio".
 *
 * The followings are the available columns in table 'portfolio':
 * @property integer $id_portfolio
 * @property integer $partition_portfolio
 * @property integer $category_portfolio
 * @property integer $type_portfolio
 * @property string $titletxt_portfolio
 * @property string $anons_portfolio
 * @property string $titleimg_portfolio
 * @property string $client_portfolio
 * @property string $date_portfolio
 * @property string $info_portfolio
 * @property string $link_portfolio
 * @property string $text_portfolio
 * @property string $photo_portfolio
 * @property integer $show_portfolio
 * @property integer $sort_portfolio
 * @property integer $countview_portfolio
 * @property string $tags_portfolio
 * @property string $uri_portfolio
 * @property string $seotitle_portfolio
 * @property string $seokeywords_portfolio
 * @property string $seodesc_portfolio
 *
 * The followings are the available model relations:
 * @property Partition $partitionPortfolio
 * @property CategoryPortfolio $categoryPortfolio
 * @property TypePortfolio $typePortfolio
 */
class Portfolio extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'portfolio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('partition_portfolio, category_portfolio, type_portfolio, titletxt_portfolio, anons_portfolio, titleimg_portfolio, client_portfolio, date_portfolio, info_portfolio, link_portfolio, text_portfolio, photo_portfolio, show_portfolio, sort_portfolio, countview_portfolio, tags_portfolio, uri_portfolio, seotitle_portfolio, seokeywords_portfolio, seodesc_portfolio', 'required'),
			array('partition_portfolio, category_portfolio, type_portfolio, show_portfolio, sort_portfolio, countview_portfolio', 'numerical', 'integerOnly'=>true),
			array('titletxt_portfolio, anons_portfolio, titleimg_portfolio, client_portfolio, info_portfolio, link_portfolio, photo_portfolio, tags_portfolio, uri_portfolio, seotitle_portfolio, seokeywords_portfolio, seodesc_portfolio', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_portfolio, partition_portfolio, category_portfolio, type_portfolio, titletxt_portfolio, anons_portfolio, titleimg_portfolio, client_portfolio, date_portfolio, info_portfolio, link_portfolio, text_portfolio, photo_portfolio, show_portfolio, sort_portfolio, countview_portfolio, tags_portfolio, uri_portfolio, seotitle_portfolio, seokeywords_portfolio, seodesc_portfolio', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'partitionPortfolio' => array(self::BELONGS_TO, 'Partition', 'partition_portfolio'),
			'categoryPortfolio' => array(self::BELONGS_TO, 'CategoryPortfolio', 'category_portfolio'),
			'typePortfolio' => array(self::BELONGS_TO, 'TypePortfolio', 'type_portfolio'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_portfolio' => 'Id Portfolio',
			'partition_portfolio' => 'Partition Portfolio',
			'category_portfolio' => 'Category Portfolio',
			'type_portfolio' => 'Type Portfolio',
			'titletxt_portfolio' => 'Titletxt Portfolio',
			'anons_portfolio' => 'Anons Portfolio',
			'titleimg_portfolio' => 'Titleimg Portfolio',
			'client_portfolio' => 'Client Portfolio',
			'date_portfolio' => 'Date Portfolio',
			'info_portfolio' => 'Info Portfolio',
			'link_portfolio' => 'Link Portfolio',
			'text_portfolio' => 'Text Portfolio',
			'photo_portfolio' => 'Photo Portfolio',
			'show_portfolio' => 'Show Portfolio',
			'sort_portfolio' => 'Sort Portfolio',
			'countview_portfolio' => 'Countview Portfolio',
			'tags_portfolio' => 'Tags Portfolio',
			'uri_portfolio' => 'Uri Portfolio',
			'seotitle_portfolio' => 'Seotitle Portfolio',
			'seokeywords_portfolio' => 'Seokeywords Portfolio',
			'seodesc_portfolio' => 'Seodesc Portfolio',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_portfolio',$this->id_portfolio);
		$criteria->compare('partition_portfolio',$this->partition_portfolio);
		$criteria->compare('category_portfolio',$this->category_portfolio);
		$criteria->compare('type_portfolio',$this->type_portfolio);
		$criteria->compare('titletxt_portfolio',$this->titletxt_portfolio,true);
		$criteria->compare('anons_portfolio',$this->anons_portfolio,true);
		$criteria->compare('titleimg_portfolio',$this->titleimg_portfolio,true);
		$criteria->compare('client_portfolio',$this->client_portfolio,true);
		$criteria->compare('date_portfolio',$this->date_portfolio,true);
		$criteria->compare('info_portfolio',$this->info_portfolio,true);
		$criteria->compare('link_portfolio',$this->link_portfolio,true);
		$criteria->compare('text_portfolio',$this->text_portfolio,true);
		$criteria->compare('photo_portfolio',$this->photo_portfolio,true);
		$criteria->compare('show_portfolio',$this->show_portfolio);
		$criteria->compare('sort_portfolio',$this->sort_portfolio);
		$criteria->compare('countview_portfolio',$this->countview_portfolio);
		$criteria->compare('tags_portfolio',$this->tags_portfolio,true);
		$criteria->compare('uri_portfolio',$this->uri_portfolio,true);
		$criteria->compare('seotitle_portfolio',$this->seotitle_portfolio,true);
		$criteria->compare('seokeywords_portfolio',$this->seokeywords_portfolio,true);
		$criteria->compare('seodesc_portfolio',$this->seodesc_portfolio,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Portfolio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getWorks($idPartition, $pageSize=4, $idCategory=0){
        $criteria = new CDbCriteria();
        if(!empty($idCategory)) {
            $criteria->condition = 'partition_portfolio=:idPartition and category_portfolio=:idCategory';
            $criteria->order = 'sort_portfolio DESC';
            $criteria->params = array(':idPartition'=>$idPartition, ':idCategory'=>$idCategory);
        }
        else {
            $criteria->condition = 'partition_portfolio=:idPartition';
            $criteria->order = 'sort_portfolio DESC';
            $criteria->params = array(':idPartition'=>$idPartition);
        }

        $pages = new ReverseCPagination($this->model()->count($criteria));
        // элементов на страницу
        $pages->pageSize = $pageSize;
        $pages->applyLimit($criteria);
        $postsObj = $this->model()->findAll($criteria);

        return array('postsObj'=>$postsObj,'pages'=>$pages);
    }

    public function getOneWork($idPartition, $workName){
        $criteria = new CDbCriteria();
        $criteria->condition = 'partition_portfolio=:idPartition and uri_portfolio=:workName';
        $criteria->params = array(':idPartition'=>$idPartition,':workName'=>$workName);
        $workObj = $this->model()->find($criteria);

        return $workObj;
    }
}
