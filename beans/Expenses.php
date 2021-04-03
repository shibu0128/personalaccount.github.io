<?php

class Expenses {

    private $expid;
    private $expac;
    private $userid;
    private $expcatid;
    private $amount;
    private $trandate;
    private $payby;
    private $remark;


    public function getExpid() {
        return $this->expid;
    }

    public function setExpid($expid) {
        $this->expid = $expid;
    }

    public function getExpac() {
        return $this->expac;
    }

    public function setExpac($expac) {
        $this->expac = $expac;
    }

    public function getTrandate() {
        return $this->trandate;
    }

    public function setTrandate($trandate) {
        $this->trandate = $trandate;
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

    public function getExpcatid() {
        return $this->expcatid;
    }

    public function setExpcatid($expcatid) {
        $this->expcatid = $expcatid;
    }

    public function getPayby() {
        return $this->payby;
    }

    public function setPayby($payby) {
        $this->payby = $payby;
    }

    public function getRemark() {
        return $this->remark;
    }

    public function setRemark($remark) {
        $this->remark = $remark;
    }

}


