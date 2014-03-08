<?php /* @var $this Controller */?>
<body class="<?php echo CHtml::encode($this->typePage);?>">
<div class="main-holder">
    <header class="header home">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <div class="row">
                        <div class="span12">

                            <!-- BEGIN LOGO -->
                            <div class="logo pull-left">
                                <?php echo Chtml::link(Chtml::image(Yii::app()->theme->baseUrl.'/vendor/images/logo2.png',Yii::app()->name,array('title'=>Yii::app()->name)),$this->createAbsoluteUrl('/site/index'),array('title'=>Yii::app()->name,'class'=>'logo_h logo_h__img'));?>
                                <p class="logo_tagline">Web Developer</p><!-- Site Tagline -->
                            </div>
                            <!-- END LOGO -->

                            <div>
                                <!-- BEGIN MAIN NAVIGATION -->
                                <nav class="nav nav__primary clearfix">
                                    <?php
                                    $this->widget('application.extensions.superfish.RSuperfish', array(
                                        'items'=>$this->menu,
                                    ));

                                    ?>
                                </nav>
                                <!-- END MAIN NAVIGATION -->


                            </div>
                        </div>
                        <div class="span6 hidden-phone">
                            <!-- BEGIN SEARCH FORM -->
                            <!-- END SEARCH FORM -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="clear"></div>
    <div class="content-holder clearfix">