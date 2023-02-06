<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

  public function __construct() {
    define('__upload_dir', str_replace(DIRECTORY_SEPARATOR, '/', realpath('.').DIRECTORY_SEPARATOR.'assets')); // 파일 첫 경로 이걸로 계속 바꿀수 있다
    // define('__delete_dir', str_replace(DIRECTORY_SEPARATOR, '/', realpath('.').DIRECTORY_SEPARATOR)); // 파일 삭제
    define('__apply_dir', str_replace(DIRECTORY_SEPARATOR, '/', realpath('.').DIRECTORY_SEPARATOR.'apply_file'));
    parent::__construct();
    $this->clear_cache();
    $this->load->library('pagination');
    $this->load->library( 'email');
    $this->load->library('user_agent');
    $this->load->library('session');
    $this->session->gc_probability = 100;
    $this->load->database();
    $this->load->helper('array');
    $this->load->helper('url');
    $this->load->helper('cookie');
  }

  function clear_cache() {
    $this->output->set_header('Cache-Control: no cache');
  }

  //도메인 체크 reffer 체크(외부요청 차단)
  function check_reffer() {
    if( parse_url($this->agent->referrer(), PHP_URL_HOST) != parse_url($this->config->item('base_url'), PHP_URL_HOST) ) {
      return FALSE;
    } else {
      return TRUE;
    }
  }

  //이전페이지 지정 체크(지정한 이전경로 외에는 차단)
  function check_reffer_path($check_path, $redirect_url) {
    if( ! strpos(parse_url($this->agent->referrer(), PHP_URL_PATH), $check_path) ) {
      $data['go_url'] = $redirect_url;
      $html = $this->load->view('errors/error_alert', $data, TRUE);
      echo $html;
    }
  }

  // 에러 redirect 처리
  function error_redirect($error_msg, $go_url) {
    $data = [];
    $data['error_msg'] = $error_msg;
    $data['go_url'] = $go_url;
    $html = $this->load->view('errors/error_alert', $data, TRUE);
    echo $html;
    exit;
  }

  // 비밀번호 암호화
  function _crypt($val) {
    $val = crypt($val, '$6$rounds=5000$theheraldstudentreporters');
    $result = explode("$", $val);
    return $result[4];
  }

  //로그인 체크  (리턴형 함수로 만들어보자)
  function login_check() {
    if( empty($this->session->userdata('admin_id')) ) {
      // 세션이 끊겼을 경우 쿠키를 이용해 세션을 다시 생성
      if( get_cookie('admin_id') !== null && get_cookie('name') !== null ) {
        $idxno = get_cookie('idxno');
        $admin_id = get_cookie('admin_id');
        $name = get_cookie('name');
        $grade = get_cookie('grade');
        // 관리자 정보 세션 저장
        $this->session->set_userdata('idxno', $idxno);
        $this->session->set_userdata('admin_id', $admin_id);
        $this->session->set_userdata('name', $name);
        $this->session->set_userdata('grade', $grade);
        exit;
      }
      
      $this->error_redirect('로그인이 필요합니다.\n먼저 로그인해 주세요.', '/login/login');
      exit;
    }
  }

  // 중복로그인 체크
  function duplicate_login_detected() {
    // 로그인 되어 있다면 (잠시 막아둡니다.)
    /*
    if( strlen(trim($this->session->userdata('admin_id'))) > 0 ) {
      $dup_file_link = 'application/sessions/'.$this->session->userdata('admin_id');
      if( file_exists($dup_file_link) ) {
        $duplicate_code = file_get_contents('application/sessions/'.$this->session->userdata('admin_id'));
        if( $duplicate_code !== $this->session->userdata('duplicate_code') ) {
          // 현재 정보 로그아웃
          log_message('error', $this->session->userdata('admin_id').' 중복 로그인으로 로그아웃 처리!');
          $this->session->sess_destroy();
          // 중복 로그인 처리
          $this->error_redirect('다른 디바이스에서 같은 계정이 접속되어\n자동 로그아웃 처리되었습니다.', '/mgmt/login');
          exit;
        }
      } else {
        // 중복로그인 체크 파일 존재하지 않음.
        log_message('error', $this->session->userdata('admin_id').' 중복 로그인파일이 존재하지 않음!');
        exit;
      }
    }
    */
  }

  // 관리자 권한 체크
  function admin_level_check() {
    if( $this->session->userdata('grade') == 'S' ) {
      return true;
    } else {
      $this->error_redirect('해당 메뉴에 접근 권한이 없습니다.', '/main');
      exit;
    }
  }

  //paging 처리
  function common_paging($base_url, $total_rows, $per_page) {
    $config['base_url'] = $base_url; //페이징 주소
    $config['num_links'] = 3;	//선택된 페이지번호 좌우로 몇개의 “숫자”링크를 보여줄지 설정
    $config['total_rows'] = $total_rows;	//전체 게시물 수
    $config['use_page_numbers'] = TRUE;	//실제 페이지 번호를 보여주고 싶다면, TRUE
    $config['page_query_string'] = TRUE;
    $config['query_string_segment'] = 'page';
    $config['per_page'] = $per_page; //한 페이지에 표시할 게시물 수
    $config['full_tag_open'] = '<ul class="pagination float-right">';//감싸는 태그
    $config['full_tag_close'] = '</ul>';	//감싸는 태그
    $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';	//현재 페이지 링크의 여는 태그
    $config['cur_tag_close'] = '</a></li>';
    $config['attributes'] = array('class' => 'page-link');
    $config['num_tag_open'] = '<li class="page-item">';	//숫자태그
    $config['num_tag_close'] = '</li>';
    $config['prev_link'] = '&lt;';
    $config['prev_tag_open'] = '<li class="page-item">';
    $config['prev_tag_close'] = '</li>';
    $config['next_link'] = '&gt;';
    $config['next_tag_open'] = '<li class="page-item">';
    $config['next_tag_close'] = '</li>';
    $config['first_link'] = False;
    $config['last_link'] = False;
    $this->pagination->initialize($config);	//페이지네이션 초기화
    return $this->pagination->create_links();
  }

  //SMS발송
  //서비스명 은 일반적으로 domain의 첫자리를 입력. ajoumpa
  function sendSMS($service_name, $sender, $receiver, $msg, $rdate, $rtime) {
    $sms_url = 'http://api.dherald.com/v1/sms/process.asp';
    $port = '80';
    $sms['api_method'] = 'send';
    $sms['service_name'] = $service_name;
    $sms['sender'] = $sender;
    $sms['receiver'] = $receiver;
    $sms['msg'] = $msg;
    if( ! empty($rdate) ) {
      $sms['rdate'] = $rdate;
    }
    if( ! empty($rdate) ) {
      $sms['rtime'] = $rtime;
    }
    $oCurl = curl_init();
    curl_setopt($oCurl, CURLOPT_PORT, $port);
    curl_setopt($oCurl, CURLOPT_URL, $sms_url);
    curl_setopt($oCurl, CURLOPT_POST, 1);
    curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($oCurl, CURLOPT_POSTFIELDS, http_build_query($sms));
    curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);
    $ret = curl_exec($oCurl);
    curl_close($oCurl);
    return json_decode($ret,true);
  }

  //dherald 메일api
  function mail_send_dherald($to, $subject, $html) {
    $param = array(
      'to' => $to,
      'subject' => $subject,
      'html' => $html,
      'code'=>'D859Laq94N74bN4LIJZ3'
    );
    $api_url = 'https://api.dherald.com/v1/mail/process.php';
    $oCurl = curl_init();
    curl_setopt($oCurl, CURLOPT_URL, $api_url);
    curl_setopt($oCurl, CURLOPT_POST, 1);
    curl_setopt($oCurl, CURLOPT_POSTFIELDS, http_build_query($param));
    curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, true);	//요청 결과를 문자열로 반환
    curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE); //원격 서버의 인증서가 유효한지 검사 안함
    $ret = curl_exec($oCurl);
    curl_close($oCurl);
    echo $ret;
    $api_data=json_decode($ret,true);
    return $api_data;
  }


  // 알림톡 토큰 생성
  // -----------------------------------------------------------------------------------
  // API호출 URL의 유효시간을 결정하며 URL 의 구성중 "30"은 요청의 유효시간을 의미하며, "s"는 y(년), m(월), d(일), h(시), i(분), s(초) 중 하나이며 설정한 시간내에서만 토큰이 유효합니다.
  // 운영중이신 보안정책에 따라 토큰의 유효시간을 특정 기간만큼 지정할 경우 매번 호출할 필요없이 해당 유효시간내에 재사용 가능합니다.
  // 주의하실 점은 서버를 여러대 운영하실 경우 토큰은 서버정보를 포함하므로 각 서버에서 생성된 토큰 문자열을 사용하셔야 하며 토큰 문자열을 공유해서 사용하실 수 없습니다.
  function get_token() {
    $_apiURL	  =	'https://kakaoapi.aligo.in/akv10/token/create/30/s/';
    $_hostInfo	=	parse_url($_apiURL);
    $_port		  =	(strtolower($_hostInfo['scheme']) == 'https') ? 443 : 80;
    $_variables	=	array(
      'apikey' => 'iy2wnrz9r1uee602em5b8kf7h5d26azd',
      'userid' => 'dherald'
    );
    $oCurl = curl_init();
    curl_setopt($oCurl, CURLOPT_PORT, $_port);
    curl_setopt($oCurl, CURLOPT_URL, $_apiURL);
    curl_setopt($oCurl, CURLOPT_POST, 1);
    curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($oCurl, CURLOPT_POSTFIELDS, http_build_query($_variables));
    curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);
    $ret = curl_exec($oCurl);
    $error_msg = curl_error($oCurl);
    log_message('error', '알림톡 토큰 생성 에러: '. $error_msg);
    curl_close($oCurl);
    // 리턴 JSON 문자열 확인
    // print_r($ret . PHP_EOL);
    // JSON 문자열 배열 변환
    // $retArr = json_decode($ret);
    // 결과값 출력
    // print_r($retArr);
    return json_decode($ret, true);
    /*
    code      : 0 성공, 나머지 숫자는 에러
    message   : 결과 메시지
    token     : 토큰
    urlencode : 토큰(urlencode)
    */
  }

  // 알림톡 전송
  // -----------------------------------------------------------------------------------
  // 버튼의 경우 템플릿에 버튼이 있을때만 버튼 파라메더를 입력하셔야 합니다.
  // 버튼이 없는 템플릿인 경우 버튼 파라메더를 제외하시기 바랍니다.
  function send_alimtalk($config) {
    $_apiURL    =	'https://kakaoapi.aligo.in/akv10/alimtalk/send/';
    $_hostInfo  =	parse_url($_apiURL);
    $_port      =	(strtolower($_hostInfo['scheme']) == 'https') ? 443 : 80;
    $_variables =	array(
      'apikey'      => 'iy2wnrz9r1uee602em5b8kf7h5d26azd', 
      'userid'      => 'dherald', 
      // 'token'       => '생성한 토큰 문자열',
      'senderkey'   => '34a741588ed8fb68e6a6f8d28bd4c552a3cb25b4', 
      // 'tpl_code'    => '전송할 템플릿 코드',
      'sender'      => '027230025',
      // 'senddate'    => date("YmdHis", strtotime("+10 minutes"))
      // 'receiver_1'  => '첫번째 알림톡을 전송받을 휴대폰 번호',
      // 'recvname_1'  => '첫번째 알림톡을 전송받을 사용자 명',
      // 'subject_1'   => '첫번째 알림톡을 제목',
      // 'message_1'   => '첫번째 템플릿내용을 기초로 작성된 전송할 메세지 내용',
      // 'button_1'    => '{"button":[{"name":"테스트 버튼","linkType":"DS"}]}' // 템플릿에 버튼이 없는경우 제거하시기 바랍니다.
    );
    foreach($config as $key => $val) {
      $_variables[$key] = $val;
    }
    // 치환자 변수에 대한 처리
    // -----------------------------------------------------------------
    // 등록된 템플릿이 "#{이름}님 안녕하세요?" 일경우
    // 실제 전송할 메세지 (message_x) 에 들어갈 메세지는
    // "홍길동님 안녕하세요?" 입니다.
    // 카카오톡에서는 전문과 템플릿을 비교하여 치환자이외의 부분이 일치할 경우
    // 정상적인 메세지로 판단하여 발송처리 하는 관계로
    // 반드시 개행문자도 템플릿과 동일하게 작성하셔야 합니다.
    // 예제 : message_1 = "홍길동님 안녕하세요?"
    // -----------------------------------------------------------------
    // 버튼타입이 WL일 경우 (웹링크)
    // -----------------------------------------------------------------
    // 링크정보는 다음과 같으며 버튼도 치환변수를 사용할 수 있습니다.
    // {"button":[{"name":"버튼명","linkType":"WL","linkP":"https://www.링크주소.com/?example=12345", "linkM": "https://www.링크주소.com/?example=12345"}]}
    // -----------------------------------------------------------------
    // 버튼타입이 AL 일 경우 (앱링크)
    // -----------------------------------------------------------------
    // {"button":[{"name":"버튼명","linkType":"AL","linkI":"https://www.링크주소.com/?example=12345", "linkA": "https://www.링크주소.com/?example=12345"}]}
    // -----------------------------------------------------------------
    // 버튼타입이 DS 일 경우 (배송조회)
    // -----------------------------------------------------------------
    // {"button":[{"name":"버튼명","linkType":"DS"}]}
    // -----------------------------------------------------------------
    // 버튼타입이 BK 일 경우 (봇키워드)
    // -----------------------------------------------------------------
    // {"button":[{"name":"버튼명","linkType":"BK"}]}
    // -----------------------------------------------------------------
    // 버튼타입이 MD 일 경우 (메세지 전달)
    // -----------------------------------------------------------------
    // {"button":[{"name":"버튼명","linkType":"MD"}]}
    // -----------------------------------------------------------------
    // 버튼이 여러개 인경우 (WL + DS)
    // -----------------------------------------------------------------
    // {"button":[{"name":"버튼명","linkType":"WL","linkP":"https://www.링크주소.com/?example=12345", "linkM": "https://www.링크주소.com/?example=12345"}, {"name":"버튼명","linkType":"DS"}]}
    $oCurl = curl_init();
    curl_setopt($oCurl, CURLOPT_PORT, $_port);
    curl_setopt($oCurl, CURLOPT_URL, $_apiURL);
    curl_setopt($oCurl, CURLOPT_POST, 1);
    curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($oCurl, CURLOPT_POSTFIELDS, http_build_query($_variables));
    curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);
    $ret = curl_exec($oCurl);
    $error_msg = curl_error($oCurl);
    log_message('error', '알림톡 전송 에러: '. $error_msg);
    curl_close($oCurl);
    // 리턴 JSON 문자열 확인
    // print_r($ret . PHP_EOL);
    // JSON 문자열 배열 변환
    // $retArr = json_decode($ret);
    // 결과값 출력
    // print_r($retArr);
    $retArr = json_decode($ret, true);
    /*
    code : 0 성공, 나머지 숫자는 에러
    message : 결과 메시지
    */
  }

  //파일 업로드 설정(Step 1)
  function upload_file_init($save_path, $allowed_type, $file_name, $max_size) {
    if( strpos($save_path, 'member') !== false || strpos($save_path, 'apply') !== false ) {  
      if(!is_dir( __apply_dir.$save_path )) {
        mkdir( __apply_dir.$save_path , 0777, TRUE);
      }
      $upload_path = __apply_dir.$save_path;
    } else {  
      if(!is_dir( __upload_dir.$save_path )) {
        mkdir( __upload_dir.$save_path , 0777, TRUE);
      }
      $upload_path = __upload_dir.$save_path;
    }
    $config['upload_path'] = $upload_path;
    $config['allowed_types'] = $allowed_type;	//'gif|jpg|png|bmp';
    $config['file_name'] = $file_name;	//바꿀 파일 명
    $config['max_size'] = $max_size;	//파일 사이즈.0이면 크기제한 없슴. php.ini 설정도 확인해봐야함.
    $config['file_ext_tolower'] = TRUE;	//확장자 무조건 소문자로 저장.
    $config['overwrite'] = FALSE;	//파일 덮어씀.false 로 설정되면, 파일명에 숫자가 추가.
    $this->load->library('upload', $config);
  }
  //파일 업로드(Step 2)
  function upload_file_save($file_input_name) {
    if( ! $this->upload->do_upload($file_input_name) ) {
      //저장실패
      $error = array('error' => $this->upload->display_errors());
      log_message('error', $this->upload->display_errors());
      $result['error_msg'] = $error;
      $result['result'] = 'N';
    } else {
      //저장 성공
      $result['result'] = 'Y';
      //mypic.jpg
      $result['file_name'] = $this->upload->data('file_name');
      //image/jpeg
      $result['file_type'] = $this->upload->data('file_type');
      ///path/to/your/upload/
      $result['file_path'] = $this->upload->data('file_path');
      ///path/to/your/upload/jpg.jpg
      $result['full_path'] = $this->upload->data('full_path');
      //mypic
      $result['raw_name'] = $this->upload->data('raw_name');
      //mypic.jpg
      $result['orig_name'] = $this->upload->data('orig_name');
      //mypic.jpg
      $result['client_name'] = $this->upload->data('client_name');
      //.jpg
      $result['file_ext'] = $this->upload->data('file_ext');
      //22.2
      $result['file_size'] = $this->upload->data('file_size');
      //1
      $result['is_image'] = $this->upload->data('is_image');
      //800
      $result['image_width'] = $this->upload->data('image_width');
      //600
      $result['image_height'] = $this->upload->data('image_height');
      //jpeg
      $result['image_type'] = $this->upload->data('image_type');
      //width="800" height="200"
      $result['image_size_str'] = $this->upload->data('image_size_str');
    }
    return $result;
  }

// ***********************************************************************************************************************************************************************

  // public function file_delete($file_url){
  //   if(is_dir( __delete_dir.'/'.$file_url )){
  //     unlink( __delete_dir.'/'.$file_url ); // 삭제 

  //     log_message('error',__delete_dir);
  //   }
  // }

// ***********************************************************************************************************************************************************************


  // $now_pw = $this->encrpyt_text('내가 입력한');
  // $save_pw = $this->decrpyt_text($reseult['pw']);
  // if( $now_pw == $save_pw ){
  // }

  //복호화
  public function decrpyt_text($text='') {
    if( empty($text) ) return;
    $base_64 = $text . str_repeat('=', strlen($text) % 4);
    $data = base64_decode($base_64);
    $this->load->library('encryption');
    $dt = $this->encryption->decrypt($data);
    return $dt;
  }

  //암호화
  public function encrpyt_text($text) { 
    $this->load->library('encryption');
    $et = $this->encryption->encrypt($text);
    $base_64 = base64_encode($et);
    $url_param = rtrim($base_64, '=');
    return $url_param;
  }

  // php 8.1
  public function custom_trim(?string $value) {
    return trim($value ?? '') ;
  } 

  public function get_client_ip() {
    $ipaddress = '';
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
       $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    } else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
       $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else if(!empty($_SERVER['HTTP_X_FORWARDED'])) {
       $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    } else if(!empty($_SERVER['HTTP_FORWARDED_FOR'])) {
       $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    } else if(!empty($_SERVER['HTTP_FORWARDED'])) {
       $ipaddress = $_SERVER['HTTP_FORWARDED'];
    } else if(!empty($_SERVER['REMOTE_ADDR'])) {
       $ipaddress = $_SERVER['REMOTE_ADDR'];
    } else {
       $ipaddress = 'UNKNOWN';
    }
    return $ipaddress;
 }

}
?>
