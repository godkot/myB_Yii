<?php
/* @var $this SiteController
 *@var $mainTextObj Text
 *@var $skillsObj Skills
 */
?>
<div class="container">
    <div class="row">
        <div class="span12">
            <div class="row">
                <div class="span12">
                    <div class="page">
                        <div class="row">
                            <div class="content_plane">
                                <?php
                                    if(!empty($mainTextObj)){
                                        for($i=0;$i<3;$i++){
                                            ?>
                                                <div class="span4">
                                                    <figure class="alignleft">
                                                        <?php echo CHtml::image(Yii::app()->theme->baseUrl.'/vendor/'.$mainTextObj[$i]->img_text,$mainTextObj[$i]->title_text);?>
                                                    </figure>
                                                    <div class="extra-wrap">
                                                        <h2><strong><?php echo $mainTextObj[$i]->title_text; ?></strong></h2>
                                                        <span>
                                                            <?php echo $mainTextObj[$i]->anons_text;
                                                            //if(!empty($mainTextObj[0]->uri_text)) echo('<a class="alignright" href="'.$mainTextObj[0]->uri_text.'" title="Подробнее обо мне">подробнее</a>')
                                                            ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            <?php
                                        }
                                    }
                                ?>
                                <div class="clear"></div>
                            </div><!-- .content_plane (end) -->
                        </div> <!-- .row (end) -->
                        <div class="spacer"><!-- .spacer (end) --></div>
                        <div class="row">
                            <div class="span6"><h2><?php echo $mainTextObj[3]->title_text; ?></h2>
                                <span><?php echo $mainTextObj[3]->anons_text; ?></span>

                            </div>
                            <?php
                            if(!empty($skillsObj)){
                                for($i=0;$i<count($skillsObj);$i++){
                                    if($i==0) echo '<div class="span6"><h2>Мои навыки</h2>';
                                    ?>
                                        <h4><em><?php echo $skillsObj[$i]->title_skills.' - '.$skillsObj[$i]->value_skills.'%';?></em></h4>
                                        <div class="progress progress-info"><div class="bar" style="width: <?php echo $skillsObj[$i]->value_skills.'%';?>;"></div></div><!-- .progressbar (end) -->
                                    <?php
                                    if($i==count($skillsObj)) echo "</div>";
                                }
                            }
                            ?>
                        </div> <!-- .row (end) -->
                        <div class="spacer"><!-- .spacer (end) --></div>

                        <?php
                        $this->widget('application.components.ClientsWidget',array('col'=>4));
                        ?>

                        <!--.pagination-->
                    </div><!--#post-->
                </div>
            </div>
        </div>
    </div>
</div>
</div>