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

<div id="my_postwidget-7" class="widget">
    <h2>Последние посты</h2>
    <ul class="post-list unstyled">
        <?php
        foreach($postsObjArr as $post){
            ?>
                <li class="post-list_li clearfix">
                    <figure class="featured-thumbnail thumbnail">
                        <?php echo  Chtml::link(Chtml::image(Yii::app()->baseUrl.'/'.$post->titleimg_blog,$post->titletxt_blog,array('title'=>"$post->titletxt_blog",'width'=>'100', 'height'=>'100')),$this->createUrl('',array('post'=>$post->uri_blog)),array('title'=>"$post->titletxt_blog"));?>
                    </figure>
                    <time datetime="<?php echo $post->date_blog;?>"><?php echo Yii::app()->dateFormatter->format('d MMMM yyyy', $post->date_blog);?></time>
                    <h4 class="post-list_h">
                        <?php echo Chtml::link($post->titletxt_blog,$this->createUrl('',array('post'=>$post->uri_blog)),array('title'=>$post->titletxt_blog,'rel'=>'bookmark'));?>
                    </h4>
                    <div class="excerpt">
                        <?php echo LocalMethods::getWords($post->anons_blog,15);?>
                    </div>
                    <?php echo Chtml::link('подробнее',$this->createUrl('',array('post'=>$post->uri_blog)),array('title'=>$post->titletxt_blog,'class'=>'btn btn-primary btn-link'));?>
                </li>
            <?php
        }
        ?>
    </ul>
    <!-- Link under post cycle -->
</div>