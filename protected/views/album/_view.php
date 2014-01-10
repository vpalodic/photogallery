<?php
/* @var $this AlbumController */
/* @var $data Album */
?>

<div class="view">

<h2><?php echo CHtml::encode($data->name); ?></h2>
    <div class="imgWrap">
        <?php
        if(isset($data->thumb)) {
            echo CHtml::link(
            Chtml::image($data->thumb, '', array()), $this->createUrl('view', array('id'=>$data->id)), array(
            'rel' => 'colorBox',
            'title' => Chtml::encode($data->name))
	        );
        } else {
            echo CHtml::link(
            'No photos availble', $this->createUrl('view', array('id'=>$data->id)), array(
            'title' => Chtml::encode($data->name))
	        );        	
        }
        ?>
    </div>
</div>