<?php
/* @var $this ContactController */
/* @var $model Contact */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-contact-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'partition_contact'); ?>
		<?php echo $form->textField($model,'partition_contact'); ?>
		<?php echo $form->error($model,'partition_contact'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title_contact'); ?>
		<?php echo $form->textField($model,'title_contact'); ?>
		<?php echo $form->error($model,'title_contact'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'titletxt_contact'); ?>
		<?php echo $form->textField($model,'titletxt_contact'); ?>
		<?php echo $form->error($model,'titletxt_contact'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'text_contact'); ?>
		<?php echo $form->textField($model,'text_contact'); ?>
		<?php echo $form->error($model,'text_contact'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'img_contact'); ?>
		<?php echo $form->textField($model,'img_contact'); ?>
		<?php echo $form->error($model,'img_contact'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'map_contact'); ?>
		<?php echo $form->textField($model,'map_contact'); ?>
		<?php echo $form->error($model,'map_contact'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'company_contact'); ?>
		<?php echo $form->textField($model,'company_contact'); ?>
		<?php echo $form->error($model,'company_contact'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fio_contact'); ?>
		<?php echo $form->textField($model,'fio_contact'); ?>
		<?php echo $form->error($model,'fio_contact'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'adres_contact'); ?>
		<?php echo $form->textField($model,'adres_contact'); ?>
		<?php echo $form->error($model,'adres_contact'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telephone_contact'); ?>
		<?php echo $form->textField($model,'telephone_contact'); ?>
		<?php echo $form->error($model,'telephone_contact'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_contact'); ?>
		<?php echo $form->textField($model,'email_contact'); ?>
		<?php echo $form->error($model,'email_contact'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'countview_contact'); ?>
		<?php echo $form->textField($model,'countview_contact'); ?>
		<?php echo $form->error($model,'countview_contact'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tags_contact'); ?>
		<?php echo $form->textField($model,'tags_contact'); ?>
		<?php echo $form->error($model,'tags_contact'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'uri_contact'); ?>
		<?php echo $form->textField($model,'uri_contact'); ?>
		<?php echo $form->error($model,'uri_contact'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'seotitle_contact'); ?>
		<?php echo $form->textField($model,'seotitle_contact'); ?>
		<?php echo $form->error($model,'seotitle_contact'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'seokeywords_contact'); ?>
		<?php echo $form->textField($model,'seokeywords_contact'); ?>
		<?php echo $form->error($model,'seokeywords_contact'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'seodesc_contact'); ?>
		<?php echo $form->textField($model,'seodesc_contact'); ?>
		<?php echo $form->error($model,'seodesc_contact'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->