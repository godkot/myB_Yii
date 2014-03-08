<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" dir="ltr" lang="ru"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" dir="ltr" lang="ru"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" dir="ltr" lang="ru"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" dir="ltr" lang="ru"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html dir="ltr" lang="ru"> <!--<![endif]-->
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="<?php echo CHtml::encode($this->seoPartArr['desc']); ?>" />
    <meta name="keywords" content="<?php echo CHtml::encode($this->seoPartArr['keywords']); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/vendor/images/favicon.ico" type="image/x-icon" />
    <!--[if lt IE 8]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" alt="" /></a>
    </div>
    <![endif]-->

    <link rel="stylesheet" type="text/css" media="all" href="<?php echo Yii::app()->theme->baseUrl; ?>/vendor/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo Yii::app()->theme->baseUrl; ?>/vendor/bootstrap/css/bootstrap-responsive.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo Yii::app()->theme->baseUrl; ?>/vendor/CherryFramework/css/prettyPhoto.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo Yii::app()->theme->baseUrl; ?>/vendor/CherryFramework/css/camera.css" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo Yii::app()->theme->baseUrl; ?>/vendor/css/style.css" />

    <link rel='stylesheet' id='options_typography_Roboto+Condensed-css' href='http://fonts.googleapis.com/css?family=Roboto+Condensed&#038;subset=latin' type='text/css' media='all' />
    <link rel='stylesheet' id='options_typography_Droid+Serif-css' href='http://fonts.googleapis.com/css?family=Droid+Serif&#038;subset=latin' type='text/css' media='all' />

    <link rel='prev' title='Privacy Policy' href='<?php echo CHtml::encode($this->seoPartArr['uri']); ?>' />
    <link rel='next' title='Testimonials' href='<?php echo CHtml::encode($this->seoPartArr['uri']); ?>' />
    <link rel='canonical' href='<?php echo CHtml::encode($this->seoPartArr['uri']); ?>' />

    <style type='text/css'>
        h1 { font: bold 32px/32px Roboto Condensed;  color:#444444; }
        h2 { font: bold 32px/32px Roboto Condensed;  color:#444444; }
        h3 { font: normal 28px/28px Roboto Condensed;  color:#444444; }
        h4 { font: bold 16px/28px Droid Serif;  color:#444444; }
        h5 { font: bold 16px/28px Droid Serif;  color:#444444; }
        h6 { font: normal 12px/18px Arial, Helvetica, sans-serif;  color:#333333; }
        .main-holder { font: normal 18px/28px Droid Serif;  color:#747474; }
        .logo_h__txt, .logo_link { font: normal 48px/48px Roboto Condensed;  color:#ffffff; }
        .sf-menu > li > a { font: normal 18px/18px Roboto Condensed;  color:#ffffff; }
        .nav.footer-nav a { font: normal 12px/12px Droid Serif;  color:#ffffff; }
    </style>

    <script type='text/javascript' src='<?php echo Yii::app()->theme->baseUrl; ?>/vendor/CherryFramework/js/jquery-1.7.2.min.js?ver=1.7.2'></script>
    <script type='text/javascript' src='<?php echo Yii::app()->theme->baseUrl; ?>/vendor/CherryFramework/js/modernizr.js?ver=2.0.6'></script>
    <script type='text/javascript' src='<?php echo Yii::app()->theme->baseUrl; ?>/vendor/CherryFramework/js/superfish.js?ver=1.5.3'></script>

    <script type='text/javascript' src='<?php echo Yii::app()->theme->baseUrl; ?>/vendor/CherryFramework/js/jquery.easing.1.3.js?ver=1.3'></script>
    <script type='text/javascript' src='<?php echo Yii::app()->theme->baseUrl; ?>/vendor/CherryFramework/js/jquery.prettyPhoto.js?ver=3.1.5'></script>
    <script type='text/javascript' src='<?php echo Yii::app()->theme->baseUrl; ?>/vendor/CherryFramework/js/jquery.elastislide.js?ver=1.0'></script>
    <script type='text/javascript' src='<?php echo Yii::app()->theme->baseUrl; ?>/vendor/js/swfobject.js?ver=2.2-20120417'></script>
    <script type='text/javascript' src='<?php echo Yii::app()->theme->baseUrl; ?>/vendor/CherryFramework/js/jquery.mobilemenu.js?ver=1.0'></script>

    <script type='text/javascript' src='<?php echo Yii::app()->theme->baseUrl; ?>/vendor/CherryFramework/js/si.files.js?ver=1.0'></script>
    <script type='text/javascript' src='<?php echo Yii::app()->theme->baseUrl; ?>/vendor/CherryFramework/js/camera.min.js?ver=1.3.4'></script>
    <script type='text/javascript' src='<?php echo Yii::app()->theme->baseUrl; ?>/vendor/CherryFramework/js/jplayer.playlist.min.js?ver=2.1.0'></script>
    <script type='text/javascript' src='<?php echo Yii::app()->theme->baseUrl; ?>/vendor/CherryFramework/js/jquery.jplayer.min.js?ver=2.2.0'></script>
    <script type='text/javascript' src='<?php echo Yii::app()->theme->baseUrl; ?>/vendor/CherryFramework/js/custom.js?ver=1.0'></script>
    <script type='text/javascript' src='<?php echo Yii::app()->theme->baseUrl; ?>/vendor/CherryFramework/js/jquery.debouncedresize.js?ver=1.0'></script>
    <script type='text/javascript' src='<?php echo Yii::app()->theme->baseUrl; ?>/vendor/CherryFramework/js/jquery.isotope.js?ver=1.5.25'></script>

    <script type='text/javascript' src='<?php echo Yii::app()->theme->baseUrl; ?>/vendor/CherryFramework/bootstrap/js/bootstrap.min.js?ver=2.3.0'></script>
    <script type='text/javascript' src='<?php echo Yii::app()->theme->baseUrl; ?>/vendor/js/scripts.js?ver=1.0'></script>
    <script type='text/javascript' src='<?php echo Yii::app()->theme->baseUrl; ?>/vendor/CherryFramework/js/jquery.roundabout.min.js?ver=3.4'></script>
    <script type='text/javascript' src='<?php echo Yii::app()->theme->baseUrl; ?>/vendor/CherryFramework/js/jquery.roundabout-shapes.min.js?ver=3.4'></script>

    <!--[if (gt IE 9)|!(IE)]><!-->
    <script src="<?php echo Yii::app()->theme->baseUrl; ?>/vendor/CherryFramework/js/jquery.mobile.customized.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(function(){
            jQuery('.sf-menu').mobileMenu();
        });
    </script>
    <!--<![endif]-->

    <script type="text/javascript">
        // Init navigation menu
        jQuery(function(){
            // main navigation init
            jQuery('ul.sf-menu').superfish({
                delay:       1000, 		// the delay in milliseconds that the mouse can remain outside a sub-menu without it closing
                animation:   {opacity:'false',height:'show'}, // used to animate the sub-menu open
                speed:       'normal',  // animation speed
                autoArrows:  false,   // generation of arrow mark-up (for submenu)
                disableHI: true // to disable hoverIntent detection
            });
        });

        // Init for si.files
        SI.Files.stylizeAll();

        //Zoom fix
        jQuery(function(){
            // IPad/IPhone
            var viewportmeta = document.querySelector && document.querySelector('meta[name="viewport"]'),
                ua = navigator.userAgent,

                gestureStart = function () {
                    viewportmeta.content = "width=device-width, minimum-scale=0.25, maximum-scale=1.6";
                },

                scaleFix = function () {
                    if (viewportmeta && /iPhone|iPad/.test(ua) && !/Opera Mini/.test(ua)) {
                        viewportmeta.content = "width=device-width, minimum-scale=1.0, maximum-scale=1.0";
                        document.addEventListener("gesturestart", gestureStart, false);
                    }
                };
            scaleFix();
        })
    </script>

    <title><?php echo CHtml::encode($this->seoPartArr['title']); ?></title>
</head>