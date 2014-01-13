<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'photo-grid',
    'dataProvider' => $photos->search(),
    'columns' => array(
        array(
            'name' => 'thumb',
            'type' => 'raw',
            'value' => '$data->thumbnail',
        ),
        'caption',
        'alt_text',
        'tags',
        'sort_order',
        array(
            'name' => 'created_dt',
            'value' => 'Yii::app()->dateFormatter->format("MM/dd/yyyy", strtotime($data->created_dt))',
        ),
        array(
            'name' => 'lastupdate_dt',
            'value' => 'Yii::app()->dateFormatter->format("MM/dd/yyyy", strtotime($data->lastupdate_dt))',
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{update} {delete}',
            'buttons' => array(
                'update' => array(
                    'label' => 'Update',
                    'imageUrl' => Yii::app()->theme->baseUrl . '/images/notes.png',
                    'url' => '$this->grid->controller->createUrl("photo/update", array("id" => $data->id, "asDialog" => 1))',
                    //'click' => 'function(){alert("Update Click"); return false;}',
                    'options' => array(
                        'class' => 'btn-mini',
                    ),
                    'visible' => '!Yii::app()->user->isGuest',
                ),
                'delete' => array(
                    'imageUrl' => Yii::app()->theme->baseUrl . '/images/delete.png',
                    'url' => '$this->grid->controller->createUrl("photo/delete", array("id" => $data->id, "asDialog" => 1))',
                ),
            ),
        ),
    ),
));
?>
