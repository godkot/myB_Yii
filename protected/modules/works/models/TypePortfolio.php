<?php

/**
 * This is the model class for table "type_portfolio".
 *
 * The followings are the available columns in table 'type_portfolio':
 * @property integer $id_typeport
 * @property string $title_typeport
 * @property string $name_typeport
 * @property integer $show_typeport
 * @property integer $sort_typeport
 *
 * The followings are the available model relations:
 * @property Portfolio[] $portfolios
 */
class TypePortfolio extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'type_portfolio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title_typeport, name_typeport, show_typeport, sort_typeport', 'required'),
			array('show_typeport, sort_typeport', 'numerical', 'integerOnly'=>true),
			array('title_typeport, name_typeport', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_typeport, title_typeport, name_typeport, show_typeport, sort_typeport', 'safe', 'on'=>'search'),
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
			'portfolios' => array(self::HAS_MANY, 'Portfolio', 'type_portfolio'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_typeport' => 'Id Typeport',
			'title_typeport' => 'Title Typeport',
			'name_typeport' => 'Name Typeport',
			'show_typeport' => 'Show Typeport',
			'sort_typeport' => 'Sort Typeport',
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

		$criteria->compare('id_typeport',$this->id_typeport);
		$criteria->compare('title_typeport',$this->title_typeport,true);
		$criteria->compare('name_typeport',$this->name_typeport,true);
		$criteria->compare('show_typeport',$this->show_typeport);
		$criteria->compare('sort_typeport',$this->sort_typeport);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TypePortfolio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
