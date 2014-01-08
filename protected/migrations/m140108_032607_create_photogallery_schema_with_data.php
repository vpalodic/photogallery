<?php

class m140108_032607_create_photogallery_schema_with_data extends CDbMigration
{

    public function safeUp()
    {
        // Although MySQL doesn't support transactions when creating a table
        // we will still use the safeUp method to apply the migration
        //
        // First create all of the tables!
        //
        // Create the tag table
        $this->createTable('tbl_tag', array(
            'id' => 'int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY',
            'name' => 'varchar(128) NOT NULL',
            'frequency' => 'int(11) DEFAULT "1"',
            ), 'ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci'
        );

        // Create the option table
        $this->createTable('tbl_option', array(
            'id' => 'int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY',
            'option_name' => 'varchar(64) NOT NULL',
            'option_value' => 'varchar(20) NOT NULL',
            'sort_order' => 'int(11) DEFAULT "1"',
            ), 'ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci AUTO_INCREMENT = 30'
        );

        // Create the user table
        $this->createTable('tbl_user', array(
            'id' => 'int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY',
            'email' => 'varchar(255) NOT NULL',
            'url' => 'varchar(255) DEFAULT NULL',
            'firstname' => 'varchar(255) DEFAULT NULL',
            'lastname' => 'varchar(255) DEFAULT NULL',
            'password' => 'varchar(255) DEFAULT NULL',
            'status' => 'int(3) DEFAULT NULL',
            'last_login_time' => 'datetime DEFAULT NULL',
            'create_date' => 'timestamp NULL DEFAULT CURRENT_TIMESTAMP',
            ), 'ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci AUTO_INCREMENT = 3'
        );

        // Create the album table
        $this->createTable('tbl_album', array(
            'id' => 'int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY',
            'name' => 'varchar(255) DEFAULT NULL',
            'tags' => 'varchar(255) DEFAULT NULL',
            'owner_id' => 'int(11) DEFAULT NULL',
            'shareable' => 'tinyint(3) DEFAULT NULL',
            'created_dt' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
            ), 'ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci AUTO_INCREMENT = 2'
        );

        // Create the photo table
        $this->createTable('tbl_photo', array(
            'id' => 'int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY',
            'album_id' => 'int(11) DEFAULT NULL',
            'filename' => 'varchar(500) DEFAULT NULL',
            'caption' => 'text',
            'alt_text' => 'text',
            'tags' => 'varchar(255) DEFAULT NULL',
            'sort_order' => 'smallint(6) DEFAULT NULL',
            'created_dt' => 'timestamp NULL DEFAULT CURRENT_TIMESTAMP',
            'lastupdate_dt' => 'timestamp NULL DEFAULT NULL',
            ), 'ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci AUTO_INCREMENT = 7'
        );

        // Create the comment table
        $this->createTable('tbl_comment', array(
            'id' => 'int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY',
            'content' => 'text NOT NULL',
            'status' => 'int(11) NOT NULL',
            'author_id' => 'int(11) NOT NULL',
            'photo_id' => 'int(11) NOT NULL',
            'created_dt' => 'timestamp NULL DEFAULT CURRENT_TIMESTAMP',
            ), 'ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci AUTO_INCREMENT = 2'
        );

        // Now let us add all of the indexes!
        //
        // tbl_tag
        // Add an unique index on the name for fast look-ups
        $this->createIndex('name', 'tbl_tag', 'name', true);

        // tbl_option
        // Add an unique index on the name and value fields for fast look-ups
        $this->createIndex('nameidx', 'tbl_option', 'option_name, option_value', true);

        // tbl_user
        // Add an unique index on the email for fast look-ups
        $this->createIndex('email', 'tbl_user', 'email', true);

        // tbl_album
        // Add an index on the owner_id for fast look-ups
        $this->createIndex('owner_id', 'tbl_album', 'owner_id', false);

        // tbl_photo
        // Add an index on the album_id for fast look-ups
        $this->createIndex('album_id', 'tbl_photo', 'album_id', false);

        // tbl_comment
        // Add an index on the author_id for fast look-ups
        $this->createIndex('author_id', 'tbl_comment', 'author_id', false);

        // tbl_comment
        // Add an index on the photo_id for fast look-ups
        $this->createIndex('photo_id', 'tbl_comment', 'photo_id', false);

        // Now let us add the foreign key constraints!
        //
        // tbl_album
        // Add a foreign key to the user table
        // tbl_album.owner_id references tbl_user.id
        $this->addForeignKey('tbl_album_ibfk_1', 'tbl_album', 'owner_id', 'tbl_user', 'id', 'NO ACTION', 'NO ACTION');

        // tbl_photo
        // Add a foreign key to the album table
        // tbl_photo.album_id references tbl_album.id
        $this->addForeignKey('tbl_photo_ibfk_1', 'tbl_photo', 'album_id', 'tbl_album', 'id', 'CASCADE', 'NO ACTION');

        // tbl_comment
        // Add a foreign key to the comment table
        // tbl_comment.author_id references tbl_user.id
        $this->addForeignKey('tbl_comment_ibfk_1', 'tbl_comment', 'author_id', 'tbl_user', 'id');

        // tbl_comment
        // Add a foreign key to the comment table
        // tbl_comment.photo_id references tbl_photo.id
        $this->addForeignKey('tbl_comment_ibfk_2', 'tbl_comment', 'photo_id', 'tbl_photo', 'id');

        // Finally let us add some test data to work with!
        //
        // tbl_option
        $this->insert('tbl_option', array(
            'id' => 1,
            'option_name' => 'PAGESIZE',
            'option_value' => '50',
            'sort_order' => null,
        ));

        $this->insert('tbl_option', array(
            'id' => 2,
            'option_name' => 'PAGE',
            'option_value' => '500',
            'sort_order' => null,
        ));

        // tbl_user
        $this->insert('tbl_user', array(
            'id' => 2,
            'email' => 'admin@photogallery.lan',
            'url' => null,
            'firstname' => 'Admin',
            'lastname' => 'Root',
            'password' => 'c7275c106bbcf51180fa445ebde5a405',
            'status' => 1,
            'last_login_time' => '2013-01-14 15:07:05',
            'create_date' => '2013-01-14 15:06:55',
        ));

        // tbl_album
        $this->insert('tbl_album', array(
            'id' => 1,
            'name' => 'Beaches',
            'tags' => null,
            'owner_id' => 2,
            'shareable' => 1,
            'created_dt' => '2013-02-15 12:43:39',
        ));

        // tbl_photo
        $this->insert('tbl_photo', array(
            'id' => 1,
            'album_id' => 1,
            'filename' => 'IMG_1134.jpg',
            'caption' => 'Pebbles through clear water',
            'alt_text' => '',
            'tags' => null,
            'sort_order' => 1,
            'created_dt' => '2013-02-05 12:27:53',
            'lastupdate_dt' => '2013-02-05 12:27:53',
        ));

        $this->insert('tbl_photo', array(
            'id' => 2,
            'album_id' => 1,
            'filename' => 'IMG_1152.jpg',
            'caption' => 'Going with the flow',
            'alt_text' => '',
            'tags' => null,
            'sort_order' => 2,
            'created_dt' => '2013-02-05 12:25:27',
            'lastupdate_dt' => '2013-02-05 12:27:53',
        ));

        $this->insert('tbl_photo', array(
            'id' => 3,
            'album_id' => 1,
            'filename' => 'IMG_1289.jpg',
            'caption' => 'Calm after the storm',
            'alt_text' => null,
            'tags' => null,
            'sort_order' => 3,
            'created_dt' => '2013-02-04 14:26:35',
            'lastupdate_dt' => '2013-02-05 12:27:53',
        ));

        $this->insert('tbl_photo', array(
            'id' => 4,
            'album_id' => 1,
            'filename' => 'IMG_1291.jpg',
            'caption' => 'Peaceful evening on the beach',
            'alt_text' => null,
            'tags' => null,
            'sort_order' => 4,
            'created_dt' => '2013-02-05 11:28:47',
            'lastupdate_dt' => '2013-02-05 12:27:53',
        ));

        $this->insert('tbl_photo', array(
            'id' => 5,
            'album_id' => 1,
            'filename' => 'IMG_1331.jpg',
            'caption' => 'Sand Waves',
            'alt_text' => null,
            'tags' => null,
            'sort_order' => 5,
            'created_dt' => '2013-02-05 10:15:55',
            'lastupdate_dt' => '2013-02-05 12:27:53',
        ));

        $this->insert('tbl_photo', array(
            'id' => 6,
            'album_id' => 1,
            'filename' => 'IMG_9609.jpg',
            'caption' => 'Rippled sand',
            'alt_text' => '',
            'tags' => null,
            'sort_order' => 6,
            'created_dt' => '2013-01-30 1:29:05',
            'lastupdate_dt' => '2013-02-05 12:27:53',
        ));

        // tbl_comment
        $this->insert('tbl_comment', array(
            'id' => 1,
            'content' => 'This is a test comment.',
            'status' => 2,
            'author_id' => 2,
            'photo_id' => 2,
            'created_dt' => '0000-00-00 00:00:00',
        ));
    }

    public function safeDown()
    {
        // Drop the foreign keys from the tables
        $this->dropForeignKey('tbl_comment_ibfk_2', 'tbl_comment');
        $this->dropForeignKey('tbl_comment_ibfk_1', 'tbl_comment');
        $this->dropForeignKey('tbl_photo_ibfk_1', 'tbl_photo');
        $this->dropForeignKey('tbl_album_ibfk_1', 'tbl_album');

        // Drop any indexes
        $this->dropIndex('photo_id', 'tbl_comment');
        $this->dropIndex('author_id', 'tbl_comment');
        $this->dropIndex('album_id', 'tbl_photo');
        $this->dropIndex('owner_id', 'tbl_album');
        $this->dropIndex('email', 'tbl_user');
        $this->dropIndex('nameidx', 'tbl_option');
        $this->dropIndex('name', 'tbl_tag');

        // Truncate the tables
        $this->truncateTable('tbl_comment');
        $this->truncateTable('tbl_photo');
        $this->truncateTable('tbl_album');
        $this->truncateTable('tbl_user');
        $this->truncateTable('tbl_option');
        $this->truncateTable('tbl_tag');

        // Drop the tables
        $this->dropTable('tbl_comment');
        $this->dropTable('tbl_photo');
        $this->dropTable('tbl_album');
        $this->dropTable('tbl_user');
        $this->dropTable('tbl_option');
        $this->dropTable('tbl_tag');
    }

}
