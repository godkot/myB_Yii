<?php
/**
 * @var $this PostsController
 * @var $contactObj Contact
 * @var $postsObj blog
 * @var $categoryObj CategoryBlog
 */
?>
<div class="container">
    <div class="row">
        <div class="span12">
            <div class="row">
                <div class="span12">
                    <section class="title-section">
                        <h1 class="title-header"><?php echo CHtml::encode($postsObj[0]->partitionBlog->title_partition);?></h1>
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
                <div class="span8 right" id="content">

                    <?php $this->widget('application.modules.blog.components.MainPosts',array('params'=>$postsObj));?>

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

                <div class="span4 sidebar" id="sidebar">
                    <?php if(!empty($categoryObj)){ ?>
                        <div id="categories-2" class="widget"><h2>Категории</h2>
                            <ul>
                                <?php
                                foreach($categoryObj as $item){
                                    echo '<li class="cat-item">'.chtml::link($item->title_catblog,$this->createUrl('',array('category'=>$item->link_catblog)),array('title'=>'Все посты '.$item->title_catblog)).'</li>';
                                }
                                ?>
                            </ul>
                        </div>
                    <?php }?>

                    <?php $this->widget('application.modules.blog.components.RecentPosts',array('col'=>3, 'type'=>1));?>

                </div>

            </div>
        </div>
    </div>
</div>
</div>
