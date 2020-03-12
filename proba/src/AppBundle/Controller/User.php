<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class User
{
    protected $id;
    protected $username;
    protected $email;
    protected $password;

    public function getId()
    {
        return $this->Id;
    }


    public function getUserName()
    {
        return $this->username;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function getPassword()
    {
        return $this->password;
    }


    public function setId($id)
    {
        $this->task = $id;
    }


    public function setUserName($username)
    {
        $this->task = $username;
    }


    public function setEmail($email)
    {
        $this->task = $email;
    }


    public function setPassword($password)
    {
        $this->task = $password;
    }
}
