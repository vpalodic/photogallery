<?php

class m140110_005919_alter_album_add_description_add_category extends CDbMigration
{

    // Use safeUp/safeDown to do migration with transaction
    public function safeUp()
    {
        // First add the description column
        $this->addColumn('tbl_album',
                         'description',
                         'VARCHAR(1020) NULL AFTER `name`');

        // Now let's add the category_id column
        $this->addColumn('tbl_album',
                         'category_id',
                         'INT(11) NULL AFTER `description`');
    }

    public function safeDown()
    {
        // First get rid of the category_id
        $this->dropColumn('tbl_album',
                          'category_id');

        // Now drop the description column
        $this->dropColumn('tbl_album',
                          'description');
    }

}
