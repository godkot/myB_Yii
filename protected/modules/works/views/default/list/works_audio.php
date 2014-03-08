<?php
/**
 * Список работ.
 * @var Controller $this
 * @var Portfolio $work Объект (ActiveRecord) работа из БД.
 * @var integer $cols На сколько колонок разбить список работ (2,3,4)
 */
?>
<li class="portfolio_item works-category-<?php echo $work->category_portfolio;?> oluptatum ">
    <div class="portfolio_item_holder">
        <figure class="thumbnail thumbnail__portfolio">
            <a class="image-wrap" href="<?php echo $this->createUrl('',array('job'=>$work->uri_portfolio));?>" rel="prettyPhoto[gallery<?php echo $work->id_portfolio;?>]" title="<?php echo $work->titletxt_portfolio;?>"><img src="<?php echo Yii::app()->baseUrl.'/'.$work->titleimg_portfolio;?>" alt="<?php echo $work->titletxt_portfolio;?>" /><span class="zoom-icon"></span></a>
        </figure>

        <!-- Caption -->
        <div class="caption caption__portfolio">
            <h3>
                <?php echo CHtml::link($work->titletxt_portfolio,$this->createUrl('',array('job'=>$work->uri_portfolio)));?>
            </h3>
            <p class="excerpt"><?php echo LocalMethods::getWords($work->anons_portfolio,30);?></p>
            <p><?php echo CHtml::link('Подробнее',$this->createUrl('',array('job'=>$work->uri_portfolio)),array('class'=>'btn btn-primary'));?></p>
        </div>
        <!-- /Caption -->
    </div>
</li>