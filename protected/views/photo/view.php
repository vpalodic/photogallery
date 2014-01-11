<?php
/* @var $this PhotoController */
/* @var $model Photo */
if($this instanceof PhotoController) {
$this->breadcrumbs=array(
	'Photos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Photo', 'url'=>array('index')),
	array('label'=>'Create Photo', 'url'=>array('create')),
	array('label'=>'Update Photo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Photo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Photo', 'url'=>array('admin')),
);
}
?>

<h1>View Photo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'album_id',
		'filename',
		'caption',
		'alt_text',
		'tags',
		'sort_order',
		'created_dt',
		'lastupdate_dt',
	),
)); ?>
