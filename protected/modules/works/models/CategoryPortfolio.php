<?php

/**
 * This is the model class for table "category_portfolio".
 *
 * The followings are the available columns in table 'category_portfolio':
 * @property integer $id_catport
 * @property integer $partition_catport
 * @property string $title_catport
 * @property string $name_catport
 * @property integer $show_catport
 * @property integer $sort_catport
 *
 * The followings are the available model relations:
 * @property Partition $partitionCatport
 * @property Portfolio[] $portfolios
 */
class CategoryPortfolio extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'category_portfolio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('partition_catport, title_catport, name_catport, show_catport, sort_catport', 'required'),
			array('partition_catport, show_catport, sort_catport', 'numerical', 'integerOnly'=>true),
			array('title_catport, name_catport', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_catport, partition_catport, title_catport, name_catport, show_catport, sort_catport', 'safe', 'on'=>'search'),
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
			'partitionCatport' => array(self::BELONGS_TO, 'Partition', 'partition_catport'),
			'portfolios' => array(self::HAS_MANY, 'Portfolio', 'category_portfolio'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_catport' => 'Id Catport',
			'partition_catport' => 'Partition Catport',
			'title_catport' => 'Title Catport',
			'name_catport' => 'Name Catport',
			'show_catport' => 'Show Catport',
			'sort_catport' => 'Sort Catport',
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

		$criteria->compare('id_catport',$this->id_catport);
		$criteria->compare('partition_catport',$this->partition_catport);
		$criteria->compare('title_catport',$this->title_catport,true);
		$criteria->compare('name_catport',$this->name_catport,true);
		$criteria->compare('show_catport',$this->show_catport);
		$criteria->compare('sort_catport',$this->sort_catport);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CategoryPortfolio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getCategoryPortfolio($idPartition){

        $criteria = new CDbCriteria();
        $criteria->condition = 'partition_catport=:idPartition';
        $criteria->params = array(':idPartition'=>$idPartition);
        $criteria->order = 'sort_catport';

        $categoryObj = $this->model()->findAll($criteria);

        return $categoryObj;
    }

    public function getIdPortfolio($category){
        $criteria = new CDbCriteria();
        $criteria->select = 'id_catport';
        $criteria->condition = 'link_catport=:category';
        $criteria->params = array(':category'=>$category);

        $categoryObj = $this->model()->find($criteria);

        return $categoryObj->id_catblog;
    }
}
