<?php
class Instructor
{
    private $id = null;
    private $fname = null;
    private $lname = null;
    private $dob = null;
    private $email = null;
    private $password = null;
    private $nic = null;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setFname($fname)
    {
        $this->fname = $fname;
    }

    public function setNic($nic)
    {
        $this->nic = $nic;
    }

    public function setLname($lname)
    {
        $this->lname = $lname;
    }

    public function setDob($dob)
    {
        $this->dob = $dob;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getFname()
    {
        return $this->fname;
    }

    public function getLname()
    {
        return $this->lname;
    }

    public function getDob()
    {
        return $this->dob;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getNic()
    {
        return $this->nic;
    }
}
