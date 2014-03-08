<?php
/* @var $this SiteController
 *@var $contactObj Contact
 *@var $model ContactForm
 *@var $form CActiveForm
 */
?>
<div class="container">
    <div class="row">
        <div class="span12">
            <div class="row">
                <div class="span12">
                    <section class="title-section">
                        <h1 class="title-header"><?php echo CHtml::encode($contactObj[0]->partitionContact->title_partition);?></h1>
                        <!-- BEGIN BREADCRUMBS-->
                        <!--
                        <ul class="breadcrumb breadcrumb__t">
                            <li><a href="index.php">Home</a></li>
                            <li class="divider">/</li>
                            <li class="active">Contact</li>
                        </ul>
                        -->
                        <?php if(isset($this->breadcrumbs)):?>
                            <?php $this->widget('zii.widgets.CBreadcrumbs', array(
			                    'links'=>$this->breadcrumbs,
			                    'separator'=>'&nbsp;<li class="divider">/</li>&nbsp;',
			                    'tagName'=>'ul class="breadcrumb breadcrumb__t"',
                                'activeLinkTemplate'=>'<li><a href="{url}">{label}</a></li>',
                                'inactiveLinkTemplate'=>'<li class="active">{label}</li>',
                                'homeLink'=>'<li><a href="'.Yii::app()->homeUrl.'">Главная</a></li>',
		                    )); ?><!-- breadcrumbs -->
                        <?php endif?>
                        <!-- END BREADCRUMBS -->
                    </section><!-- .title-section -->
                </div>
            </div>
            <div class="row">
                <div class="span12" id="content">

                    <div id="post-14" class="page">
                        <div class="row">
                            <div class="span12">
                                <div class="google-map">
                                    <?php echo $contactObj[0]->map_contact;?>
                                </div>
                            </div>
                            <div class="span4">
                                <h2><?php echo CHtml::encode($contactObj[0]->titletxt_contact);?></h2>
                                <span><?php echo $contactObj[0]->text_contact; ?></span>
                                <br />
                                <address>
                                    <strong><?php echo CHtml::encode($contactObj[0]->fio_contact);?><br />
                                        <?php echo CHtml::encode($contactObj[0]->adres_contact);?>.</strong><br />
                                    Телефон: <?php echo CHtml::encode($contactObj[0]->telephone_contact);?><br />
                                    E-mail: <a href="mailto:<?php echo CHtml::encode($contactObj[0]->email_contact);?>"><?php echo CHtml::encode($contactObj[0]->email_contact);?></a><br />
                                </address>
                                <!-- address (end) -->
                                </p>
                            </div>
                            <div class="span8">
                                <h2>Обратная связь</h2>
                                    <div class="wpcf7">



                                        <?php $form=$this->beginWidget('CActiveForm', array(
                                            'id'=>'contact-form',
                                            'htmlOptions'=>array('class'=>'wpcf7-form'),
                                            'enableClientValidation'=>false,
                                            'clientOptions'=>array(
                                                'validateOnSubmit'=>true,
                                            ),
                                        )); ?>

                                        <?php if(Yii::app()->user->hasFlash('contact')):?>
                                           <div class="wpcf7-response-output wpcf7-display-none wpcf7-mail-sent-ok" style="display: block;">
                                                <?php echo Yii::app()->user->getFlash('contact'); ?>
                                           </div>
                                        <?php endif; ?>

                                        <?php if(strlen($form->errorSummary($model))!=0): ?>
                                            <div class="wpcf7-response-output wpcf7-display-none wpcf7-validation-errors" style="display: block;">Ошибка валидации. Пожалуйста заполните все поля и отправте заново сообщение.</div>
                                            <!--<div class="wpcf7-response-output"><?php echo $form->errorSummary($model);?></div> -->
                                        <?php endif; ?>

                                        <div class="row-fluid">
                                            <p class="span4 field">
                                                <span class="wpcf7-form-control-wrap">
                                                    <?php //echo $form->labelEx($model,'email'); ?>
                                                    <?php echo $form->textField($model,'name', array('placeholder'=>'Имя:','class'=>'wpcf7-form-control wpcf7-text')); ?>
                                                    <?php //echo $form->error($model,'name'); ?>
                                                </span>
                                            </p>

                                            <p class="span4 field">
                                                <span class="wpcf7-form-control-wrap">
                                                    <?php //echo $form->labelEx($model,'email'); ?>
                                                    <?php echo $form->textField($model,'email', array('size'=>60, 'placeholder'=>'E-mail:','class'=>'wpcf7-form-control wpcf7-text wpcf7-email')); ?>
                                                    <?php //echo $form->error($model,'email'); ?>
                                                </span>
                                            </p>

                                            <p class="span4 field">
                                                <span class="wpcf7-form-control-wrap">
                                                    <?php //echo $form->labelEx($model,'subject'); ?>
                                                    <?php echo $form->textField($model,'subject',array('placeholder'=>'Телефон:','class'=>'wpcf7-form-control wpcf7-text')); ?>
                                                    <?php //echo $form->error($model,'subject'); ?>
                                                </span>
                                            </p>
                                        </div>

                                        <p class="field">
                                            <span class="wpcf7-form-control-wrap">
                                                <?php //echo $form->labelEx($model,'body'); ?>
                                                <?php echo $form->textArea($model,'body',array('placeholder'=>'Сообщение:','rows'=>10, 'cols'=>40, 'class'=>'wpcf7-form-control wpcf7-textarea wpcf7-use-title-as-watermark')); ?>
                                                <?php //echo $form->error($model,'body'); ?>
                                            </span>
                                        </p>

                                        <!--
                                        <?php if(CCaptcha::checkRequirements()): ?>
                                            <div class="row">
                                                <?php echo $form->labelEx($model,'verifyCode'); ?>
                                                <div>
                                                    <?php $this->widget('CCaptcha'); ?>
                                                    <?php echo $form->textField($model,'verifyCode'); ?>
                                                </div>
                                                <div class="hint">Please enter the letters as they are shown in the image above.
                                                    <br/>Letters are not case-sensitive.</div>
                                                <?php echo $form->error($model,'verifyCode'); ?>
                                            </div>
                                        <?php endif; ?>


                                        <div class="row buttons">
                                            <?php echo CHtml::submitButton('Submit',array('class'=>'wpcf7-form-control wpcf7-submit btn btn-primary')); ?>
                                        </div>
                                        -->

                                        <p class="submit-wrap">
                                            <input type="reset" value="Очистить" class="btn btn-primary" />
                                            <?php echo CHtml::submitButton('Отправить',array('class'=>'wpcf7-form-control wpcf7-submit btn btn-primary')); ?>

                                        </p>



                                        <?php $this->endWidget(); ?>

                                    </div><!-- form -->

                            </div>
                        </div> <!-- .row (end) -->
                        <!--.pagination-->
                    </div><!--#post-->

                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>