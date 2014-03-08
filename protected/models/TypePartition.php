<?php

/**
 * This is the model class for table "type_partition".
 *
 * The followings are the available columns in table 'type_partition':
 * @property integer $id_typepart
 * @property string $title_typepart
 * @property string $name_typepart
 * @property integer $show_typepart
 * @property integer $sort_typepart
 *
 * The followings are the available model relations:
 * @property Partition[] $partitions
 */
class TypePartition extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'type_partition';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title_typepart, name_typepart, show_typepart, sort_typepart', 'required'),
			array('show_typepart, sort_typepart', 'numerical', 'integerOnly'=>true),
			array('title_typepart, name_typepart', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_typepart, title_typepart, name_typepart, show_typepart, sort_typepart', 'safe', 'on'=>'search'),
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
			'partitions' => array(self::HAS_MANY, 'Partition', 'type_partition'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_typepart' => 'Id Typepart',
			'title_typepart' => 'Title Typepart',
			'name_typepart' => 'Name Typepart',
			'show_typepart' => 'Show Typepart',
			'sort_typepart' => 'Sort Typepart',
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

		$criteria->compare('id_typepart',$this->id_typepart);
		$criteria->compare('title_typepart',$this->title_typepart,true);
		$criteria->compare('name_typepart',$this->name_typepart,true);
		$criteria->compare('show_typepart',$this->show_typepart);
		$criteria->compare('sort_typepart',$this->sort_typepart);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TypePartition the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
