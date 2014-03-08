<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="row footer-widgets">
                    <div class="span4">
                        <div id="social_networks-2"><h3>Соц. сети</h3>
                            <!-- BEGIN SOCIAL NETWORKS -->
                            <ul class="social social__row clearfix unstyled">
                                <li class="social_li"><a class="social_link social_link__facebook" rel="tooltip" data-original-title="facebook" href="#"><span class="social_ico"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/vendor/images/soc/facebook.png" alt=""></span></a>
                                </li>
                                <li class="social_li"><a class="social_link social_link__twitter" rel="tooltip" data-original-title="twitter" href="#"><span class="social_ico"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/vendor/images/soc/twitter.png" alt=""></span></a>
                                </li>
                                <li class="social_li"><a class="social_link social_link__feed" rel="tooltip" data-original-title="feed" href="#"><span class="social_ico"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/vendor/images/soc/feed.png" alt=""></span></a>
                                </li>
                                <li class="social_li"><a class="social_link social_link__linkedin" rel="tooltip" data-original-title="linkedin" href="#"><span class="social_ico"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/vendor/images/soc/linkedin.png" alt=""></span></a>
                                </li>
                                <li class="social_li"><a class="social_link social_link__google+" rel="tooltip" data-original-title="google+" href="#"><span class="social_ico"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/vendor/images/soc/google+.png" alt=""></span></a>
                                </li>
                            </ul>
                            <!-- END SOCIAL NETWORKS -->
                        </div>
                    </div>

                    <?php $this->widget('application.modules.blog.components.RecentPosts',array('col'=>3, 'type'=>2));?>

                    <div class="span4">
                        <div>
                            <h3>Проекты</h3>
                            <ul class='post-list unstyled'>
                                <li class="cat_post_item-1 clearfix">
                                    <figure class="featured-thumbnail thumbnail"><a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/vendor/images/works/malusha_80.png" width="80" height="80" alt="Центр семейного развития Малуша" /></a>
                                    </figure>
                                    <time datetime="2011-07-14T20:31">Октябрь 18, 2013</time>
                                    <h4 class="post-list_h"><a class="post-title" href="#" rel="bookmark" title="Центр семейного развития Малуша">Центр семейного развития Малуша</a></h4>
                                    <div class="excerpt"></div>
                                </li><!--//.post-list_li -->

                                <li class="cat_post_item-2 clearfix">
                                    <figure class="featured-thumbnail thumbnail"><a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/vendor/images/works/whomakes_80.png" width="80" height="80" alt="Сервис поручений WhoMakes" /></a>
                                    </figure>
                                    <time datetime="2011-07-14T20:30">Май 6, 2013</time>
                                    <h4 class="post-list_h"><a class="post-title" href="#" rel="bookmark" title="Сервис поручений WhoMakes">Сервис поручений WhoMakes</a></h4>
                                    <div class="excerpt"></div>
                                </li><!--//.post-list_li -->

                                <li class="cat_post_item-3 clearfix">
                                    <figure class="featured-thumbnail thumbnail"><a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/vendor/images/works/autoboom_80.png" width="80" height="80" alt="Магазин автозапчастей Автобум" /></a>
                                    </figure>
                                    <time datetime="2011-05-14T20:29">Март 14, 2013</time>
                                    <h4 class="post-list_h"><a class="post-title" href="#" rel="bookmark" title="Магазин автозапчастей Автобум">Магазин автозапчастей Автобум</a></h4>
                                    <div class="excerpt"></div>
                                </li><!--//.post-list_li -->
                            </ul>
                        </div>
                    </div>

                    <div class="clear"></div>
                </div>
                <div class="row copyright">
                    <div class="span6">
                        <div id="footer-text" class="footer-text">Ашурков КК &copy; <?php echo date('Y'); ?> | <a href="#">Все права защищены</a>
                            <!-- {%FOOTER_LINK} -->
                        </div>
                    </div>
                    <div class="span6"></div>
                </div>
            </div>
        </div>
    </div>
</footer>