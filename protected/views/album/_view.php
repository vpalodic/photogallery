<?php
/* @var $this AlbumController */
/* @var $data Album */
?>

<div class="view">

    <h2><?php echo CHtml::encode($data->name); ?></h2>
    <p><?php if($data->categories) echo "(" . CHtml::encode($data->categories->option_value) . ")"; ?></p>
    <div class="imgWrap">
        <?php
        if(isset($data->thumb)) {
            echo CHtml::link(
                    Chtml::image($data->thumb, '', array()), $this->createUrl('view', array('id' => $data->id)), array(
                'rel' => 'colorBox',
                'title' => Chtml::encode($data->name))
            );
        } else {
            echo CHtml::link(
                    'No photos availble', $this->createUrl('view', array('id' => $data->id)), array(
                'title' => Chtml::encode($data->name))
            );
        }
        ?>
    </div>
    <div class="imgIcons">
        <?php
        echo "<span class='textIcon'>{$data->photoCount}</span>";
        ?>
    </div>
    <div class="nav">
        <?php
        echo implode(' ', $data->tagLinks);
        ?>
    </div>
</div>