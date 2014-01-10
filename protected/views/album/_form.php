<?php
/* @var $this AlbumController */
/* @var $model Album */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm',
                               array(
        'id' => 'album-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => true,
    ));
    ?>

    <?php
    foreach(Yii::app()->user->getFlashes() as $type => $flash) {
        echo "<div class='{$type}'>{$flash}</div>";
    }
    ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php
        echo $form->labelEx($model,
                            'name');
        ?>
        <?php
        echo $form->textField($model,
                              'name',
                              array(
            'size' => 60,
            'maxlength' => 255));
        ?>
        <?php
        echo $form->error($model,
                          'name');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model,
                            'tags');
        ?>
        <?php
        echo $form->textField($model,
                              'tags',
                              array(
            'size' => 60,
            'maxlength' => 255));
        ?>
        <?php
        echo $form->error($model,
                          'tags');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model,
                            'description');
        ?>
        <?php
        echo $form->textArea($model,
                             'description',
                             array(
            'cols' => 60,
            'rows' => 12));
        ?>
        <?php
        echo $form->error($model,
                          'name');
        ?>
    </div>

    <div class="row">
        <?php
        echo $form->labelEx($model,
                            'shareable');
        ?>
        <?php
        echo $form->checkBox($model,
                             'shareable');
        ?>
        <?php
        echo $form->error($model,
                          'shareable');
        ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->