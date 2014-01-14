<?php

class m140113_182912_add_user_role_column extends CDbMigration
{

    // Use safeUp/safeDown to do migration with transaction
    public function safeUp()
    {
        // Add the role column
        $this->addColumn('tbl_user', 'role', 'TINYINT(3) DEFAULT 0 NULL AFTER `status`');

        // Update the current users
        $this->update('tbl_user', array('role' => 5));
    }

    public function safeDown()
    {
        // Get rid of the role column
        $this->dropColumn('tbl_user', 'role');
    }

}
