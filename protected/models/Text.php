<?php

/**
 * This is the model class for table "text".
 *
 * The followings are the available columns in table 'text':
 * @property integer $id_text
 * @property integer $partition_text
 * @property string $title_text
 * @property string $anons_text
 * @property string $body_text
 * @property string $img_text
 * @property integer $show_text
 * @property integer $countview_text
 * @property string $tags_text
 * @property string $uri_text
 * @property string $seotitle_text
 * @property string $seokeywords_text
 * @property string $seodesc_text
 *
 * The followings are the available model relations:
 * @property Partition $partitionText
 */
class Text extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'text';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('partition_text, title_text, anons_text, body_text, img_text, show_text, countview_text, tags_text, uri_text, seotitle_text, seokeywords_text, seodesc_text', 'required'),
			array('partition_text, show_text, countview_text', 'numerical', 'integerOnly'=>true),
			array('title_text, img_text, tags_text, uri_text, seotitle_text, seokeywords_text, seodesc_text', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_text, partition_text, title_text, anons_text, body_text, img_text, show_text, countview_text, tags_text, uri_text, seotitle_text, seokeywords_text, seodesc_text', 'safe', 'on'=>'search'),
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
			'partitionText' => array(self::BELONGS_TO, 'Partition', 'partition_text'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_text' => 'Id Text',
			'partition_text' => 'Partition Text',
			'title_text' => 'Title Text',
			'anons_text' => 'Anons Text',
			'body_text' => 'Body Text',
			'img_text' => 'Img Text',
			'show_text' => 'Show Text',
			'countview_text' => 'Countview Text',
			'tags_text' => 'Tags Text',
			'uri_text' => 'Uri Text',
			'seotitle_text' => 'Seotitle Text',
			'seokeywords_text' => 'Seokeywords Text',
			'seodesc_text' => 'Seodesc Text',
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

		$criteria->compare('id_text',$this->id_text);
		$criteria->compare('partition_text',$this->partition_text);
		$criteria->compare('title_text',$this->title_text,true);
		$criteria->compare('anons_text',$this->anons_text,true);
		$criteria->compare('body_text',$this->body_text,true);
		$criteria->compare('img_text',$this->img_text,true);
		$criteria->compare('show_text',$this->show_text);
		$criteria->compare('countview_text',$this->countview_text);
		$criteria->compare('tags_text',$this->tags_text,true);
		$criteria->compare('uri_text',$this->uri_text,true);
		$criteria->compare('seotitle_text',$this->seotitle_text,true);
		$criteria->compare('seokeywords_text',$this->seokeywords_text,true);
		$criteria->compare('seodesc_text',$this->seodesc_text,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Text the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getTextPart($id_partition){
        if(!empty($id_partition)){
            $criteria=new CDbCriteria;
            $criteria->select='*';
            $criteria->condition='partition_text=:id_partition';
            $criteria->params=array(':id_partition'=>$id_partition);

            $mainTextObj = $this->model()->findAll($criteria); //Если используете ActiveRecord
            return $mainTextObj;
        }
        else return false;
    }
}
