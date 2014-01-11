<?php

class UserTest extends MyTestCase
{

    private function getFullName($userid)
    {
        $user = User::model()->findByPk($userid);
        return $user->fullName;
    }

    public function testFullName()
    {
        $this->assertEquals('Admin Root', $this->getFullName(2));
        $this->assertEquals('Fred', $this->getFullName(3));
        $this->assertEquals('Smith', $this->getFullName(4));
        $this->assertEquals('Unknown', $this->getFullName(5));
    }

    public function testSearch()
    {
        $users = $this->getTableArray('Select * from tbl_user where email like "%user%"', 'email');
        $mUser = new User('Search');
        $mUser->email = 'user';
        $mUserData = $mUser->search()->getData();
        $mUsers = $this->getModelArray($mUserData, 'email');

        $this->assertEquals($users, $mUsers);
    }

}
