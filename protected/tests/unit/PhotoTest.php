<?php

class PhotoTest extends CDbTestCase
{

    public $fixtures = array(
        'photos' => 'Photo',
    );
    private $photo_id;

    public static function setUpBeforeSave()
    {

    }

    public function setup()
    {
        parent::setup();
        $_POST['Photo']['album_id'] = 1;
        $_POST['Photo']['filename'] = "IMG_1234.jpg";
        $_POST['Photo']['caption'] = "This is a photo caption";
        $_POST['Photo']['alt_text'] = "This is some alt text";
        $_POST['Photo']['tags'] = "Tag1,Tag2,Tag3";
        $_POST['Photo']['sort_order'] = 1;
        $_POST['Photo']['id'] = 7;
        $_POST['Photo']['created_dt'] = null;
        $_POST['Photo']['lastupdate_dt'] = null;
    }

    public function testInsert()
    {
        $photo = new Photo;
        $photo->attributes = $_POST['Photo'];
        if($photo->save()) {
            $this->photo_id = $photo->id;
            $this->assertEquals($_POST['Photo'], $photo->attributes);
        }
    }

    public function testBase()
    {
        $photos = Photo::model()->findAll();
        $this->assertEquals(count($photos), 6);

        $ar = array();
        foreach($photos as $t) {
            $p = basename($t->filename, ".jpg");
            $ar[$p] = $t->attributes;
        }
        $this->assertEquals($ar, $this->photos);
    }

    public function tearDown()
    {
        if($this->photo_id) {
            $photo = Photo::model()->findByPk($this->photo_id)->delete();
        }
    }

    public static function tearDownAfterClass()
    {

    }

}
