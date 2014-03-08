<?php
/**
 * Created by PhpStorm.
 * User: KoT
 * Date: 27.02.14
 * Time: 11:58
 * @var $this Controller
 * @var $post Blog Объект поста из блога
 * @var $countComment Количество комментариев в посте.
 */
?>
<article id="post-77" class="post type-post post__holder">
                        <header class="post-header">
                            <h2 class="post-title">
                                <?php echo Chtml::link($post->titletxt_blog,$this->createUrl('',array('post'=>$post->uri_blog)),array('title'=>"$post->titletxt_blog"));?>
                                <!--<a href="blog_inter_txt.php" title="<?php echo Chtml::encode($post->titletxt_blog);?>"><?php echo Chtml::encode($post->titletxt_blog);?></a>-->
                            </h2>
                        </header>
                        <?php if(!empty($post->titleimg_blog)){?>
                        <figure class="featured-thumbnail thumbnail">
                            <?php echo Chtml::link(Chtml::image(Yii::app()->baseUrl.'/'.$post->titleimg_blog,$post->titletxt_blog,array('title'=>"$post->titletxt_blog",'width'=>'370', 'height'=>'350')),$this->createUrl('',array('post'=>$post->uri_blog)),array('title'=>"$post->titletxt_blog"));?>
                            <!--<a href="blog_inter_txt.php"><img width="370" height="350" src="http://livedemo00.template-help.com/wordpress_43885/wp-content/uploads/2011/07/tim-braun-370x350.jpg" alt="tim-braun" title="tim-braun" /></a>-->
                        </figure>
                        <?php } ?>

                        <!-- Post Content -->
                        <div class="post_content">
                            <div class="excerpt">
                                <?php echo $post->anons_blog;?>
                            </div>
                            <?php echo Chtml::link('Подробнее',$this->createUrl('',array('post'=>$post->uri_blog)), array('class'=>'btn'));?>
                            <!--<a href="blog_inter_txt.php" class="btn">Read more</a>-->
                            <div class="clear"></div>
                        </div>

                        <!-- Post Meta -->
                        <div class="post_meta">
                            <span class="post_category">
                              <i class="icon-bookmark"></i>
                                <?php echo Chtml::link($post->catBlog->title_catblog,'blog/category/'.$post->catBlog->link_catblog,array('title'=>'Все посты из '.$post->catBlog->title_catblog, 'rel'=>'category tag'));?>
                              <!--<a href="#" title="View all posts in Venenatis" rel="category tag">Venenatis molestie cras</a>-->
                            </span>
                            <span class="post_date">
                              <i class="icon-calendar"></i>
                              <time datetime="<?php echo $post->date_blog;?>"><?php echo Yii::app()->dateFormatter->format('d MMMM yyyy', $post->date_blog);?></time>
                            </span>
                            <span class="post_author">
                              <i class="icon-user"></i>
                                <?php echo Chtml::link($post->authorBlog->nikname_admuser,$this->createUrl('',array('author'=>$post->authorBlog->nikname_admuser)),array('title'=>'Все посты от '.$post->authorBlog->nikname_admuser, 'rel'=>'author'));?>
                              <!--<a href="#" title="Posts by admin" rel="author">admin</a>-->
                            </span>
                            <span class="post_comment">
                              <i class="icon-comments"></i>
                                <?php echo Chtml::link(CommentsMethod::getWordComment($countComment),$this->createUrl('posts/index/post/'.$post->uri_blog.'/',array('#'=>'comments')),array('class'=>'comments-link','title'=>'Комментарии поста '.$post->titletxt_blog));?>
                              <!--<a href="/#comments" class="comments-link" title="Comment on Donec tempor libero">3 comments</a>-->
                            </span>

                        </div>
                        <!--// Post Meta -->
                    </article>