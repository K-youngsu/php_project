<?php

// use LDAP\Result;

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database(); //데이터 베이스
        $this->load->model('Auth_model'); //모델 
        $this->load->library('form_validation');//라이브러리  폼벨리데이션
        $this->load->helper('url'); //리다이렉트
        $this->load->library('session'); //세션
    }

    public function index()
	{
		$this->login_page();
	}
    public function login_page(){
        if( !empty($_SESSION['seq']) ){  //로그인 했을시 세션에 seq가 있을경우
            redirect('/main');
        } else {
            $this->load->view('/pages/main_page'); //로그인 안했을시 
        }
            // $this->load->view('/pages/main_page');  
    }

    public function check_nickname(){
        $flag = 'x';
        $nickname = trim($this->input->post('nickname', TRUE));
        $get_nickname = $this->Auth_model->check_nickname($nickname)->row_array();
        if( empty($get_nickname) ){
            $flag = 'o';
        }
        echo json_encode($flag);
    }

    public function dupl_nickname(){
        $nickname = trim($this->input->post('nickname', TRUE));
        $get_nickname = $this->Auth_model->check_nickname($nickname)->row_array();
        if(empty($get_nickname['seq'])){
            $json['flag'] = 'o';

        }else{
          $json['flag'] = 'x';
        }
        echo json_encode($json);
    }

    public function dupl_id(){
        $id = trim($this->input->post('id', TRUE));
        $get_id = $this->Auth_model->check_id($id)->row_array();
        if(empty($get_id)){
            $flag = 'o';
        }else{
            $flag = 'x';
        }
        echo json_encode($flag);
    }

    public function member_insert(){ //회원가입
      if( empty($_SESSION['seq']) ){
        $nickname = trim($this->input->post('user_nickname', TRUE));  
        $email = trim($this->input->post('user_email', TRUE));
        $id = trim($this->input->post('user_id', TRUE));
        $pwd = trim($this->input->post('user_pwd', TRUE));
        
        $this->form_validation->set_rules('user_nickname','닉네임','required',array('required' => '$s.을 입력해 주세요'));
        $this->form_validation->set_rules('user_email','이메일','required',array('required' => '$s.를 입력해 주세요'));
        $this->form_validation->set_rules('user_id','아이디','required',array('required' => '$s.를 입력해 주세요'));
        $this->form_validation->set_rules('user_pwd','패스워드','required',array('required' => '$s.를 입력해 주세요'));
        
        if($this->form_validation->run()){
          
          $pwd = $this->_crypt($pwd);  // 패스워드 암호화

          $data_arr = array('nickname' => $nickname,
                            'email' => $email,
                            'id' => $id,
                            'pwd' => $pwd );

          $result = $this->Auth_model->member_insert($data_arr);

          if($result){
            $this->error_redirect('회원가입 성공','/main');
          } else{
            $this->error_redirect('회원가입 실패','/main/sign_up_view');
          }
        }
      } else {
        redirect('/main');
      }
    }

    public function login_proc(){  //login

      $id = trim($this->input->post('user_id', TRUE));
      $pwd = trim($this->input->post('user_pwd', TRUE));

      $this->form_validation->set_rules('user_id','아이디','required',array('required' => '$s.를 입력해 주세요'));
      $this->form_validation->set_rules('user_pwd','패스워드','required',array('required' => '$s.를 입력해 주세요'));

      if($this->form_validation->run()){
        $pw = $this->_crypt($pwd);
        $result = $this->Auth_model->login_proc($id)->row_array();
        if( !empty($result)){
          if($result['status'] != 'D'){ //해당 유저의 로그인 정보가 잠금이 아닐경우
            if($result['status'] != 'F'){ //정지상태가 아닐경우
              if($result['pw'] == $pw ){ //db에 저장된 패스워드 와 view에서 넘겨받은 패스워드값 비교 맞을경우
                $ip = $this->input->ip_address(); //현재 ip 주소를 알아낼수 있다
                $this->Auth_model->login_success($id,$ip);// 로그인 실패 카운트 0 으로 초기화 해주기, 마지막 로그인 날짜 최신화 , 로그인된 ip주소 넣어주기
                $this->session->set_userdata('seq', $result['seq']); //세션에 해당 유저의 seq 값을 넣어줌
                $this->error_redirect('로그인 성공','/auth');
              } else{ //패스워드가 틀릴경우
                $this->Auth_model->pwd_fail($id); // loginfail_cnt 증가 시켜주기
                $this->error_redirect('아이디 or 패스워드를 확인해주세요','/main/sign_in_view');
  
                if($result['loginfail_cnt'] > 10){ //로그인 실패 카운트가 10을 넘겼을경우
                  $this->Auth_model->login_failcnt_over($id);//해당유저의 status 값 변경!
                  $this->error_redirect('연속된 로그인을 실패하였습니다.','/main/sign_in_view');
                }
              }
            } else {
              $this->error_redirect('반복된 로그인 실패로인해 계정이 잠겨있습니다. \n 관리자에게 문의해 주세요','/main/sign_in_view');
            }
          } else {
            $this->error_redirect('계정이 정지상태입니다. \n 관리자에게 문의해 주세요','/main/sign_in_view');
          }
        } else {
          $this->Auth_model->pwd_fail($id); // loginfail_cnt 증가 시켜주기
          $this->error_redirect('아이디 or 패스워드를 확인해주세요','/main/sign_in_view');
        }

      }
    }

    public function logout(){
      $this->session->sess_destroy(); //세션 파괴
      $this->error_redirect('로그아웃','/main');
    }

}