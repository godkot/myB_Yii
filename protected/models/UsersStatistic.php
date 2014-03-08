<?php

/**
 * This is the model class for table "users_statistic".
 *
 * The followings are the available columns in table 'users_statistic':
 * @property integer $id_userstat
 * @property string $ip_userstat
 * @property string $name_userstat
 * @property string $email_userstat
 * @property string $web_userstat
 * @property string $photo_userstat
 * @property string $fierstdate_userstat
 * @property string $lastdate_userstat
 * @property string $view_userstat
 * @property integer $countview_userstat
 * @property integer $new_userstat
 * @property string $cookie_userstat
 *
 * The followings are the available model relations:
 * @property Comment[] $comments
 */
class UsersStatistic extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users_statistic';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name_userstat, email_userstat', 'required'),
			array('countview_userstat, new_userstat', 'numerical', 'integerOnly'=>true),
			array('ip_userstat, name_userstat, email_userstat, web_userstat, photo_userstat, view_userstat, cookie_userstat', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_userstat, ip_userstat, name_userstat, email_userstat, web_userstat, photo_userstat, fierstdate_userstat, lastdate_userstat, view_userstat, countview_userstat, new_userstat, cookie_userstat', 'safe', 'on'=>'search'),
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
			'comments' => array(self::HAS_MANY, 'Comment', 'iduser_comment'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_userstat' => 'Id Userstat',
			'ip_userstat' => 'Ip Userstat',
			'name_userstat' => 'Name Userstat',
			'email_userstat' => 'Email Userstat',
			'web_userstat' => 'Web Userstat',
			'photo_userstat' => 'Photo Userstat',
			'fierstdate_userstat' => 'Fierstdate Userstat',
			'lastdate_userstat' => 'Lastdate Userstat',
			'view_userstat' => '(№ раздела - кол. просмотров;)',
			'countview_userstat' => 'Countview Userstat',
			'new_userstat' => 'New Userstat',
			'cookie_userstat' => 'Cookie Userstat',
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

		$criteria->compare('id_userstat',$this->id_userstat);
		$criteria->compare('ip_userstat',$this->ip_userstat,true);
		$criteria->compare('name_userstat',$this->name_userstat,true);
		$criteria->compare('email_userstat',$this->email_userstat,true);
		$criteria->compare('web_userstat',$this->web_userstat,true);
		$criteria->compare('photo_userstat',$this->photo_userstat,true);
		$criteria->compare('fierstdate_userstat',$this->fierstdate_userstat,true);
		$criteria->compare('lastdate_userstat',$this->lastdate_userstat,true);
		$criteria->compare('view_userstat',$this->view_userstat,true);
		$criteria->compare('countview_userstat',$this->countview_userstat);
		$criteria->compare('new_userstat',$this->new_userstat);
		$criteria->compare('cookie_userstat',$this->cookie_userstat,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UsersStatistic the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
