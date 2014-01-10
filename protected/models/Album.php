<?php

/**
 * This is the model class for table "tbl_album".
 *
 * The followings are the available columns in table 'tbl_album':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $category_id
 * @property string $tags
 * @property integer $owner_id
 * @property integer $shareable
 * @property string $created_dt
 *
 * The followings are the available model relations:
 * @property User $owner
 * @property Photo[] $photos
 */
class Album extends CActiveRecord
{

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'tbl_album';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array(
                'category_id, owner_id, shareable',
                'numerical',
                'integerOnly' => true),
            array(
                'name, tags',
                'length',
                'max' => 255),
            array(
                'description',
                'length',
                'max' => 1020),
            array(
                'description',
                'match',
                'pattern' => '/[\w]+/u'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array(
                'id, name, description, category_id, tags, owner_id, shareable, created_dt',
                'safe',
                'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'owner' => array(
                self::BELONGS_TO,
                'User',
                'owner_id'),
            'photos' => array(
                self::HAS_MANY,
                'Photo',
                'album_id'),
        );
    }

    /**
     * Returns the declaration of named scopes.
     * A named scope represents a query criteria that can be chained together with
     * other named scopes and applied to a query. This method should be overridden
     *
     * @return array the scope definition. The array keys are scope names; the array
     * values are the corresponding scope definitions. Each scope definition is represented
     * as an array whose keys must be properties of {@link CDbCriteria}.
     */
    public function scopes()
    {
        return array(
            'shareable' => array(
                'order' => 'created_dt DESC',
                'condition' => 'shareable = 1',
            )
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'category_id' => 'Category',
            'tags' => 'Tags',
            'owner_id' => 'Owner',
            'shareable' => 'Shareable',
            'created_dt' => 'Created Dt',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('name', $this->name, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('tags', $this->tags, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Album the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * This method is invoked before saving a record (after validation, if any).
     * The default implementation raises the {@link onBeforeSave} event.
     * You may override this method to do any preparation work for record saving.
     * Use {@link isNewRecord} to determine whether the saving is
     * for inserting or updating record.
     * Make sure you call the parent implementation so that the event is raised properly.
     * @return boolean whether the saving should be executed. Defaults to true.
     */
    public function beforeSave()
    {
        if(parent::beforeSave()) {
            if($this->isNewRecord) {
                $this->created_dt = new CDbExpression("NOW()");
                $this->owner_id = Yii::app()->user->id;
            }
            return true;
        } else {
            return false;
        }
    }

    public function getUrl()
    {
        if(isset($this->photos) && is_array($this->photos)) {
            foreach($this->photos as $photo) {
                return $photo->url;
            }
        } else {
            return null;
        }
    }

    public function getThumb()
    {
        if(isset($this->photos) && is_array($this->photos)) {
            foreach($this->photos as $photo) {
                return $photo->thumb;
            }
        } else {
            return null;
        }
    }

}
