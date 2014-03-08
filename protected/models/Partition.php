<?php

/**
 * This is the model class for table "partition".
 *
 * The followings are the available columns in table 'partition':
 * @property integer $id_partition
 * @property string $title_partition
 * @property string $name_partition
 * @property integer $type_partition
 * @property integer $show_partition
 * @property integer $countview_partition
 * @property string $date_partition
 * @property integer $author_partition
 * @property string $password_partition
 * @property string $tags_partition
 * @property string $uri_partition
 * @property string $seotitle_partition
 * @property string $seokeywords_partition
 * @property string $seodesc_partition
 *
 * The followings are the available model relations:
 * @property Blog[] $blogs
 * @property CategoryBlog[] $categoryBlogs
 * @property CategoryPortfolio[] $categoryPortfolios
 * @property Comment[] $comments
 * @property Contact[] $contacts
 * @property Faq[] $faqs
 * @property MainMenu[] $mainMenus
 * @property MainMenu[] $mainMenus1
 * @property TypePartition $typePartition
 * @property AdminUsers $authorPartition
 * @property Portfolio[] $portfolios
 * @property Testimonials[] $testimonials
 * @property Text[] $texts
 */
class Partition extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'partition';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title_partition, name_partition, type_partition, show_partition, countview_partition, date_partition, author_partition, password_partition, tags_partition, uri_partition, seotitle_partition, seokeywords_partition, seodesc_partition', 'required'),
			array('type_partition, show_partition, countview_partition, author_partition', 'numerical', 'integerOnly'=>true),
			array('title_partition, password_partition, tags_partition, uri_partition, seotitle_partition, seokeywords_partition, seodesc_partition', 'length', 'max'=>255),
			array('name_partition', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_partition, title_partition, name_partition, type_partition, show_partition, countview_partition, date_partition, author_partition, password_partition, tags_partition, uri_partition, seotitle_partition, seokeywords_partition, seodesc_partition', 'safe', 'on'=>'search'),
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
			'blogs' => array(self::HAS_MANY, 'Blog', 'partition_blog'),
			'categoryBlogs' => array(self::HAS_MANY, 'CategoryBlog', 'partition_catblog'),
			'categoryPortfolios' => array(self::HAS_MANY, 'CategoryPortfolio', 'partition_catport'),
			'comments' => array(self::HAS_MANY, 'Comment', 'partition_comment'),
			'contacts' => array(self::HAS_MANY, 'Contact', 'partition_contact'),
			'faqs' => array(self::HAS_MANY, 'Faq', 'partition_faq'),
			'mainMenus' => array(self::HAS_MANY, 'MainMenu', 'idpart_menu'),
			'mainMenus1' => array(self::HAS_MANY, 'MainMenu', 'namepart_menu'),
			'typePartition' => array(self::BELONGS_TO, 'TypePartition', 'type_partition'),
			'authorPartition' => array(self::BELONGS_TO, 'AdminUsers', 'author_partition'),
			'portfolios' => array(self::HAS_MANY, 'Portfolio', 'partition_portfolio'),
			'testimonials' => array(self::HAS_MANY, 'Testimonials', 'partition_testimonials'),
			'texts' => array(self::HAS_MANY, 'Text', 'partition_text'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_partition' => 'Id Partition',
			'title_partition' => 'Title Partition',
			'name_partition' => 'Name Partition',
			'type_partition' => 'Type Partition',
			'show_partition' => 'Show Partition',
			'countview_partition' => 'Countview Partition',
			'date_partition' => 'Date Partition',
			'author_partition' => 'Author Partition',
			'password_partition' => 'Password Partition',
			'tags_partition' => 'Tags Partition',
			'uri_partition' => 'Uri Partition',
			'seotitle_partition' => 'Seotitle Partition',
			'seokeywords_partition' => 'Seokeywords Partition',
			'seodesc_partition' => 'Seodesc Partition',
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

		$criteria->compare('id_partition',$this->id_partition);
		$criteria->compare('title_partition',$this->title_partition,true);
		$criteria->compare('name_partition',$this->name_partition,true);
		$criteria->compare('type_partition',$this->type_partition);
		$criteria->compare('show_partition',$this->show_partition);
		$criteria->compare('countview_partition',$this->countview_partition);
		$criteria->compare('date_partition',$this->date_partition,true);
		$criteria->compare('author_partition',$this->author_partition);
		$criteria->compare('password_partition',$this->password_partition,true);
		$criteria->compare('tags_partition',$this->tags_partition,true);
		$criteria->compare('uri_partition',$this->uri_partition,true);
		$criteria->compare('seotitle_partition',$this->seotitle_partition,true);
		$criteria->compare('seokeywords_partition',$this->seokeywords_partition,true);
		$criteria->compare('seodesc_partition',$this->seodesc_partition,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Partition the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    /**
     * @return Возвращает объект текущего раздела
     */
    public function getCurrentPart($namePart){
        $criteria = new CDbCriteria;
        $criteria->select = '*';
        $criteria->condition = "name_partition=:name_partition";
        $criteria->params=array(":name_partition"=>"$namePart");

        $currentPartObj=Partition::model()->with('typePartition')->find($criteria);
        return $currentPartObj;
    }

    /**
     * @return Возвращает номер текущего раздела
     */
    public function getIdPart($namePart){
        $criteria = new CDbCriteria;
        $criteria->select = 'id_partition';
        $criteria->condition = "name_partition=:name_partition";
        $criteria->params=array(":name_partition"=>"$namePart");

        $currentPartObj=Partition::model()->with('typePartition')->find($criteria);
        return $currentPartObj->id_partition;
    }

    /*
     * @return Возвращает массив сео - описания раздела (uri, title, keywords, desc)
     */
    public function getSeoPart($currentPartObj){
        $seoArr = array('uri'=>$currentPartObj->uri_partition, 'title'=>$currentPartObj->seotitle_partition, 'keywords'=>$currentPartObj->seokeywords_partition, 'desc'=>$currentPartObj->seodesc_partition);
        return $seoArr;
    }
}
