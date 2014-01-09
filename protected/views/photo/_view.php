<?php
/* @var $this PhotoController */
/* @var $data Photo */
?>

<div class="view">

    <div class="imgWrap">

        <?php
        echo CHtml::link(
            Chtml::image($data->thumb, Chtml::encode($data->alt_text), array()), $data->url, array(
            'rel' => 'colorBox',
            'title' => Chtml::encode($data->alt_text))
        );
        ?>
    </div>

    <div class="caption">
        <?php echo CHtml::encode($data->caption); ?>
    </div>

</div>