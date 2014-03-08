<?php
/**
 * Created by PhpStorm.
 * User: KoT
 * Date: 06.03.14
 * Time: 20:15
 * @param Portfolio $workObj
 */
?>
<!--BEGIN .slider -->
<div class="grid_gallery clearfix">
    <div class="grid_gallery_inner">
        <?php
        if(!empty($workObj->photo_portfolio)){
            $photosArr = explode(';',$workObj->photo_portfolio);
            if(count($photosArr)>0){
                $i=1;
                foreach($photosArr as $photo){
                    ?><div class="gallery_item"><figure class="featured-thumbnail single-gallery-item"><?php
                    //echo CHtml::link(CHtml::image(Yii::app()->baseUrl.'/'.$photo,$i,array('width'=>260,'height'=>160))."<span class='zoom-icon'></span>",
                      //                Yii::app()->baseUrl.'/'.$photo,
                        //              array('class'=>'image-wrap','rel'=>'prettyPhoto[gallery]'));

                ?><a href="<?php echo Yii::app()->baseUrl.'/'.$photo;?>" class="image-wrap" rel="prettyPhoto[gallery]"><img	alt="<?php echo $i;?>"	src="<?php echo Yii::app()->baseUrl.'/'.$photo;?>" width="260" height="160"/><span class="zoom-icon"></span></a><?php

                    ?></figure></div><?php
                    $i++;
                }
            }
        }
        ?>
    </div>
</div>
<!--END .slider -->
<!--BEGIN .pager .single-pager -->
<ul class="pager single-pager">
    <li class="previous"><a href="#" rel="prev">&laquo; Назад</a></li>
    <li class="next"><a href="#" rel="next">Далее</a></li>
</ul>
<!--END .pager .single-pager -->