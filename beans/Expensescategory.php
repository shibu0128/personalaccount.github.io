<?php

class Expensescategory {

    private $expcatid;
    private $expcatname;
    private $expcatdetails;
    private $userid;

    public function getExpcatid() {
        return $this->expcatid;
    }

    public function setExpcatid($expcatid) {
        $this->expcatid = $expcatid;
    }

    public function getExpcatname() {
        return $this->expcatname;
    }

    public function setExpcatname($expcatname) {
        $this->expcatname = $expcatname;
    }

    public function getExpcatdetails() {
        return $this->expcatdetails;
    }

    public function setExpcatdetails($expcatdetails) {
        $this->expcatdetails = $expcatdetails;
    }

    public function getUserid() {
        return $this->userid;
    }

    public function setUserid($userid) {
        $this->userid = $userid;
    }

}
