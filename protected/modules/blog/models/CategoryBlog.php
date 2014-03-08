<?php

/**
 * This is the model class for table "category_blog".
 *
 * The followings are the available columns in table 'category_blog':
 * @property integer $id_catblog
 * @property integer $partition_catblog
 * @property string $title_catblog
 * @property string $link_catblog
 * @property integer $show_catblog
 * @property integer $sort_catblog
 *
 * The followings are the available model relations:
 * @property Blog[] $blogs
 * @property Partition $partitionCatblog
 */
class CategoryBlog extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'category_blog';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('partition_catblog, title_catblog, link_catblog, show_catblog, sort_catblog', 'required'),
			array('partition_catblog, show_catblog, sort_catblog', 'numerical', 'integerOnly'=>true),
			array('title_catblog, link_catblog', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_catblog, partition_catblog, title_catblog, link_catblog, show_catblog, sort_catblog', 'safe', 'on'=>'search'),
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
			'blogs' => array(self::HAS_MANY, 'Blog', 'cat_blog'),
			'partitionCatblog' => array(self::BELONGS_TO, 'Partition', 'partition_catblog'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_catblog' => 'Id Catblog',
			'partition_catblog' => 'Partition Catblog',
			'title_catblog' => 'Title Catblog',
			'link_catblog' => 'Link Catblog',
			'show_catblog' => 'Show Catblog',
			'sort_catblog' => 'Sort Catblog',
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

		$criteria->compare('id_catblog',$this->id_catblog);
		$criteria->compare('partition_catblog',$this->partition_catblog);
		$criteria->compare('title_catblog',$this->title_catblog,true);
		$criteria->compare('link_catblog',$this->link_catblog,true);
		$criteria->compare('show_catblog',$this->show_catblog);
		$criteria->compare('sort_catblog',$this->sort_catblog);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CategoryBlog the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getCategoryBlog($id_partition){

        $criteria = new CDbCriteria();
        $criteria->condition = 'partition_catblog=:id_partition';
        $criteria->order = 'sort_catblog';
        $criteria->params = array(':id_partition'=>$id_partition);

        $categoryObj = $this->model()->findAll($criteria);

        return $categoryObj;
    }

    public function getIdCategory($category){
        $criteria = new CDbCriteria();
        $criteria->select = 'id_catblog';
        $criteria->condition = 'link_catblog=:category';
        $criteria->params = array(':category'=>$category);

        $catblogObj = $this->model()->find($criteria);

        return $catblogObj->id_catblog;
    }
}
