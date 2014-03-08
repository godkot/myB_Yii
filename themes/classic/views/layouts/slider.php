<?php
/**
 * @var $this Controller
 */
?>

<script type="text/javascript">
    //    jQuery(window).load(function() {
    jQuery(function() {
        var myCamera = jQuery('#camera52d38154014f5');
        if (!myCamera.hasClass('motopress-camera')) {
            myCamera.addClass('motopress-camera');
            myCamera.camera({
                alignment           : 'topCenter', //topLeft, topCenter, topRight, centerLeft, center, centerRight, bottomLeft, bottomCenter, bottomRight
                autoAdvance         : false,   //true, false
                mobileAutoAdvance   : false, //true, false. Auto-advancing for mobile devices
                barDirection        : 'leftToRight',    //'leftToRight', 'rightToLeft', 'topToBottom', 'bottomToTop'
                barPosition         : 'top',    //'bottom', 'left', 'top', 'right'
                cols                : 12,
                easing              : 'easeOutQuad',  //for the complete list http://jqueryui.com/demos/effect/easing.html
                mobileEasing        : '',   //leave empty if you want to display the same easing on mobile devices and on desktop etc.
                fx                  : 'simpleFade',    //'random','simpleFade', 'curtainTopLeft', 'curtainTopRight', 'curtainBottomLeft',          'curtainBottomRight', 'curtainSliceLeft', 'curtainSliceRight', 'blindCurtainTopLeft', 'blindCurtainTopRight', 'blindCurtainBottomLeft', 'blindCurtainBottomRight', 'blindCurtainSliceBottom', 'blindCurtainSliceTop', 'stampede', 'mosaic', 'mosaicReverse', 'mosaicRandom', 'mosaicSpiral', 'mosaicSpiralReverse', 'topLeftBottomRight', 'bottomRightTopLeft', 'bottomLeftTopRight', 'bottomLeftTopRight'
                //you can also use more than one effect, just separate them with commas: 'simpleFade, scrollRight, scrollBottom'
                mobileFx            : '',   //leave empty if you want to display the same effect on mobile devices and on desktop etc.
                gridDifference      : 250,  //to make the grid blocks slower than the slices, this value must be smaller than transPeriod
                height              : '39.37%', //here you can type pixels (for instance '300px'), a percentage (relative to the width of the slideshow, for instance '50%') or 'auto'
                imagePath           : 'images/',    //he path to the image folder (it serves for the blank.gif, when you want to display videos)
                loader              : 'no',    //pie, bar, none (even if you choose "pie", old browsers like IE8- can't display it... they will display always a loading bar)
                loaderColor         : '#ffffff',
                loaderBgColor       : '#eb8a7c',
                loaderOpacity       : 1,    //0, .1, .2, .3, .4, .5, .6, .7, .8, .9, 1
                loaderPadding       : 0,    //how many empty pixels you want to display between the loader and its background
                loaderStroke        : 3,    //the thickness both of the pie loader and of the bar loader. Remember: for the pie, the loader thickness must be less than a half of the pie diameter
                minHeight           : '147px',  //you can also leave it blank
                navigation          : false, //true or false, to display or not the navigation buttons
                navigationHover     : false,    //if true the navigation button (prev, next and play/stop buttons) will be visible on hover state only, if false they will be visible always
                pagination          : false,
                playPause           : false,   //true or false, to display or not the play/pause buttons
                pieDiameter         : 33,
                piePosition         : 'rightTop',   //'rightTop', 'leftTop', 'leftBottom', 'rightBottom'
                portrait            : true, //true, false. Select true if you don't want that your images are cropped
                rows                : 8,
                slicedCols          : 12,
                slicedRows          : 8,
                thumbnails          : false,
                time                : 7000,   //milliseconds between the end of the sliding effect and the start of the next one
                transPeriod         : 1500, //lenght of the sliding effect in milliseconds

                ////////callbacks

                onEndTransition     : function() {  },  //this callback is invoked when the transition effect ends
                onLoaded            : function() {  },  //this callback is invoked when the image on a slide has completely loaded
                onStartLoading      : function() {  },  //this callback is invoked when the image on a slide start loading
                onStartTransition   : function() {  }   //this callback is invoked when the transition effect starts
            });
        }
    });
    //    });
</script>
<div>
    <div id="slider-wrapper" class="slider">
        <div id="camera52d38154014f5" class="camera_wrap camera">
            <div data-src='<?php echo Yii::app()->theme->baseUrl; ?>/vendor/images/slider/slider_1.jpg' data-thumb='<?php echo Yii::app()->theme->baseUrl; ?>/vendor/images/slider/slider_1-96x41.jpg'>
                <div class="camera_caption fadeIn">
                    <h1><strong>WEB разработчик</strong></h1><br>
                    <h1 class="c2">HTML5&CSS3, JavaScript(Jquery,AJAX), PHP5&MySQL <br> CMS: Joomla, WordPress, Drupal, opencart <br> FrameWork: codeigniter, Yii</h1>
                    <div>Доверьте мне разработку Вашего проекта и я сделаю Вам современный сайт. <br>Я дорожу своей репутацией, поэтому гарантирую Вам полное погружение <br> в Ваш проект, ответственность, отчеты о проделанной работе.</div>
                    <?php echo CHtml::link('Мои работы', $this->createUrl('work/index'),array('class'=>'big-btn')), ' &nbsp; - или - &nbsp; ', CHtml::link('Напиши мне', $this->createUrl('site/contact'),array('class'=>'big-btn type2'));?>
                    <!--<a href="portfolio.php" class="big-btn">Мои работы</a> &nbsp; - или - &nbsp; <a href="contact.php" class="big-btn type2">Напиши мне</a> -->
                </div>
            </div>
            <div data-src='<?php echo Yii::app()->theme->baseUrl; ?>/vendor/images/slider/slider_2.jpg' data-link='#' data-thumb='<?php echo Yii::app()->theme->baseUrl; ?>/vendor/images/slider/slider_2-96x41.jpg'>
                <div class="camera_caption fadeIn">
                    <h1><strong>Welcome</strong> to</h1><br>
                    <h1>my Website!</h1>
                </div>
            </div>
        </div>
    </div><!-- .slider -->
</div>