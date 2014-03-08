<?php

/**
 * This is the model class for table "admin_users".
 *
 * The followings are the available columns in table 'admin_users':
 * @property integer $id_admuser
 * @property string $nikname_admuser
 * @property string $date_admuser
 * @property string $photo_admuser
 * @property string $fio_admuser
 * @property string $text_admuser
 * @property string $email_admuser
 * @property string $password_admuser
 * @property string $rights_admuser
 * @property string $type_admuser
 * @property string $lastdate_admuser
 *
 * The followings are the available model relations:
 * @property Blog[] $blogs
 * @property Partition[] $partitions
 */
class AdminUsers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'admin_users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nikname_admuser, date_admuser, photo_admuser, fio_admuser, text_admuser, email_admuser, password_admuser, rights_admuser, type_admuser, lastdate_admuser', 'required'),
			array('nikname_admuser', 'length', 'max'=>50),
			array('photo_admuser, fio_admuser, email_admuser, password_admuser, rights_admuser, type_admuser', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_admuser, nikname_admuser, date_admuser, photo_admuser, fio_admuser, text_admuser, email_admuser, password_admuser, rights_admuser, type_admuser, lastdate_admuser', 'safe', 'on'=>'search'),
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
			'blogs' => array(self::HAS_MANY, 'Blog', 'author_blog'),
			'partitions' => array(self::HAS_MANY, 'Partition', 'author_partition'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_admuser' => 'Id Admuser',
			'nikname_admuser' => 'Nikname Admuser',
			'date_admuser' => 'Date Admuser',
			'photo_admuser' => 'Photo Admuser',
			'fio_admuser' => 'Fio Admuser',
			'text_admuser' => 'Text Admuser',
			'email_admuser' => 'Email Admuser',
			'password_admuser' => 'Password Admuser',
			'rights_admuser' => 'Просмотр, Редактирование, Добавление, Удаление (№ раздела - V,E,A,D;)',
			'type_admuser' => 'Type Admuser',
			'lastdate_admuser' => 'Lastdate Admuser',
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

		$criteria->compare('id_admuser',$this->id_admuser);
		$criteria->compare('nikname_admuser',$this->nikname_admuser,true);
		$criteria->compare('date_admuser',$this->date_admuser,true);
		$criteria->compare('photo_admuser',$this->photo_admuser,true);
		$criteria->compare('fio_admuser',$this->fio_admuser,true);
		$criteria->compare('text_admuser',$this->text_admuser,true);
		$criteria->compare('email_admuser',$this->email_admuser,true);
		$criteria->compare('password_admuser',$this->password_admuser,true);
		$criteria->compare('rights_admuser',$this->rights_admuser,true);
		$criteria->compare('type_admuser',$this->type_admuser,true);
		$criteria->compare('lastdate_admuser',$this->lastdate_admuser,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AdminUsers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getIdUser($nikname){
        $criteria = new CDbCriteria();
        $criteria->select = 'id_admuser';
        $criteria->condition = 'nikname_admuser=:nikname';
        $criteria->params = array(':nikname'=>$nikname);

        $userObj = $this->model()->find($criteria);

        return $userObj->id_admuser;
    }
}
