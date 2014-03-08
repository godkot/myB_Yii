<?php

/**
 * This is the model class for table "clients".
 *
 * The followings are the available columns in table 'clients':
 * @property integer $id_clients
 * @property string $date_clients
 * @property string $title_clients
 * @property string $text_clients
 * @property string $name_clients
 * @property string $img_clients
 * @property string $link_clients
 * @property integer $show_clients
 * @property integer $sort_clients
 */
class Clients extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'clients';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date_clients, title_clients, text_clients, name_clients, img_clients, link_clients, show_clients, sort_clients', 'required'),
			array('show_clients, sort_clients', 'numerical', 'integerOnly'=>true),
			array('title_clients, name_clients, img_clients, link_clients', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_clients, date_clients, title_clients, text_clients, name_clients, img_clients, link_clients, show_clients, sort_clients', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_clients' => 'Id Clients',
			'date_clients' => 'Date Clients',
			'title_clients' => 'Title Clients',
			'text_clients' => 'Text Clients',
			'name_clients' => 'Name Clients',
			'img_clients' => 'Img Clients',
			'link_clients' => 'Link Clients',
			'show_clients' => 'Show Clients',
			'sort_clients' => 'Sort Clients',
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

		$criteria->compare('id_clients',$this->id_clients);
		$criteria->compare('date_clients',$this->date_clients,true);
		$criteria->compare('title_clients',$this->title_clients,true);
		$criteria->compare('text_clients',$this->text_clients,true);
		$criteria->compare('name_clients',$this->name_clients,true);
		$criteria->compare('img_clients',$this->img_clients,true);
		$criteria->compare('link_clients',$this->link_clients,true);
		$criteria->compare('show_clients',$this->show_clients);
		$criteria->compare('sort_clients',$this->sort_clients);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Clients the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
