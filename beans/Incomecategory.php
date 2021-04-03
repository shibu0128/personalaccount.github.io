<?php

class Incomecategory {

    private $inccatid;
    private $inccatname;
    private $inccatdetails;
    private $userid;

    public function getInccatid() {
        return $this->inccatid;
    }

    public function setInccatid($inccatid) {
        $this->inccatid = $inccatid;
    }

    public function getInccatname() {
        return $this->inccatname;
    }

    public function setInccatname($inccatname) {
        $this->inccatname = $inccatname;
    }

    public function getInccatdetails() {
        return $this->inccatdetails;
    }

    public function setInccatdetails($inccatdetails) {
        $this->inccatdetails = $inccatdetails;
    }

    public function getUserid() {
        return $this->userid;
    }

    public function setUserid($userid) {
        $this->userid = $userid;
    }

}
