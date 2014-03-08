<div class="container">
    <div class="row">
        <div class="span12">
            <div class="row">
                <div class="span12">
                    <section class="title-section">
                        <h1 class="title-header"><?php echo CHtml::encode($workObj->partitionPortfolio->title_partition);?></h1>
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

                    <div id="content" class="row">
                        <div class="span12">
                            <!--BEGIN .hentry -->
                            <div class="post-502 portfolio type-portfolio status-publish hentry" id="post-502">
                                <div class="row">
                                    <div class="span7">
                                         <?php $this->widget('application.modules.works.components.OneWork',array('workObj'=>$workObj));?>
        <!--END .pager .single-pager -->
                                    </div>

                                    <!-- BEGIN .entry-content -->
                                    <div class="entry-content span5">
                                        <!-- BEGIN .entry-meta -->
                                        <div class="entry-meta">
                                            <ul class="portfolio-meta-list">
                                                <li><strong class="portfolio-meta-key">Client:</strong><span>Lorem ipsum</span><br /></li>
                                                <li><strong class="portfolio-meta-key">Date:</strong><span>07/07/2012</span><br /></li>
                                                <li><strong class="portfolio-meta-key">Info:</strong><span>Phasellus ultrices tellus eget ipsum</span><br /></li>
                                                <li><a href='http://demolink.org'>Launch Project</a></li>
                                            </ul>
                                        </div>
                                        <!-- END .entry-meta -->

                                        <p>This format can be used to display images as a <em>gallery</em>. To attach images to the post please use <strong>Upload Images</strong> button.</p>
                                        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In faucibus, risus eu volutpat pellentesque, massa felis feugiat velit, nec mattis felis elit a eros.</p>
                                        <!-- .share-buttons -->

                                        <!-- //.share-buttons -->
                                    </div>
                                    <!-- END .entry-content -->
                                </div>

                                <!-- .row -->
                                <div class="row">
                                    <div class="span7">
                                        <!-- BEGIN Comments -->

                                        <!-- END Comments -->


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>