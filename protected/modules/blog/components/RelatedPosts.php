<?php
/**
 * @var $post Blog
 * */
class RelatedPosts extends CWidget
{
    public $params; //полученные параметры

    public function run()
    {
        if(count($this->params)>0){
            if(!empty($this->params->related_blog)){
                $relatedPostsObj = Blog::model()->getBlogRelatedPosts($this->params->related_blog);
                ?><ul class="related-posts_list clearfix"><?php
                foreach($relatedPostsObj as $post){
                    ?>
                            <li class="related-posts_item">
                                <figure class="thumbnail featured-thumbnail">
                                    <?php echo Chtml::link(Chtml::image(Yii::app()->baseUrl.'/'.$post->titleimg_blog,$post->titletxt_blog,array('title'=>$post->titletxt_blog, 'width'=>200,'height'=>120)),$this->controller->createUrl('',array('post'=>$post->uri_blog)),array('title'=>$post->titletxt_blog));?>
                                    <!--<a href="#" title="Image format post"><img src="http://livedemo00.template-help.com/wordpress_43885/wp-content/uploads/2013/03/15-200x120.jpg" alt="Image format post" /></a>-->
                                </figure>
                                <?php echo Chtml::link($post->titletxt_blog,$this->controller->createUrl('',array('post'=>$post->uri_blog)));?>
                                <!--<a href="#" > Image format post </a>-->
                            </li>
                    <?php
                }
                ?></ul><?php
            }
            else echo 'Нет похожих постов.';
        }
    }
}