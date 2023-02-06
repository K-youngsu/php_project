<?php
defined('BASEPATH') OR exit('NO direct script access allowed');

Class Auth_model extends CI_Model {
  function __construct() {
    parent::__construct();
  }

  public function check_nickname($nickname){
    $sql = " SELECT tm.seq
             FROM tbl_member tm
             WHERE tm.nickname = '".$this->db->escape_str($nickname)."'  ";
    return $this->db->query($sql);
  }

  public function check_id($id){
    $sql = "SELECT tm.seq
            FROM tbl_member tm
            WHERE tm.id = '".$this->db->escape_str($id)."' ";

    return $this->db->query($sql);
  }

  public function member_insert($arr){
    $sql = "INSERT INTO tbl_member(nickname, email, id, pw)
            VALUES('".$this->db->escape_str($arr['nickname'])."','".$this->db->escape_str($arr['email'])."'
                   ,'".$this->db->escape_str($arr['id'])."','".$this->db->escape_str($arr['pwd'])."')";

    return $this->db->query($sql);
  }

  public function login_proc($id){
    $sql = "SELECT tm.seq,
                   tm.id,
                   tm.pw,
                   tm.email,
                   tm.nickname,
                   tm.status,
                   tm.loginfail_cnt
            FROM tbl_member tm
            WHERE tm.id = '".$this->db->escape_str($id)."'
                    AND tm.status <> 'D' ";

    return $this->db->query($sql);
  }
  
  public function pwd_fail($id){
    $sql = "UPDATE tbl_member 
            SET loginfail_cnt = loginfail_cnt + 1 
            WHERE id = '".$this->db->escape_str($id)."' ";

    return $this->db->query($sql);
  }

  public function login_failcnt_over($id){
    $sql = "UPDATE tbl_member
            SET status = 'F' 
            WHERE id = '".$this->db->escape_str($id)."'";
    
    return $this->db->query($sql);
  }

  public function login_success($id,$ip){
    $sql = "UPDATE tbl_member
            SET loginfail_cnt = 0,
                lastlogdt = NOW(),
                lastlogip = '".$this->db->escape_str($ip)."'
            WHERE id = '".$this->db->escape_str($id)."'";

    return $this->db->query($sql);
  }
}