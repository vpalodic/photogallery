<?php
/* @var $this AlbumController */
/* @var $model Album */

$this->breadcrumbs = array(
    'Albums' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Album', 'url' => array('index')),
    array('label' => 'Create Album', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#album-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Albums</h1>

<div class="buttons">
    <?php echo CHtml::link('Advanced Search', '#', array('class' => 'btn btn-primary ')); ?>
    <?php echo CHtml::link('New Album', 'create', array('class' => 'btn btn-success right')); ?>
</div>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'album-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'name',
        'tags',
        array(
            'name' => 'shareable',
            'value' => '($data->shareable) ? \'Yes\' : \'No\'',
        ),
        array(
            'name' => 'created_dt',
            'value' => 'Yii::app()->dateFormatter->format("MM/dd/yyyy", strtotime($data->created_dt))',
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{update} {delete}',
            'buttons' => array(
                'update' => array(
                    'label' => 'Update',
                    'imageUrl' => Yii::app()->theme->baseUrl . '/images/notes.png',
                    'url' => '$this->grid->controller->createUrl("update", array("id" => $data->id, "asDialog" => 1))',
                    //'click' => 'function(){alert("Update Click"); return false;}',
                    'options' => array(
                        'class' => 'btn-mini',
                    ),
                    'visible' => '!Yii::app()->user->isGuest',
                ),
                'delete' => array(
                    'imageUrl' => Yii::app()->theme->baseUrl . '/images/delete.png',
                ),
            ),
        ),
    ),
));
?>
