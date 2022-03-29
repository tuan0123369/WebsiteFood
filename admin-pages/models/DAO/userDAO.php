<?php

include_once '../database/config.php';
include_once '../models/DTO/userDTO.php';

class userDAO
{
    public function getAllUser()
    {
        $dbConn = new configuration();
        $query = 'select * from user';
        $param = array();
        $users = $dbConn->getData($query, $param);
        $users_data = [];
        foreach ($users as $data) {
            $user_data[] = new userDTO($data['id'], $data['email'], $data['password'], $data['user_name'], $data['img'], $data['phone'], $data['address'], $data['administrator']);
        }
        return $user_data;
    }

    public function createUser($email, $password, $user_name, $img, $phone, $address, $admin)
    {
        $dbConn = new configuration();
        $passwd = md5($password);
        if ($admin != '') {
            $admin = 1;
        } else $admin = 0;
        if ($img == '') {
            $query = 'INSERT INTO user(email, password, user_name, phone, address, administrator) VALUES  (:email,:pass,:user_name,:phone,:address,:administrator)';
            $param = array(':email' => $email, ':pass' => $passwd, ':user_name' => $user_name, ':phone' => $phone, ':address' => $address, ':administrator' => $admin);
        } else {
            $query = 'INSERT INTO user(email, password, user_name, img, phone, address, administrator) VALUES  (:email,:pass,:user_name,:img,:phone,:address,:administrator)';
            $param = array(':email' => $email, ':pass' => $passwd, ':user_name' => $user_name, ':img' => $img, ':phone' => $phone, ':address' => $address, ':administrator' => $admin);
        }
        $message = $dbConn->insertData($query, $param);
        return $message;
    }

    public function getUser($email, $password)
    {
        $dbConn = new configuration();
        $passwd = md5($password);
        $query = 'select * from user where email=:email and password=:password';
        $param = array(':email' => $email, ':password' => $passwd);
        $user = $dbConn->getData($query, $param);
        foreach ($user as $data) {
            $user_data = new userDTO($data['id'], $data['email'], $data['password'], $data['user_name'], $data['img'], $data['phone'], $data['address'], $data['administrator']);
            return $user_data;
        }
    }

    public function getUserProfile($user_id)
    {
        $dbConn = new configuration();
        $query = 'select * from user where id=:id_user';
        $param = array(':id_user' => $user_id);
        $user = $dbConn->getData($query, $param);
        foreach ($user as $data) {
            $user_data = new userDTO($data['id'], $data['email'], $data['password'], $data['user_name'], $data['img'], $data['phone'], $data['address'], $data['administrator']);
            return $user_data;
        }
    }

    public function editUser($user_id, $user_name, $img, $phone, $address, $admin)
    {
        $dbConn = new configuration();
        if ($admin != '') {
            $admin = 1;
        } else $admin = 0;
        if ($img == '') {
            $query = 'UPDATE user SET  user_name=:user_name,phone=:phone,address=:address,administrator=:administrator WHERE id=:user_id';
            $param = array(':user_name' => $user_name, ':phone' => $phone, ':address' => $address, ':user_id' => $user_id, ':administrator' => $admin);
        } else {
            $query = 'UPDATE user SET  user_name=:user_name,img=:img,phone=:phone,address=:address,administrator=:administrator WHERE id=:user_id';
            $param = array(':user_name' => $user_name, ':img' => $img, ':phone' => $phone, ':address' => $address, ':user_id' => $user_id, ':administrator' => $admin);
        }
        $dbConn->updateData($query, $param);
    }

    public function editpasswd($user_id, $pass)
    {
        $dbConn = new configuration();
        $passwd = md5($pass);
        $query = 'UPDATE user SET password=:pass WHERE id=:user_id';
        $param = array(':pass' => $passwd, ':user_id' => $user_id);
        $dbConn->updateData($query, $param);
    }

    public function delUser($id)
    {
        $dbConn = new configuration();
        $query = 'DELETE FROM user WHERE id=:id';
        $param = array(':id' => $id);
        $dbConn->deleteData($query, $param);
    }
}
