<?php
/**
 * Created by PhpStorm.
 * User: KoT
 * Date: 04.03.14
 * Time: 19:36
 * Отображение последних постов
 * @var PostsController $this
 * @param array $postsObjArr Массив записей (ActiveRecord) постов
 * @var Blog $post Запись из модели Blog
 */
?>
<div class="span4">
    <div>
        <h3>Блог</h3>
        <ul class='post-list unstyled'>
            <?php foreach($postsObjArr as $post){ ?>
                <li class="cat_post_item-1 clearfix">
                    <figure class="featured-thumbnail thumbnail">
                        <?php echo  Chtml::link(Chtml::image(Yii::app()->baseUrl.'/'.$post->titleimg_blog,$post->titletxt_blog,array('title'=>"$post->titletxt_blog",'width'=>'80', 'height'=>'80')),$this->createUrl('',array('post'=>$post->uri_blog)),array('title'=>"$post->titletxt_blog"));?>
                    </figure>
                    <time datetime="<?php echo $post->date_blog;?>"><?php echo Yii::app()->dateFormatter->format('d MMMM yyyy', $post->date_blog);?></time>
                    <h4 class="post-list_h">
                        <?php echo Chtml::link($post->titletxt_blog,$this->createUrl('',array('post'=>$post->uri_blog)),array('title'=>$post->titletxt_blog,'rel'=>'bookmark'));?>
                    </h4>
                    <div class="excerpt"></div>
                </li><!--//.post-list_li -->
            <?php } ?>
        </ul>
    </div>
</div>