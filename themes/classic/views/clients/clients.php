<?php
/**
 * @param array $clientsObjArr Массив записей (ActiveRecord) клиентов
 * @var Clients $client Запись из модели Clients
 */
?>
<div class="row">
    <div class="span12 pull-right"><h2>Клиенты</h2></div>
    <?php
        foreach($clientsObjArr as $client){
            echo '<div class="span3 pull-right">', CHtml::link(CHtml::image(Yii::app()->baseUrl.'/'.$client->img_clients,$client->title_clients,array('class'=>'alignnone size-full', 'width'=>'270', 'height'=>'118')),$client->link_clients,array('target'=>'_blank', 'title'=>$client->title_clients)), '</div>';
        }
    ?>
</div> <!-- .row (end) -->
<div class="spacer"><!-- .spacer (end) --></div>