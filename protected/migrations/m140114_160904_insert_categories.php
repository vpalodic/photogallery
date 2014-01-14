<?php

class m140114_160904_insert_categories extends CDbMigration
{

    public function safeUp()
    {
        $this->insert('tbl_option', array(
            'option_name' => 'CATEGORY',
            'option_value' => 'Aeriel',
            'sort_order' => 1,
        ));

        $this->insert('tbl_option', array(
            'option_name' => 'CATEGORY',
            'option_value' => 'Astro-Photography',
            'sort_order' => 2,
        ));

        $this->insert('tbl_option', array(
            'option_name' => 'CATEGORY',
            'option_value' => 'B&W',
            'sort_order' => 3,
        ));

        $this->insert('tbl_option', array(
            'option_name' => 'CATEGORY',
            'option_value' => 'Environmental',
            'sort_order' => 4,
        ));

        $this->insert('tbl_option', array(
            'option_name' => 'CATEGORY',
            'option_value' => 'Fashion',
            'sort_order' => 5,
        ));

        $this->insert('tbl_option', array(
            'option_name' => 'CATEGORY',
            'option_value' => 'Flash',
            'sort_order' => 6,
        ));

        $this->insert('tbl_option', array(
            'option_name' => 'CATEGORY',
            'option_value' => 'Landscape',
            'sort_order' => 7,
        ));

        $this->insert('tbl_option', array(
            'option_name' => 'CATEGORY',
            'option_value' => 'Nature',
            'sort_order' => 8,
        ));

        $this->insert('tbl_option', array(
            'option_name' => 'CATEGORY',
            'option_value' => 'Photo-Journalism',
            'sort_order' => 9,
        ));

        $this->insert('tbl_option', array(
            'option_name' => 'CATEGORY',
            'option_value' => 'Social-Documentary',
            'sort_order' => 10,
        ));

        $this->insert('tbl_option', array(
            'option_name' => 'CATEGORY',
            'option_value' => 'Stock Photography',
            'sort_order' => 11,
        ));

        $this->insert('tbl_option', array(
            'option_name' => 'CATEGORY',
            'option_value' => 'Wedding',
            'sort_order' => 12,
        ));
    }

    public function safeDown()
    {
        $this->delete('tbl_option', 'option_name = "CATEGORY" AND option_value = "Aeriel"');
        $this->delete('tbl_option', 'option_name = "CATEGORY" AND option_value = "Astro-Photography"');
        $this->delete('tbl_option', 'option_name = "CATEGORY" AND option_value = "B&W"');
        $this->delete('tbl_option', 'option_name = "CATEGORY" AND option_value = "Environmental"');
        $this->delete('tbl_option', 'option_name = "CATEGORY" AND option_value = "Fashion"');
        $this->delete('tbl_option', 'option_name = "CATEGORY" AND option_value = "Flash"');
        $this->delete('tbl_option', 'option_name = "CATEGORY" AND option_value = "Landscape"');
        $this->delete('tbl_option', 'option_name = "CATEGORY" AND option_value = "Nature"');
        $this->delete('tbl_option', 'option_name = "CATEGORY" AND option_value = "Photo-Journalism"');
        $this->delete('tbl_option', 'option_name = "CATEGORY" AND option_value = "Social-Documentary"');
        $this->delete('tbl_option', 'option_name = "CATEGORY" AND option_value = "Stock Photography"');
        $this->delete('tbl_option', 'option_name = "CATEGORY" AND option_value = "Wedding"');
    }

}
