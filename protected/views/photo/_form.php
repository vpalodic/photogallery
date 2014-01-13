<?php
/* @var $this PhotoController */
/* @var $model Photo */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'photo-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="block">
        <div class="row">
            <?php echo $model->thumbnail; ?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model, 'tags'); ?>
            <?php echo $form->textField($model, 'tags', array('size' => 50, 'maxlength' => 255)); ?>
            <?php echo $form->error($model, 'tags'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'sort_order'); ?>
            <?php echo $form->textField($model, 'sort_order'); ?>
            <?php echo $form->error($model, 'sort_order'); ?>
        </div>
    </div>
    <div class="block">
        <div class="row">
            <?php echo $form->labelEx($model, 'caption'); ?>
            <?php echo $form->textArea($model, 'caption', array('rows' => 6, 'cols' => 50)); ?>
            <?php echo $form->error($model, 'caption'); ?>
        </div>
        <div class="row">
            <?php echo $form->labelEx($model, 'alt_text'); ?>
            <?php echo $form->textArea($model, 'alt_text', array('rows' => 6, 'cols' => 50)); ?>
            <?php echo $form->error($model, 'alt_text'); ?>
        </div>
    </div>
    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->