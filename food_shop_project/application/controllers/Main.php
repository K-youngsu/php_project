<?php

// use LDAP\Result;

defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database(); //데이터 베이스
        $this->load->model('Main_model'); //모델 
        $this->load->library('form_validation');//라이브러리  폼벨리데이션
        $this->load->helper('url'); //리다이렉트
        $this->load->library('session'); //세션
        $this->load->helper('file');
    }


	public function index()
	{
		$this->main_list();
	}

  public function main_list(){  //메인 페이지 이동
    $data['category'] = 'main';
    // $category = $data['category'];
    $today = date('Y-m-d');

    // ----------------------------------------------------------------------------

    if(!empty($_SERVER['QUERY_STRING']) | $_SERVER['QUERY_STRING'] !== ''){
      $query_array = array();
      parse_str($_SERVER['QUERY_STRING'], $query_array);

      // if(empty($query_array['page'])){
      //   $page_num = trim($this->input->get('page',TRUE));
      // } else{
      //     $page_num = $query_array['page'];
      //   }

        $page_num = empty($query_array['page']) ? trim($this->input->get('page', TRUE)) : $query_array['page'];

      // if(empty($query_array['serch_title'])){
      //   $serch = trim($this->input->get('serch_title',TRUE)); 
      // } else{
      //     $serch = $query_array['serch_title'];
      // }

        $serch = empty($query_array['page']) ? trim($this->input->get('serch_title', TRUE)) : $query_array['serch_title'];

    } else{
      $page_num = trim($this->input->get('page',TRUE));
      $serch = trim($this->input->get('serch_title',TRUE));
    }
    
    if(empty($page_num) && $page_num == 0 ){
      $page_num = 1;
    }
    
    $add_sql = '';

    if(!empty($serch)){
      $add_sql .= " AND tbi.title LIKE  '%".$this->db->escape_str($serch)."%' ";// 검색 했을 겨우 생각해 보기
      // $page_num = 1;
    }
    
    $data['serch'] = $serch;
    $data['page_num'] = $page_num;
    
    $per_page = 5;  //한 페이지당 보여줄 갯수
    $data['per_page'] = $per_page;
    $data['cnt'] = $this->Main_model->board_cnt($per_page, $add_sql)->row_array();
    
    if( (int)$data['cnt']['totalpage'] < 1 ) {
      $data['page_num'] = 1;
    } else if( (int)$data['page_num'] > (int)$data['cnt']['totalpage'] ) {
      $data['page_num'] = $data['cnt']['totalpage'];
      // $data['page_num'] = 1;
    }
    
    $start_num = ((int)$data['page_num'] - 1 ) * $per_page;
    
    $data['url'] = "/main/main_list?serch_title=$serch";
    $data['pagination'] = $this->common_paging($data['url'], $data['cnt']['cnt'], $per_page);

 
    // ----------------------------------------------------------------------------
    
    
    $data['best_title'] = $this->Main_model->best_title()->row_array(); // 좋아요 1등
    $data['board_view_title'] = $this->Main_model->board_view_title()->row_array();//조회수 1등
    
    $data['board_list'] = $this->Main_model->board_list_select($start_num, $per_page, $add_sql)->result_array(); // 보드 리스트 전체 출력
    
    $data['all_list_cnt'] = $this->Main_model->all_list_cnt()->row_array(); //전체 리스트 갯수 출력
    
    $data['today_list_cnt'] = $this->Main_model->today_list_cnt($today)->row_array(); //오늘의 리스트 갯수 출력

    if(!empty ($_SESSION['seq'])){ //세션값이 비어있지않을 경우 실행
      $seq = $_SESSION['seq'];
      $data['stor_list_cnt'] = $this->Main_model->stor_list_cnt($seq)->row_array(); //찜한 리스트 갯수 출력
      $data['my_list_cnt'] = $this->Main_model->my_list_cnt($seq)->row_array(); // 내가 작성한 리스트 갯수 출력
    }

    $this->load->view('/pages/main_page',$data);
  }



  public function today_list(){ //메인 페이지에서 오늘자 게시글 클릭할 경우 실행
    // $data['list_status'] = 'all';  이런씩으로 쓸거면 받는 함수에서도 $data 로 써줘야 한다
    // $list_type = 'today';
    // $this->main_list($list_type);
    $data['category'] = 'today';
    $today = date('Y-m-d');

    
    // ----------------------------------------------------------------------------

    $page_num = trim($this->input->get('page',TRUE));
    $serch = trim($this->input->get('serch_title',TRUE));

    if(!empty($_SERVER['QUERY_STRING']) | $_SERVER['QUERY_STRING'] !== ''){
      $query_array = array();
      parse_str($_SERVER['QUERY_STRING'], $query_array);

      // if(empty($query_array['page'])){
      //   $page_num = trim($this->input->get('page',TRUE));
      // } else{
      //     $page_num = $query_array['page'];
      //   }

        $page_num = empty($query_array['page']) ? trim($this->input->get('page',TRUE)) : $query_array['page'];

      // if(empty($query_array['serch_title'])){
      //   $serch = trim($this->input->get('serch_title',TRUE)); 
      // } else{
      //     $serch = $query_array['serch_title'];
      // }

        $serch = empty($query_array['serch_title']) ? trim($this->input->get('serch_title',TRUE)) : $query_array['page'];

    } else{
      $page_num = trim($this->input->get('page',TRUE));
      $serch = trim($this->input->get('serch_title',TRUE));
    }

    $add_sql = '';

    if(empty($page_num) && $page_num == 0){
      $page_num = 1;
    }
    if(!empty($serch)){
      $add_sql = " AND tbi.title LIKE '%".$this->db->escape_str($serch)."%' ";// 검색 했을 경우 생각해 보기
    }

    $data['page_num'] = $page_num;
    $data['serch'] = $serch;

    $per_page = 5;  //한 페이지당 보여줄 갯수
    $data['per_page'] = $per_page;
    $data['cnt'] = $this->Main_model->today_board_cnt($per_page, $today, $add_sql)->row_array();
    
    if( (int)$data['cnt']['totalpage'] < 1 ) {
      $data['page_num'] = 1;
    } else if( (int)$data['page_num'] > (int)$data['cnt']['totalpage'] ) {
        $data['page_num'] = $data['cnt']['totalpage'];
    }
    $start_num = ((int)$data['page_num'] - 1 ) * $per_page;

    $data['url'] = "/main/today_list?serch_title=$serch";
    $data['pagination'] = $this->common_paging($data['url'], $data['cnt']['cnt'], $per_page);
    
    // ----------------------------------------------------------------------------


    $data['all_list_cnt'] = $this->Main_model->all_list_cnt()->row_array(); //전체 리스트 갯수 출력
    $data['today_list_cnt'] = $this->Main_model->today_list_cnt($today)->row_array(); //오늘의 리스트 갯수 출력

    $data['today_best_like'] = $this->Main_model->today_best_like($today)->row_array();//오늘자 게시글 좋아요 1등 출력
    $data['today_best_view_cnt'] = $this->Main_model->today_best_view_cnt($today)->row_array();//오늘자 게시글 조회수 1등 출력

    $data['board_list'] = $this->Main_model->today_list($today, $start_num, $per_page, $add_sql)->result_array(); //오늘자 게시글 리스트 출력

    if(!empty ($_SESSION['seq'])){ //세션값이 비어있지않을 경우 실행
      $seq = $_SESSION['seq'];
      
      $data['stor_list_cnt'] = $this->Main_model->stor_list_cnt($seq)->row_array(); //찜한 리스트 갯수 출력
      $data['my_list_cnt'] = $this->Main_model->my_list_cnt($seq)->row_array(); // 내가 작성한 리스트 갯수 출력

    }
   
    $this->load->view('/pages/main_today_page',$data);
  } 

  public function stor_list(){ //메인 페이지에서 찜한 게시글 클릭할 경우 실행
    $data['category'] = 'stor';
    $today = date('Y-m-d');

    $data['all_list_cnt'] = $this->Main_model->all_list_cnt()->row_array(); //전체 리스트 갯수 출력
    $data['today_list_cnt'] = $this->Main_model->today_list_cnt($today)->row_array(); //오늘의 리스트 갯수 출력

    if(!empty ($_SESSION['seq'])){ //세션값이 비어있지않을 경우 실행
      $seq = $_SESSION['seq'];

      $data['stor_list_cnt'] = $this->Main_model->stor_list_cnt($seq)->row_array(); //찜한 리스트 갯수 출력
      $data['my_list_cnt'] = $this->Main_model->my_list_cnt($seq)->row_array(); // 내가 작성한 리스트 갯수 출력

      
      // ----------------------------------------------------------------------------
      
      $page_num = trim($this->input->get('page',TRUE));
      $serch = trim($this->input->get('serch_title',TRUE));

      if(!empty($_SERVER['QUERY_STRING']) | $_SERVER['QUERY_STRING'] !== ''){
        $query_array = array();
        parse_str($_SERVER['QUERY_STRING'], $query_array);
  
        // if(empty($query_array['page'])){
        //   $page_num = trim($this->input->get('page',TRUE));
        // } else{
        //     $page_num = $query_array['page'];
        //   }

        $page_num = empty($query_array['page']) ? trim($this->input->get('page',TRUE)) : $query_array['page'];  

        // if(empty($query_array['serch_title'])){
        //   $serch = trim($this->input->get('serch_title',TRUE)); 
        // } else{
        //     $serch = $query_array['serch_title'];
        // }

          $serch = empty($query_array['serch_title']) ? trim($this->input->get('serch_title',TRUE)) : $query_array['serch_title'];

      } else{
        $page_num = trim($this->input->get('page',TRUE));
        $serch = trim($this->input->get('serch_title',TRUE));
      }

      $add_sql = '';

      if(empty($page_num) && $page_num == 0){
        $page_num = 1;
      }
      if(!empty($serch)){
        $add_sql = " AND title LIKE '%".$this->db->escape_str($serch)."%' ";// 검색 했을 겨우 생각해 보기
      }

      $data['page_num'] = $page_num;
      $data['serch'] = $serch;
      
      $per_page = 5;  //한 페이지당 보여줄 갯수
      $data['per_page'] = $per_page;
      $data['cnt'] = $this->Main_model->stor_board_cnt($per_page, $seq, $add_sql)->row_array();
      
      if( (int)$data['cnt']['totalpage'] < 1 ) {
        $data['page_num'] = 1;
      } else if( (int)$data['page_num'] > (int)$data['cnt']['totalpage'] ) {
          $data['page_num'] = $data['cnt']['totalpage'];
      }
      $start_num = ((int)$data['page_num'] - 1 ) * $per_page;

      $data['url'] = "/main/stor_list?serch_title=$serch";

      $data['pagination'] = $this->common_paging($data['url'], $data['cnt']['cnt'], $per_page);

      // ----------------------------------------------------------------------------
      
      $data['stor_best_like'] = $this->Main_model->stor_board_like($seq)->row_array();//찜한 리스트 좋아요 1등
      $data['stor_best_view_cnt'] = $this->Main_model->stor_best_view_cnt($seq)->row_array();//찜한 리스트 조회수 1등
      
      $data['board_list'] = $this->Main_model->stor_list_select($seq, $start_num, $per_page, $add_sql)->result_array(); // 찜한 리스트 출력


    } else {
      echo '<script>
      if(confirm("서비스 이용을 위해 로그인이 필요합니다. \n로그인 페이지로 이동하시겠습니까?")){
        location.href = "/main/sign_in_view";
      } else{
        history.go(-1);
      }
      </script>';
    }
    $this->load->view('/pages/main_stor_page',$data);
  }

  public function my_list(){ //메인 페이지에서 나의 게시글 클릭할 경우 실행
    $data['category'] = 'my';
    $today = date('Y-m-d');
    
    $data['all_list_cnt'] = $this->Main_model->all_list_cnt()->row_array(); //전체 리스트 갯수 출력
    $data['today_list_cnt'] = $this->Main_model->today_list_cnt($today)->row_array(); //오늘의 리스트 갯수 출력

    if(!empty ($_SESSION['seq'])){
      $seq = $_SESSION['seq'];
      
      $data['stor_list_cnt'] = $this->Main_model->stor_list_cnt($seq)->row_array(); //찜한 리스트 갯수 출력
      $data['my_list_cnt'] = $this->Main_model->my_list_cnt($seq)->row_array(); // 내가 작성한 리스트 갯수 출력
      
      
      // ----------------------------------------------------------------------------
      
      $page_num = trim($this->input->get('page',TRUE));
      $serch = trim($this->input->get('serch_title',TRUE));

      if(!empty($_SERVER['QUERY_STRING']) | $_SERVER['QUERY_STRING'] !== ''){
        $query_array = array();
        parse_str($_SERVER['QUERY_STRING'], $query_array);
  
        // if(empty($query_array['page'])){
        //   $page_num = trim($this->input->get('page',TRUE));
        // } else{
        //     $page_num = $query_array['page'];
        //   }

          $page_num = empty($query_array['page']) ? trim($this->input->get('page',TRUE)) : $query_array['page'] ;  //삼항  연산자 
          $page_num = $query_array['page'] ?? trim($this->input->get('page',TRUE)); //nullable 연산자 ??


        // if(empty($query_array['serch_title'])){
        //   $serch = trim($this->input->get('serch_title',TRUE)); 
        // } else{
        //     $serch = $query_array['serch_title'];
        // }

          $serch = empty($query_array['serch_title']) ? trim($this->input->get('serch_title',TRUE)) : $query_array['serch_title'];  

      } else{
        $page_num = trim($this->input->get('page',TRUE));
        $serch = trim($this->input->get('serch_title',TRUE));
      }

      $add_sql = '';
      
      if(empty($page_num) && $page_num == 0){
        $page_num = 1;
      }
      if(!empty($serch)){
          $add_sql = " AND title LIKE '%".$this->db->escape_str($serch)."%' ";// 검색 했을 겨우 생각해 보기
        }
        
        $data['page_num'] = $page_num;
        $data['serch'] = $serch;
        
        $per_page = 5;  //한 페이지당 보여줄 갯수
        $data['per_page'] = $per_page;
        $data['cnt'] = $this->Main_model->my_board_cnt($per_page, $seq, $add_sql)->row_array();
        
        if( (int)$data['cnt']['totalpage'] < 1 ) {
          $data['page_num'] = 1;
        } else if( (int)$data['page_num'] > (int)$data['cnt']['totalpage'] ) {
          $data['page_num'] = $data['cnt']['totalpage'];
        }
        $start_num = ((int)$data['page_num'] - 1 ) * $per_page;
        
        $data['url'] = "/main/my_list?serch_title=$serch";
        $data['pagination'] = $this->common_paging($data['url'], $data['cnt']['cnt'], $per_page);
        
        // ----------------------------------------------------------------------------
        
        $data['my_list_best_like'] = $this->Main_model->my_list_best_like($seq)->row_array();//내가 작성한 리스트 좋아요 1등
        $data['my_list_best_view_cnt'] = $this->Main_model->my_list_best_view_cnt($seq)->row_array();//내가 작성한 리스트 조회수 1등
        $data['board_list'] = $this->Main_model->my_list_select($seq, $start_num, $per_page, $add_sql)->result_array(); // 내가 작성한 리스트 출력      
    
    } 
    else{
      echo '<script>
      if(confirm("서비스 이용을 위해 로그인이 필요합니다. \n로그인 페이지로 이동하시겠습니까?")){
        location.href = "/main/sign_in_view";
      } else{
        history.go(-1);
      }
      </script>';
    }
    $this->load->view('/pages/main_my_page',$data);
  }
  
  public function tables_view(){  // 테이블 페이지 이동
    $data['category'] = 'table';
    $this->load->view('/pages/tables',$data);
  }

  public function write_view(){  //작성 페이지 이동
    $data['category'] = 'write';
    $this->load->view('/pages/write',$data);
  }


public function board_insert(){ // 글 작성 페이지에서 글 등록을 실행 했을경우
  $title = trim($this->input->post('write_title'));
  $content = trim($this->input->post('editordata'));
  $seq = $_SESSION['seq'];

  // var_dump($_FILES);
  // exit;

  $this->form_validation->set_rules('write_title','제목','required', array('required' => '$s.을 입력해 주세요.'));
  $this->form_validation->set_rules('editordata','내용','required',array('required' => '$s.을 입력해 주세요.'));

  if($this->form_validation->run()){
    $data_arr = array('title' => $title,
                      'content' => $content,
                      'seq' => $seq);
          
    $b_seq = $this->Main_model->board_insert($data_arr);

    $user_file_name = trim($this->input->post('upload_name',TRUE));

    // TODO: 파일 업로드 하는방법
    if(!empty($_FILES['board_file']['name']) && $_FILES['board_file']['name'] !== ''){
      $upload_folder = '/file_test/'.date('Ym'); // 폴더이름 board 폴더 안에  등록한 년 월
      $time_name = date('YmdHis',time()); // 등록한 시 분 초
      $file = $_FILES['board_file']; // 파일에 대한 모든 정보 (name, size 등등 )
      $user_file_name = $_FILES['board_file']['name'];
      
      $ext = strtolower(substr($file['name'], strrpos($file['name'], '.') + 1));  //파일 형식
      $new_file_name = $time_name. '.'.$ext;  //바꿔줄 파일 이름 => 년 월 일 초 + 파일 형식

      $this->upload_file_init($upload_folder, '*', $new_file_name, '20480');

      //업로드 실행 후 결과 리턴
      $upload_result = $this->upload_file_save('board_file'); // 파일에 관한 모든 정보를 $upload_result 에 담음
      
      if($upload_result['result'] == 'Y'){
        $orig_file_name = $upload_result['client_name']; // db에 저장할 이름
        // $file_url = $upload_result['full_path']; // 파일이 저장될 url
        $file_url = '/assets'.$upload_folder.'/'.$upload_result['file_name']; // 파일이 저장될 url


        // 업로드 파일정보 db에 업데이트
        $this->Main_model->board_file_insert($b_seq, $file_url, $orig_file_name, $user_file_name );

        // 첨부 파일 테이블에 insert 작업이 실행되면 해당 board 게시글의 파일 상태 유무 업데이트
        $this->Main_model->board_file_update($b_seq);

      } else {
        $this->error_redirect('첨부 파일 등록실패','/main/write_view');
      }
    }
    $this->error_redirect('글 등록 성공','/main/main_list');
  }
  $this->error_redirect('글 등록 실패','/main/write_view');
}

// ******************************************************************************************************************************************************

  public function revise_view($b_seq, $cate){ //수정 페이지 이동
    $data['category'] = 'revise';

    if(!empty ($_SESSION['seq'])){
      $seq = $_SESSION['seq'];

      $data['b_seq'] = $b_seq;
      $data['cate'] = $cate;
      $data['revise_board'] = $this->Main_model->revise_board_select($b_seq, $seq)->row_array();

      $this->load->view('/pages/revise', $data);
    }    
  }

  public function revise_board(){ // 수정 페이지에서 수정 하기를 실행 할 경우 ----------------------------------------------------------------
    $seq = $_SESSION['seq'];  // 세션 유저가 누구인지 확인
    $b_seq = $this->input->post('b_seq',TRUE);
    $title = $this->input->post('revise_title');  
    $content = $this->input->post('editordata');   // type 이 textarea 인 경우 뒤에 TRUE를 작성하지 않는다
    // 바뀔 첨부파일 
    // $upload_name = trim($this->input->post('upload_name',TRUE));
    // $new_file_name = trim($this->input->post('new_file_name',TRUE));
    // 원래 첨부파일 
    $origin_file_name = $this->input->post('origin_file_name',TRUE);

    $this->form_validation->set_rules('revise_title','제목','required',array('required' => '$s.을 입력해 주세요'));
    $this->form_validation->set_rules('editordata','내용','required',array('required' => '$s.을 입력해 주세요'));

    if($this->form_validation->run()){
      $result = $this->Main_model->revise_update($seq, $b_seq, $title, $content);

// var_dump($_FILES['board_file']);
// exit;
$new_name = $_FILES['board_file']['name'];


if($new_name !== ''){

  // 선 삭제 후 insert 작업

  $origin_file_url = trim($this->input->post('origin_file_url', TRUE));

  // $file_url = trim($this->input->post('file_url'));
  $file_url = 'D:/php_young_project/food_shop_project'.$origin_file_url;
  $result = true;

  if( !empty($file_url) ){
    $this->Main_model->file_delete($b_seq);

    if( file_exists($file_url) ){ //파일 유무 체크 
        unlink($file_url); // 파일 삭제 
      }
    }
  
  // *************************************************************************************************************
        // TODO: 파일 업로드 하는방법  수정페이지 입니다.
      if(!empty($_FILES['board_file']['name']) && $_FILES['board_file']['name'] !== ''){
  
        $this->Main_model->file_delete($b_seq); // 게시글 삭제 ?
  
        $upload_folder = '/file_test/'.date('Ym'); // 폴더이름 board 폴더 안에  등록한 년 월
        $time_name = date('YmdHis',time()); // 등록한 시 분 초
        $file = $_FILES['board_file']; // 파일에 대한 모든 정보 (name, size 등등 )
        $user_file_name = $_FILES['board_file']['name'];
        
        $ext = strtolower(substr($file['name'], strrpos($file['name'], '.') + 1));  //파일 형식
        $new_file_name = $time_name. '.'.$ext;  //바꿔줄 파일 이름 => 년 월 일 초 + 파일 형식
  
        $this->upload_file_init($upload_folder, '*', $new_file_name, '20480');
  
        //업로드 실행 후 결과 리턴
        $upload_result = $this->upload_file_save('board_file'); // 파일에 관한 모든 정보를 $upload_result 에 담음
        
        if($upload_result['result'] == 'Y'){
          $orig_file_name = $upload_result['client_name']; // db에 저장할 이름
          // $file_url = $upload_result['full_path']; // 파일이 저장될 url
          $file_url = '/assets'.$upload_folder.'/'.$upload_result['file_name']; // 파일이 저장될 url
  
  
          // 업로드 파일정보 db에 업데이트
          $this->Main_model->board_file_insert($b_seq, $file_url, $orig_file_name, $user_file_name );
          // // 첨부 파일 테이블에 insert 작업이 실행되면 해당 board 게시글의 파일 상태 유무 업데이트
          // $this->Main_model->board_file_update($b_seq);
        }
      }
      // *************************************************************************************************************
}

      if($result){
        redirect("/main/replay_view/{$b_seq}");  // " " 이거 헷갈리지 말기  ' '  이걸로하면 인식못하는 키 있음
      }
    }

  }

  public function revise_cancel(){ // 수정 페이지에서 수정 취소를 실행 시킬 경우
    echo '<script>
            history.go(-2);
          </script>';
    // $b_seq = $this->input->post('b_seq',TRUE);

    // redirect("/main/replay_view/{$b_seq}");  // " " 이거 헷갈리지 말기  ' '  이걸로하면 인식못하는 키 있음
  }

  public function profile_view(){  //프로필 페이지 이동
      $data['category'] = 'profile';

      if(!empty($_SESSION['seq'])){
        $seq = $_SESSION['seq'];

        $data['user_info'] = $this->Main_model->member_info_select($seq)->row_array(); // 로그인 한 유저의 정보 출력


        $this->load->view('/pages/profile', $data);

      } else {
        echo '<script>
                alert("해당 서비스는 로그인이 필수입니다.");
                location.href = "/main/sign_in_view";
              </script>';
      }

  }

  public function member_delete(){  //프로필 페이지에서 회원 탈퇴를 실행했을 경우
    $user_id = $this->input->post('user_id',TRUE);
    $user_pwd = $this->input->post('user_pwd',TRUE);

    $this->form_validation->set_rules('user_id', '사용자 id', 'required', array('required' => '$s. 를 작성해 주세요.'));
    $this->form_validation->set_rules('user_pwd', '사용자 패스워드', 'required', array('required' => '$s. 를 작성해 주세요.'));

    if($this->form_validation->run()){
      $user_pwd = $this->_crypt($user_pwd);  // 패스워드 암호화
      $seq = $_SESSION['seq'];

      $user_info = $this->Main_model->member_check($seq)->row_array();

      if($user_info['id'] == $user_id && $user_info['pw'] == $user_pwd){
        $this->Main_model->member_delete($seq, $user_id, $user_pwd);
        echo '<script>
                alert("회원이 탈퇴되었습니다.");
                location.href = "/main/main_list";
              </script>';
        $this->session->sess_destroy();
      } else {
        echo '<script>
                alert("사용자 id 또는 패스워드를 확인해 주세요.");
                location.href = "/main/profile_view";
              </script>';
      }


    }
  }

  public function sign_in_view(){ // 로그인 페이지 이동
      $data['category'] = 'sign-in';
      $this->load->view('/pages/sign-in', $data);
  }

  public function sign_up_view(){ // 회원가입 페이지 이동
    $data['category'] = 'sign-up';
    $this->load->view('/pages/sign-up', $data);
  }

  public function replay_view($b_seq, $cate=''){ // 출력된 리스트들중 하나를 클릭했을경우 해당 리스트 상세보기 페이지로 이동
    $data['category'] = '';
    $_SERVER['QUERY_STRING'];

    if(!empty ($_SESSION['seq'])){
    $seq = $_SESSION['seq'];
    
    $data['detail_board'] = $this->Main_model->board_detail_select($seq, $b_seq)->row_array();  //  디테일 보더 / 찜 유 무 / 파일 / 좋아요 카운트/ 싫어요 카운트 출력
    $data['board_replay'] = $this->Main_model->board_replay($b_seq)->result_array(); // 댓글 출력
    $data['board_like'] = $this->Main_model->board_like($b_seq)->result_array(); // 좋아요를 활성화한 유저 정보 출력
    
    // $data['file_url'] = substr($data['detail_board']['file_url'], 38);
 

    $data['cate'] = $cate;

    $this->Main_model->update_view_cnt($b_seq);
    }
    else{
      echo '<script>
              alert("서비스 이용을 위해 로그인이 필요합니다. \n로그인 페이지로 이동하시겠습니까?");
                location.href = "/main/sign_in_view";
            </script>';
    }
    $this->load->view('/pages/replay', $data);
  }

// *******************************************************************************************************
// 파일 유무 확인후 해당 파일 삭제
// public function delete_file_test() {   
//   $file_url = trim($this->input->post('file_url'));
//   // 파일 유무 확인 
//   if( !empty($file_url) ){  
//     log_message('error','123');
//     if( is_dir( 'D:/php_young_project/food_shop_project/assets/file_test/202301/20230108121612.png')) {  // 파일 유무 체크
      
//       unlink($file_url);  // 삭제
//       log_message('error','check');
//     }
//   }
//   $flag = true;
//   echo json_encode( $flag  );
// }

// *******************************************************************************************************

  public function list_delete(){  // 상세보기 페이지에서 게시글 삭제 를 클릭할 경우 실행
    $seq = $this->input->post('seq',TRUE);
    $file_url = trim($this->input->post('file_url'));
    $file_url = 'D:/php_young_project/food_shop_project'.$file_url;
    $result = true;
    // $file_path = trim($this->input->post('file_path'));

    // log_message('error',$file_path);
    // $file_url = substr($file_url,28);  파일 짜르기 $file_url 앞에서 28번째까지 짜르기 
    
    
    // $file_url = './assets/file_test/202301/20230108121612.png';
    // log_message('error',$file_url);
    
    // $_SERVER['DOCUMENT_ROOT']; 현재 root 경로
    // log_message('error',$_SERVER['DOCUMENT_ROOT']);


    log_message('error', print_r($file_url, TRUE) ); 

    if( !empty($file_url) ){
      $this->Main_model->file_delete($seq);

      if( file_exists($file_url) ){ //파일 유무 체크 
          unlink($file_url); // 파일 삭제 
        }
      }

      // 파일 유무 확인 2 방법
      // if(is_dir($file_url)){
      //   log_message('error','통과?');
      // }

      // $flag = true;
      // echo json_encode( $flag  );

      $result = $this->Main_model->list_delete($seq);

    echo json_encode((bool)$result);
  }

  public function replay_insert(){ //상세보기 페이지의 댓글을 작성할 경우
    $json_data['flag'] = 'x';  

    if(!empty($_SESSION['seq'])){
      $m_seq = $_SESSION['seq'];
      $content = $this->input->post('content');
      $b_seq = $this->input->post('b_seq',TRUE);
      $json_data['flag'] = 'o'; 

      $this->Main_model->replay_insert($content, $b_seq, $m_seq);  // 댓글 인서트 작업

      $json_data['replay'] = $this->Main_model->replay_select($b_seq)->result_array(); // 해당 게시글 댓글 출력 작업

      // $json_data['end_array'] = end($json_data['replay']);  // 배열 마지막 데이터만 출력하기 

      // $json_data['nickname'] = $json_data['end_array']['nickname'];  // 이런씩으로 한개씩 지정도 가능
      // $json_data['content'] = $json_data['end_array']['content'];
      // $json_data['regdt'] = $json_data['end_array']['regdt'];

    } else {
      echo '<script>
      alert("해당 서비스는 로그인이 필수입니다.");
      location.href = "/main/sign_in_view";
      </script>';
    }
    echo json_encode($json_data);
  }

public function replay_delete(){ // 상세보기 페이지의 댓글을 삭제할 경우
  $m_seq = $_SESSION['seq'];
  $b_seq = $this->input->post('b_seq',TRUE);
  $r_seq = $this->input->post('r_seq',TRUE);
  
  
  $this->Main_model->replay_delete($m_seq, $b_seq, $r_seq);
  $json_data['replay'] = $this->Main_model->replay_select($b_seq)->result_array(); // 해당 게시글 댓글 출력 작업
  
  echo json_encode($json_data);
}

  public function board_info_like_or_dislike(){ // 상세보기 게시글의 좋아요를 실행하였을 경우
    $json_data['flag'] = 'x';
    if( !empty($_SESSION['seq']) ){
      $json_data['flag'] = 'o'; 
      $seq = $_SESSION['seq'];   // m_seq
      $b_seq = $this->input->post('b_seq', TRUE);  //b_seq
      $type = $this->input->post('type',TRUE);  //내가 누른 like_status
      // $today = date("Y-m-d H:i");
      
      $board_info = $this->Main_model->get_like_or_dislike_cnt($b_seq, $seq)->row_array();
      $json_data['like_count'] = $board_info['like_count'];
      $json_data['dislike_count'] = $board_info['dislike_count'];
  
      if( $board_info['like_status'] == 'x' ){  // 좋아요 or 싫어요를 처음 눌렀을 경우
        $this->Main_model->board_info_like_insert($b_seq, $seq, $type); // $result 가 없으면 해당 데이터 인서트
        $cnt = 0;
        $status = '';
        switch( $type ){
          case 'Y':    // 좋아요일 경우
            $status = 'like_count';
            $cnt = (int)$board_info['like_count'] + 1;
            $json_data['like_count'] = $cnt;
            $this->Main_model->borad_cnt_update($b_seq, $status, $cnt);
            $json_data['board_like_member'] = $this->Main_model->board_like($b_seq)->result_array(); // 해당 게시글의 좋아요를 누른 사람 select 작업 
            break;
          case 'N':  // 싫어요일 경우
            $status = 'dislike_count';
            $cnt = (int)$board_info['dislike_count'] + 1;
            $json_data['dislike_count'] = $cnt;
            $this->Main_model->borad_cnt_update($b_seq, $status, $cnt);
            $json_data['board_like_member'] = $this->Main_model->board_like($b_seq)->result_array(); // 해당 게시글의 좋아요를 누른 사람 select 작업 
            break;
        }
      } else {  //status 존재할때    좋아요 or 싫어요를 이미 실행한적이 있을 경우
          if( $board_info['like_status'] == $type ){  //내가 기존에 눌렀던 status랑 방금 눌렀던 status값이랑 같을때
            $this->Main_model->delete_board_like_or_dislike_cnt($b_seq, $seq);
            $cnt = 0;
            $status = '';
            if( $type == 'Y' ){   // 좋아요를 누른상태에서 한번더 눌러질 경우 
              $status = 'like_count';
              $cnt = (int)$board_info['like_count'] - 1;
              $json_data['like_count'] = $cnt;
              $this->Main_model->borad_cnt_update($b_seq, $status, $cnt);
              $json_data['board_like_member'] = $this->Main_model->board_like($b_seq)->result_array(); // 해당 게시글의 좋아요를 누른 사람 select 작업 
            } else {   // 싫어요를 누른상태에서 한번더 눌러질 경우
              $status = 'dislike_count';
              $cnt = (int)$board_info['dislike_count'] - 1;
              $json_data['dislike_count'] = $cnt;
              $this->Main_model->borad_cnt_update($b_seq, $status, $cnt);
              $json_data['board_like_member'] = $this->Main_model->board_like($b_seq)->result_array(); // 해당 게시글의 좋아요를 누른 사람 select 작업 
            }
          } else {  // 싫어요 가 눌러진 상태에서 좋아요를 누를경우 
              if( $type == 'Y' ){
                $status = 'like_count';
                $opposit_status = 'dislike_count';
                $cnt = (int)$board_info['like_count'] + 1;
                $json_data['like_count'] = $cnt;
                $opposit_cnt = (int)$board_info['dislike_count'] - 1;
                $json_data['dislike_count'] = $opposit_cnt;
                $this->Main_model->borad_cnt_update($b_seq, $status, $cnt, $opposit_status, $opposit_cnt);
                $this->Main_model->update_like_or_dislike_cnt($b_seq,$seq, $type);
                $json_data['board_like_member'] = $this->Main_model->board_like($b_seq)->result_array(); // 해당 게시글의 좋아요를 누른 사람 select 작업 
              } else { // 좋아요 가 눌러진 상태에서 싫어요를 누를 경우
                $status = 'dislike_count';
                $opposit_status = 'like_count';
                $cnt = (int)$board_info['dislike_count'] + 1;
                $json_data['dislike_count'] = $cnt;
                $opposit_cnt = (int)$board_info['like_count'] - 1;
                $json_data['like_count'] = $opposit_cnt;
                $this->Main_model->borad_cnt_update($b_seq, $status, $cnt, $opposit_status, $opposit_cnt);
                $this->Main_model->update_like_or_dislike_cnt($b_seq,$seq, $type);
                $json_data['board_like_member'] = $this->Main_model->board_like($b_seq)->result_array(); // 해당 게시글의 좋아요를 누른 사람 select 작업 
              }
  
          }
        }
    } 
    echo json_encode($json_data);
  }

  public function stor_check(){ // 게시글 찜하기 or 찜하기 헤제를 눌렀을 경우
    $json_data['flag'] = 'o'; 
    $seq = $_SESSION['seq'];
    $b_seq = $this->input->post('b_seq', TRUE);
    $type = $this->input->post('type',TRUE);  
    $json_data['status'] = '';

    switch ($type){
      case 'Y' :
        $json_data['status'] = 'Y';
        $this->Main_model->stor_update($seq, $b_seq, $type);  // stor_tbl insert 작업
        break;
      case 'D' :
        $json_data['status'] = 'D';
        $this->Main_model->stor_update($seq, $b_seq, $type);//stor_tbi delete 작업
        break;
    }
    echo json_encode($json_data);
  }



  

}