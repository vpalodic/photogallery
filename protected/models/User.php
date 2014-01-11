<?php

/**
 * This is the model class for table "tbl_user".
 *
 * The followings are the available columns in table 'tbl_user':
 * @property integer $id
 * @property string $email
 * @property string $url
 * @property string $firstname
 * @property string $lastname
 * @property string $password
 * @property integer $status
 * @property string $last_login_time
 * @property string $create_date
 *
 * The followings are the available model relations:
 * @property Album[] $albums
 * @property Comment[] $comments
 */
class User extends CActiveRecord
{

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'tbl_user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('email', 'required'),
            array('status', 'numerical', 'integerOnly' => true),
            array('email, url, firstname, lastname, password', 'length', 'max' => 255),
            array('last_login_time, create_date', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, email, url, firstname, lastname, password, status, last_login_time, create_date', 'safe', 'on' => 'search'),
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
            'albums' => array(self::HAS_MANY, 'Album', 'owner_id'),
            'comments' => array(self::HAS_MANY, 'Comment', 'author_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'email' => 'Email',
            'url' => 'Url',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'password' => 'Password',
            'status' => 'Status',
            'last_login_time' => 'Last Login Time',
            'create_date' => 'Create Date',
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

        $criteria->compare('id', $this->id);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('url', $this->url, true);
        $criteria->compare('firstname', $this->firstname, true);
        $criteria->compare('lastname', $this->lastname, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('status', $this->status);
        $criteria->compare('last_login_time', $this->last_login_time, true);
        $criteria->compare('create_date', $this->create_date, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    /**
     * Returns the full name of the user or Unknown if no name is set.
     * @return string The full name of the user
     */
    public function getFullName()
    {
        if(!empty($this->firstname) && !empty($this->lastname)) {
            return $this->firstname . ' ' . $this->lastname;
        } elseif(!empty($this->firstname)) {
            return $this->firstname;
        } elseif(!empty($this->lastname)) {
            return $this->lastname;
        } else {
            return 'Unknown';
        }
    }

}
