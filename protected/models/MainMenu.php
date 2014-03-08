<?php

/**
 * This is the model class for table "main_menu".
 *
 * The followings are the available columns in table 'main_menu':
 * @property integer $id_menu
 * @property integer $idpart_menu
 * @property string $namepart_menu
 * @property string $title_menu
 * @property string $link_menu
 * @property integer $level_menu
 * @property string $idsub_menu
 * @property integer $show_menu
 * @property integer $sort_menu
 * @property string $paramlink
 *
 * The followings are the available model relations:
 * @property Partition $idpartMenu
 * @property Partition $namepartMenu
 */
class MainMenu extends CActiveRecord
{
    private $_active_menu;
    private $_subMenuList;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'main_menu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idpart_menu, namepart_menu, title_menu, link_menu, level_menu, idsub_menu, show_menu, sort_menu, paramlink', 'required'),
			array('idpart_menu, level_menu, show_menu, sort_menu', 'numerical', 'integerOnly'=>true),
			array('namepart_menu', 'length', 'max'=>100),
			array('title_menu, link_menu, idsub_menu, paramlink', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_menu, idpart_menu, namepart_menu, title_menu, link_menu, level_menu, idsub_menu, show_menu, sort_menu, paramlink', 'safe', 'on'=>'search'),
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
			'idpartMenu' => array(self::BELONGS_TO, 'Partition', 'idpart_menu'),
			'namepartMenu' => array(self::BELONGS_TO, 'Partition', 'namepart_menu'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_menu' => 'Id Menu',
			'idpart_menu' => 'Idpart Menu',
			'namepart_menu' => 'Namepart Menu',
			'title_menu' => 'Title Menu',
			'link_menu' => 'Link Menu',
			'level_menu' => 'Level Menu',
			'idsub_menu' => 'Idsub Menu',
			'show_menu' => 'Show Menu',
			'sort_menu' => 'Sort Menu',
			'paramlink' => 'Paramlink',
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

		$criteria->compare('id_menu',$this->id_menu);
		$criteria->compare('idpart_menu',$this->idpart_menu);
		$criteria->compare('namepart_menu',$this->namepart_menu,true);
		$criteria->compare('title_menu',$this->title_menu,true);
		$criteria->compare('link_menu',$this->link_menu,true);
		$criteria->compare('level_menu',$this->level_menu);
		$criteria->compare('idsub_menu',$this->idsub_menu,true);
		$criteria->compare('show_menu',$this->show_menu);
		$criteria->compare('sort_menu',$this->sort_menu);
		$criteria->compare('paramlink',$this->paramlink,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MainMenu the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getMenuItems($activ) {

        $this->_active_menu = $activ;

        $criteria = new CDbCriteria;
        $criteria->select = '*';
        $criteria->condition = 'level_menu=0 AND show_menu=1';

        $menuItemsObj = $this->model()->findAll($criteria);
        $menuItems = array();

        foreach($menuItemsObj as $item) {
            if(!empty($item->idsub_menu)){
                $this->_subMenuList=$item->idsub_menu;
                $subMenuItems=$this->getSubMenuItems();
                if ($item->namepart_menu == $this->_active_menu ){
                    $menuItems[] = array('label'=>$item->title_menu, 'active'=>'true', 'url'=>Yii::app()->baseUrl.'/'.$item->link_menu, 'items' => $subMenuItems);
                } else $menuItems[] = array('label'=>$item->title_menu, 'url'=>Yii::app()->baseUrl.'/'.$item->link_menu, 'items' => $subMenuItems);
            }
            else{
                if ($item->namepart_menu == $this->_active_menu ){
                    $menuItems[] = array('label'=>$item->title_menu, 'active'=>'true', 'url'=>Yii::app()->baseUrl.'/'.$item->link_menu);
                } else $menuItems[] = array('label'=>$item->title_menu, 'url'=>Yii::app()->baseUrl.'/'.$item->link_menu);
            }
        }
        return $menuItems;
    }

    private function getSubMenuItems() {
        //$idSubMenu=explode(",",$this->_subMenuList);
        $criteria=new CDbCriteria;
        $criteria->select='*';  // выбираем только поле 'title'
        $criteria->condition="show_menu=1 AND id_menu in ($this->_subMenuList)";
        //$criteria->params=array(':SubMenu'=>$this->_subMenuList);

        $menuItemsObj = $this->model()->findAll($criteria); //Если используете ActiveRecord
        $menuItems = array();

        foreach($menuItemsObj as $item) {

            if ($item->namepart_menu == $this->_active_menu ){
                $menuItems[] = array('label'=>$item->title_menu, 'active'=>'true', 'url'=>$item->link_menu);
            } else $menuItems[] = array('label'=>$item->title_menu, 'url'=>$item->link_menu);
        }
        return $menuItems;
    }
}
