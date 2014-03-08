<?php
/**
 * Виджет Клиентов
 * Выбирает нужное колличество записей из модели Clients и передает массив записей $clientsObjArr в представление clients
 * @param integer $col Колличество записей для вывода
 * @var array $clientsObjArr Массив записей (ActiveRecord) клиентов
 * */
class ClientsWidget extends CWidget
{
    public $col;

    public function run()
    {
        if(is_int($this->col) and $this->col>0){
            $criteria=new CDbCriteria;
            $criteria->order = 'sort_clients desc';
            $criteria->limit = $this->col;
            $clientsObjArr = Clients::model()->findAll($criteria);
            echo Yii::app()->controller->renderPartial('/clients/clients', array('clientsObjArr'=>$clientsObjArr), true);
        }
    }
}