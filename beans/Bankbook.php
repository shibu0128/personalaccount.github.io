<?php

class Bankbook {

    private $acid;
    private $account;
    private $tran_date;
    private $amount;
    private $userid;
    private $operation;

    public function getAcid() {
        return $this->acid;
    }

    public function setAcid($acid) {
        $this->acid = $acid;
    }

    public function getAccount() {
        return $this->account;
    }

    public function setAcccount($account) {
        $this->account = $account;
    }

    public function getTrandate() {
        return $this->tran_date;
    }

    public function setTrandate($tran_date) {
        $this->tran_date = $tran_date;
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

    public function getOperation() {
        return $this->operation;
    }

    public function setOperation($operation) {
        $this->operation = $operation;
    }

}
