<?php
/**
 * @var $this DefaultController
 * @var $categoryObj CategoryPortfolio
 * @var $worksObj Portfolio
 * @var $pages integer
 * @var $cols integer
 */
?>
<div class="container">
    <div class="row">
        <div class="span12">
            <div class="row">
                <div class="span12">
                    <section class="title-section">
                        <h1 class="title-header"><?php echo CHtml::encode($worksObj[0]->partitionPortfolio->title_partition);?></h1>
                        <!-- BEGIN BREADCRUMBS-->
                        <?php if(isset($this->breadcrumbs)):
                            $this->widget('zii.widgets.CBreadcrumbs', array(
			                    'links'=>$this->breadcrumbs,
			                    'separator'=>'&nbsp;<li class="divider">/</li>&nbsp;',
			                    'tagName'=>'ul class="breadcrumb breadcrumb__t"',
                                'activeLinkTemplate'=>'<li><a href="{url}">{label}</a></li>',
                                'inactiveLinkTemplate'=>'<li class="active">{label}</li>',
                                'homeLink'=>'<li><a href="'.Yii::app()->homeUrl.'">Главная</a></li>',
		                    ));
                        endif?>
                        <!-- END BREADCRUMBS -->
                    </section><!-- .title-section -->
                </div>
            </div>
            <div class="row">
                <div class="span12">

                    <?php $this->widget('application.modules.works.components.CategoryWorks',array('categoryObj'=>$categoryObj));?>

                    <?php $this->widget('application.modules.works.components.ListWorks',array('worksObj'=>$worksObj,'cols'=>$cols));?>

                    <div class="pagination pagination__posts">
                        <?$this->widget('ReverseLinkPager', array(
                            'pages' => $pages,
                            'htmlOptions' => array(
                                'class' => '',

                            ),

                        ))?>
                    </div>

                    <!-- Posts navigation -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>
