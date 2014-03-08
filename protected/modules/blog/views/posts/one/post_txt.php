<?php
/**
 * @var $this Controller
 * @var $postObj Blog Объект поста из блога
 * @var $countComment Количество комментариев в посте.
 */
?>
<article id="post-77" class="post type-post status-publish format-standard hentry post__holder">
                        <header class="post-header">
                            <h1 class="post-title"><?php echo Chtml::encode($postObj->titletxt_blog); ?></h1>
                        </header>
                        <figure class="featured-thumbnail thumbnail">
                            <?php echo Chtml::image(Yii::app()->baseUrl.'/'.$postObj->titleimg_blog,$postObj->titletxt_blog,array('title'=>"$postObj->titletxt_blog",'width'=>'370', 'height'=>'350'));?>
                            <!--<img width="370" height="350" src="http://livedemo00.template-help.com/wordpress_43885/wp-content/uploads/2011/07/tim-braun-370x350.jpg" class="attachment-post-thumbnail" alt="tim-braun" title="tim-braun" />-->
                        </figure>

                        <!-- Post Content -->
                        <div class="post_content">
                            <?php echo $postObj->text_blog;?>
                            <div class="clear"></div>
                        </div>
                        <!-- //Post Content -->

    <!-- Post Meta -->
    <div class="post_meta">
                            <span class="post_category">
                              <i class="icon-bookmark"></i>
                                <?php echo Chtml::link($postObj->catBlog->title_catblog,'blog/category/'.$postObj->catBlog->link_catblog,array('title'=>'Все посты из '.$postObj->catBlog->title_catblog, 'rel'=>'category tag'));?>
                                <!--<a href="#" title="View all posts in Venenatis" rel="category tag">Venenatis molestie cras</a>-->
                            </span>
                            <span class="post_date">
                              <i class="icon-calendar"></i>
                              <time datetime="<?php echo $postObj->date_blog;?>"><?php echo Yii::app()->dateFormatter->format('d MMMM yyyy', $postObj->date_blog);?></time>
                            </span>
                            <span class="post_author">
                              <i class="icon-user"></i>
                                <?php echo Chtml::link($postObj->authorBlog->nikname_admuser,$this->createUrl('',array('author'=>$postObj->authorBlog->nikname_admuser)),array('title'=>'Все посты от '.$postObj->authorBlog->nikname_admuser, 'rel'=>'author'));?>
                                <!--<a href="#" title="Posts by admin" rel="author">admin</a>-->
                            </span>
                            <span class="post_comment">
                              <i class="icon-comments"></i>
                                <?php echo Chtml::link(CommentsMethod::getWordComment($countComment),$this->createUrl('posts/index/post/'.$postObj->uri_blog.'/',array('#'=>'comments')),array('class'=>'comments-link','title'=>'Комментарии поста '.$postObj->titletxt_blog));?>
                                <!--<a href="/#comments" class="comments-link" title="Comment on Donec tempor libero">3 comments</a>-->
                            </span>

    </div>
    <!--// Post Meta -->
                    </article>