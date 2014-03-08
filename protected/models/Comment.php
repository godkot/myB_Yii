<?php

/**
 * This is the model class for table "comment".
 *
 * The followings are the available columns in table 'comment':
 * @property integer $id_comment
 * @property integer $partition_comment
 * @property integer $idblog_comment
 * @property integer $sub_comment
 * @property integer $iduser_comment
 * @property string $date_comment
 * @property string $text_comment
 * @property integer $enable_comment
 * @property integer $show_comment
 *
 * The followings are the available model relations:
 * @property Partition $partitionComment
 * @property UsersStatistic $iduserComment
 */
class Comment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'comment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('partition_comment, idblog_comment, sub_comment, iduser_comment, date_comment, text_comment, enable_comment, show_comment', 'required'),
			array('partition_comment, idblog_comment, sub_comment, iduser_comment, enable_comment, show_comment', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_comment, partition_comment, idblog_comment, sub_comment, iduser_comment, date_comment, text_comment, enable_comment, show_comment', 'safe', 'on'=>'search'),
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
			'partitionComment' => array(self::BELONGS_TO, 'Partition', 'partition_comment'),
			'iduserComment' => array(self::BELONGS_TO, 'UsersStatistic', 'iduser_comment'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_comment' => 'Id Comment',
			'partition_comment' => 'Partition Comment',
			'idblog_comment' => 'Idfor Comment',
			'sub_comment' => 'Sub Comment',
			'iduser_comment' => 'Iduser Comment',
			'date_comment' => 'Date Comment',
			'text_comment' => 'Text Comment',
			'enable_comment' => 'Enable Comment',
			'show_comment' => 'Show Comment',
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

		$criteria->compare('id_comment',$this->id_comment);
		$criteria->compare('partition_comment',$this->partition_comment);
		$criteria->compare('idblog_comment',$this->idblog_comment);
		$criteria->compare('sub_comment',$this->sub_comment);
		$criteria->compare('iduser_comment',$this->iduser_comment);
		$criteria->compare('date_comment',$this->date_comment,true);
		$criteria->compare('text_comment',$this->text_comment,true);
		$criteria->compare('enable_comment',$this->enable_comment);
		$criteria->compare('show_comment',$this->show_comment);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Comment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getCountComment($idPartition,$idBlog){
        $criteria = new CDbCriteria();
        $criteria->condition = 'partition_comment=:idPartition and idblog_comment=:idBlog';
        $criteria->params=array(':idPartition'=>$idPartition,':idBlog'=>$idBlog);

        return $this->model()->count($criteria);
    }

    public function getCommentPost($idPartition,$idBlog,$sub=0){
        $criteria = new CDbCriteria();
        $criteria->condition = 'partition_comment=:idPartition and idblog_comment=:idBlog and sub_comment=:sub';
        $criteria->order = 'date_comment';
        $criteria->params=array(':idPartition'=>$idPartition,':idBlog'=>$idBlog,':sub'=>$sub);

        return $this->model()->findAll($criteria);
    }
}
