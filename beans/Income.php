<?php

class Income {

    private $incid;
    private $incac;
    private $inccatid;
    private $amount;
    private $userid;
    private $trandate;
    private $recieveby;
    private $remark;

    public function getIncid() {
        return $this->incid;
    }

    public function setIncid($incid) {
        $this->incid = $incid;
    }

    public function getIncac() {
        return $this->incac;
    }

    public function setIncac($incac) {
        $this->incac = $incac;
    }

    public function getInccatid() {
        return $this->inccatid;
    }

    public function setInccatid($inccatid) {
        $this->inccatid = $inccatid;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function setAmount($amount) {
        $this->amount = $amount;
    }

    public function getUserid() {
        return $this->userid;
    }

    public function setUserid($userid) {
        $this->userid = $userid;
    }

    public function getTrandate() {
        return $this->trandate;
    }

    public function setTrandate($trandate) {
        $this->trandate = $trandate;
    }

    public function getRecieveby() {
        return $this->recieveby;
    }

    public function setRecieveby($recieveby) {
        $this->recieveby = $recieveby;
    }

    public function getRemark() {
        return $this->remark;
    }

    public function setRemark($remark) {
        $this->remark = $remark;
    }

}
