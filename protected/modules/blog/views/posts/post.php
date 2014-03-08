<?php
/**
 * @var $this PostsController
 * @var $postObj blog
 * @var $categoryObj CategoryBlog
 */
?>
<div class="container">
    <div class="row">
        <div class="span12">
            <div class="row">
                <div class="span12">
                    <section class="title-section">
                        <h1 class="title-header"><?php echo CHtml::encode($postObj->partitionBlog->title_partition);?></h1>
                        <!-- BEGIN BREADCRUMBS-->
                        <?php if(isset($this->breadcrumbs)):?>
                            <?php $this->widget('zii.widgets.CBreadcrumbs', array(
			                        'links'=>$this->breadcrumbs,
			                        'separator'=>'&nbsp;<li class="divider">/</li>&nbsp;',
    			                    'tagName'=>'ul class="breadcrumb breadcrumb__t"',
                                    'activeLinkTemplate'=>'<li><a href="{url}">{label}</a></li>',
                                    'inactiveLinkTemplate'=>'<li class="active">{label}</li>',
                                    'homeLink'=>'<li><a href="'.Yii::app()->homeUrl.'">Главная</a></li>',
		                        )); ?><!-- breadcrumbs -->
                        <?php endif?>
                        <!-- END BREADCRUMBS -->
                    </section><!-- .title-section -->
                </div>
            </div>
            <div class="row">
                <div class="span8 right" id="content">

                    <?php
                    $this->widget('application.modules.blog.components.OnePost',array('postObj'=>$postObj));
                    ?>

                    <div class="post-author clearfix">
                        <h3 class="post-author_h">Автор
                            <?php echo Chtml::link($postObj->authorBlog->nikname_admuser,$this->createUrl('',array('author'=>$postObj->authorBlog->nikname_admuser)),array('title'=>'Все посты от '.$postObj->authorBlog->nikname_admuser, 'rel'=>'author'));?>
                        </h3>
                        <p class="post-author_gravatar">
                            <?php echo Chtml::image(Yii::app()->baseUrl.'/'.$postObj->authorBlog->photo_admuser,$postObj->authorBlog->nikname_admuser,array('title'=>$postObj->authorBlog->nikname_admuser,'class'=>'avatar avatar-80 photo','height'=>80,'width'=>'80'))?>
                        </p>
                        <div class="post-author_desc">
                            <div class="post-author_link">
                                <p>Показать все посты от: <?php echo Chtml::link($postObj->authorBlog->nikname_admuser, $this->createUrl('',array('author'=>$postObj->authorBlog->nikname_admuser)),array('title'=>'Все посты от '.$postObj->authorBlog->nikname_admuser, 'rel'=>'author'));?></p>
                            </div>
                        </div>
                    </div><!--.post-author-->

                    <div class="related-posts">
                        <h3 class="related-posts_h">Похожие посты</h3>

                        <?php $this->widget('application.modules.blog.components.RelatedPosts',array('params'=>$postObj));?>

                    </div><!-- .related-posts -->

                    <!-- BEGIN Comments -->
                    <?php $this->widget('application.modules.blog.components.CommentPosts',array('params'=>$postObj,'modelComment'=>$modelComment,'modelUser'=>$modelUser));?>

                    <?php //$this->widget('application.modules.blog.components.NesSet',array('params'=>$postObj));?>
                    <!-- END Comments -->
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
