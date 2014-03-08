<?php

/**
 * This is the model class for table "contact".
 *
 * The followings are the available columns in table 'contact':
 * @property integer $id_contact
 * @property integer $partition_contact
 * @property string $title_contact
 * @property string $titletxt_contact
 * @property string $text_contact
 * @property string $img_contact
 * @property string $map_contact
 * @property string $company_contact
 * @property string $fio_contact
 * @property string $adres_contact
 * @property string $telephone_contact
 * @property string $email_contact
 * @property integer $countview_contact
 * @property string $tags_contact
 * @property string $uri_contact
 * @property string $seotitle_contact
 * @property string $seokeywords_contact
 * @property string $seodesc_contact
 *
 * The followings are the available model relations:
 * @property Partition $partitionContact
 */
class Contact extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'contact';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('partition_contact, title_contact, titletxt_contact, text_contact, img_contact, map_contact, company_contact, fio_contact, adres_contact, telephone_contact, email_contact, countview_contact, tags_contact, uri_contact, seotitle_contact, seokeywords_contact, seodesc_contact', 'required'),
			array('partition_contact, countview_contact', 'numerical', 'integerOnly'=>true),
			array('title_contact, titletxt_contact, img_contact, company_contact, fio_contact, adres_contact, telephone_contact, email_contact, tags_contact, uri_contact, seotitle_contact, seokeywords_contact, seodesc_contact', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_contact, partition_contact, title_contact, titletxt_contact, text_contact, img_contact, map_contact, company_contact, fio_contact, adres_contact, telephone_contact, email_contact, countview_contact, tags_contact, uri_contact, seotitle_contact, seokeywords_contact, seodesc_contact', 'safe', 'on'=>'search'),
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
			'partitionContact' => array(self::BELONGS_TO, 'Partition', 'partition_contact'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_contact' => 'Id Contact',
			'partition_contact' => 'Partition Contact',
			'title_contact' => 'Title Contact',
			'titletxt_contact' => 'Titletxt Contact',
			'text_contact' => 'Text Contact',
			'img_contact' => 'Img Contact',
			'map_contact' => 'Map Contact',
			'company_contact' => 'Company Contact',
			'fio_contact' => 'Fio Contact',
			'adres_contact' => 'Adres Contact',
			'telephone_contact' => 'Telephone Contact',
			'email_contact' => 'Email Contact',
			'countview_contact' => 'Countview Contact',
			'tags_contact' => 'Tags Contact',
			'uri_contact' => 'Uri Contact',
			'seotitle_contact' => 'Seotitle Contact',
			'seokeywords_contact' => 'Seokeywords Contact',
			'seodesc_contact' => 'Seodesc Contact',
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

		$criteria->compare('id_contact',$this->id_contact);
		$criteria->compare('partition_contact',$this->partition_contact);
		$criteria->compare('title_contact',$this->title_contact,true);
		$criteria->compare('titletxt_contact',$this->titletxt_contact,true);
		$criteria->compare('text_contact',$this->text_contact,true);
		$criteria->compare('img_contact',$this->img_contact,true);
		$criteria->compare('map_contact',$this->map_contact,true);
		$criteria->compare('company_contact',$this->company_contact,true);
		$criteria->compare('fio_contact',$this->fio_contact,true);
		$criteria->compare('adres_contact',$this->adres_contact,true);
		$criteria->compare('telephone_contact',$this->telephone_contact,true);
		$criteria->compare('email_contact',$this->email_contact,true);
		$criteria->compare('countview_contact',$this->countview_contact);
		$criteria->compare('tags_contact',$this->tags_contact,true);
		$criteria->compare('uri_contact',$this->uri_contact,true);
		$criteria->compare('seotitle_contact',$this->seotitle_contact,true);
		$criteria->compare('seokeywords_contact',$this->seokeywords_contact,true);
		$criteria->compare('seodesc_contact',$this->seodesc_contact,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Contact the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getContact($id_partition){
        if(!empty($id_partition)){
            $criteria=new CDbCriteria;
            $criteria->select='*';
            $criteria->condition='partition_contact=:id_partition';
            $criteria->params=array(':id_partition'=>$id_partition);

            $mainContactObj = $this->model()->findAll($criteria); //Если используете ActiveRecord
            return $mainContactObj;
        }
        else return false;
    }

    public function getSeo($contactObj){
        $seoArr = array('uri'=>$contactObj[0]->uri_contact, 'title'=>$contactObj[0]->seotitle_contact, 'keywords'=>$contactObj[0]->seokeywords_contact, 'desc'=>$contactObj[0]->seodesc_contact);
        return $seoArr;
    }
}
