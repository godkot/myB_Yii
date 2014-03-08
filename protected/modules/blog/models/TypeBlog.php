<?php

/**
 * This is the model class for table "type_blog".
 *
 * The followings are the available columns in table 'type_blog':
 * @property integer $id_typeblog
 * @property string $title_typeblog
 * @property string $name_typeblog
 * @property integer $show_typeblog
 * @property integer $sort_typeblog
 *
 * The followings are the available model relations:
 * @property Blog[] $blogs
 */
class TypeBlog extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'type_blog';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title_typeblog, name_typeblog, show_typeblog, sort_typeblog', 'required'),
			array('show_typeblog, sort_typeblog', 'numerical', 'integerOnly'=>true),
			array('title_typeblog, name_typeblog', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_typeblog, title_typeblog, name_typeblog, show_typeblog, sort_typeblog', 'safe', 'on'=>'search'),
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
			'blogs' => array(self::HAS_MANY, 'Blog', 'type_blog'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_typeblog' => 'Id Typeblog',
			'title_typeblog' => 'Title Typeblog',
			'name_typeblog' => 'Name Typeblog',
			'show_typeblog' => 'Show Typeblog',
			'sort_typeblog' => 'Sort Typeblog',
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

		$criteria->compare('id_typeblog',$this->id_typeblog);
		$criteria->compare('title_typeblog',$this->title_typeblog,true);
		$criteria->compare('name_typeblog',$this->name_typeblog,true);
		$criteria->compare('show_typeblog',$this->show_typeblog);
		$criteria->compare('sort_typeblog',$this->sort_typeblog);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TypeBlog the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
