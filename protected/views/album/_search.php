<?php
/* @var $this AlbumController */
/* @var $model Album */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'action' => Yii::app()->createUrl($this->route),
        'method' => 'get',
    ));
    ?>

    <div class="row">
        <?php echo $form->label($model, 'name'); ?>
        <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'tags'); ?>
        <?php echo $form->textField($model, 'tags', array('size' => 60, 'maxlength' => 255)); ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'shareable'); ?>
        <?php
        echo $form->dropDownList($model, 'shareable', array(0 => 'No', 1 => 'Yes',), array('prompt' => 'Select filter'));
        ?>
    </div>

    <div class="row">
        <?php echo $form->label($model, 'created_dt'); ?>
        <?php echo $form->dateField($model, 'created_dt'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Search'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->