<?php
/* @var $this PhotoController */
/* @var $data Photo */
?>

<div class="view">

    <div class="imgWrap">

        <?php
        echo CHtml::link(
                Chtml::image('uploads/thumbs/' . $data->filename,
                             Chtml::encode($data->alt_text),
                                           array()),
                                           'uploads/' . $data->filename,
                                           array(
            'rel' => 'colorBox',
            'title' => Chtml::encode($data->alt_text))
        );
        ?>
    </div>

</div>