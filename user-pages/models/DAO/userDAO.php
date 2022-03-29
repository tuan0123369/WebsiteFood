<?php

include_once '../database/config.php';
include_once '../models/DTO/userDTO.php';

class userDAO
{
    public function createUser($email, $password)
    {
        $dbConn = new configuration();
        $passwd = md5($password);
        $query = 'insert into user(email,password) values (:email,:pass)';
        $param = array(':email' => $email, ':pass' => $passwd);
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

    public function editUser($user_id, $user_name, $img, $phone, $address)
    {
        $dbConn = new configuration();
        if ($img == '') {
            $query = 'UPDATE user SET  user_name=:user_name,phone=:phone,address=:address WHERE id=:user_id';
            $param = array(':user_name' => $user_name, ':phone' => $phone, ':address' => $address, ':user_id' => $user_id);
        } else {
            $query = 'UPDATE user SET  user_name=:user_name,img=:img,phone=:phone,address=:address WHERE id=:user_id';
            $param = array(':user_name' => $user_name, ':img' => $img, ':phone' => $phone, ':address' => $address, ':user_id' => $user_id);
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
}
