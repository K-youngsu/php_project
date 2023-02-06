<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/assets/img/favicon.png">
  <title>
    Soft UI Dashboard by Creative Tim
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="/assets/css/soft-ui-dashboard.css?v=1.0.6" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-100">
<?php include($_SERVER['DOCUMENT_ROOT'].'/application/views/common/sidebar.php'); ?>  <!-- TODO:사이드바-->
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <ul class="navbar-nav  justify-content-end">
<?php
  if(!empty ($_SESSION['seq'])){
?>
            <!-- <li class="nav-item d-flex align-items-center">  생각 더해보고 구현해볼것
              <a href="/main/go_back" class="nav-link text-body font-weight-bold px-0" style="margin-left: 100px;">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">뒤로 가기</span>
              </a>
            </li> -->
            <li class="nav-item d-flex align-items-center" style="margin-left: 1300px;">
              <a href="/auth/logout" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Log Out</span>
              </a>
            </li>
<?php
  }
?>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navbar -->
    
    <!-- End Navbar -->
    <div class="container-fluid py-4" >
      <div class="row">
        <div class="col-lg-8" style="max-width: 1100px;">
          <div class="col-md-7 mt-4" style="width: 1100px;">
            <div class="card">
<?php
  $seq = $_SESSION['seq'];
  if($seq == $detail_board['write_seq']){
?>                       
              <div class="card-header pb-0 px-3"> <!-- 리스트 작성자가 맞을경우 보여주자 -->
                <a onclick="list_delete()" style="cursor: pointer;">
                <!-- <a onclick="test()" style="cursor: pointer;"> -->
                  <h6 class="mb-0 text-danger text-gradient  font-weight-bold" style="float: right; margin-right: 10px; ">삭제</h6>
                </a>
                <a href="/main/revise_view/<?=$detail_board['seq'].'/'.$cate?>">
                  <h6 class="mb-0 text-primary text-gradient  font-weight-bold" style="float: right; margin-right: 20px;">수정</h6>
                </a>
              </div>
        

              
<!-- <script>
  function test(){
    const data = new FormData();
    const file_url = document.querySelector('#board_img').src;
    data.append('file_url', file_url);
    fetch(`/main/delete_file_test`,{
      method: 'POST',
      mode: 'cors',
      headers:{
        Accept:'application/json'
      },
      body:data,
    }).then((res) =>{
      return res.json();
    }).then((json) =>{
      console.log('json: ', json);
    }).catch((e) => {
      console.log('e: ', e);
    });
  }
</script>       -->



<?php
  }

  switch ($cate){
    case 'main':
      $to_list = "/main/main_list/";
      break;
    case '':
      $to_list = "/main/main_list/";
      break;
    case 'today':
      $to_list = "/main/today_list/";
      break;
    case 'stor':
      $to_list = "/main/stor_list/";
      break;
    case 'my':
      $to_list = "/main/my_list/";
      break;
  }
?>
              <div>
                <a href="<?= $to_list?><?= $cate .'?'.$_SERVER['QUERY_STRING']?> ">
                  <input type="hidden" value="<?=$cate?>">
                  <h6 class="mb-0 text-info text-gradient  font-weight-bold" style="float: left; margin-left: 20px;">뒤로가기</h6>
                </a>
              </div>  
              <div class="card-body pt-4 p-3" >
                <ul class="list-group">
                  <li class="list-group-item border-0 d-flex p-4 mb-2 mt-3 bg-gray-100 border-radius-lg" style="height: auto;">
                   <div style="border: 1px solid; width: 1000px; border: none;">
                    <input type="hidden" name="b_seq" value="<?=$detail_board['seq']?>"> <!-- 상세 게시글의 seq -->
                    <h6>제목 : <?=$detail_board['title']?></h6> 
                    <span class="mb-2 text-xs">등록일 :<span class="text-dark font-weight-bold ms-sm-2"><?=$detail_board['tbi.regdt']?></span></span>
                    <br>
                    <br>
                    내용 : <?=$detail_board['content']?>
<?php
if( !empty($detail_board['file_url']) ){
?>                    
                    <input type="hidden" name="file_url" value="<?=$detail_board['file_url']?>" >                    
                    <img class="board_file" id="board_img" src="<?=$detail_board['file_url']?>" alt="board_img" width="400px" height="400px">
<?php
}
?>








                    <br>
                    <?=$detail_board['user_filename']?>
                   </div>
                  </li>
                </ul>
              </div>

              <div style="margin: 0 auto;">
                <a style="cursor: pointer;" onclick="like_or_dislike('N')">
                  <h6 class="mb-0 text-primary text-gradient  font-weight-bold" id="dislike_cnt_select" style="float: right; margin-left: 20px; text-align: center;">싫어요[<?=$detail_board['dislike_count']?>]</h6>
                </a>
                <a style="cursor: pointer;" onclick="like_or_dislike('Y')">
                  <h6 class="mb-0 text-info text-gradient  font-weight-bold" id="like_cnt_select" style="float: right; margin-right: 10px; text-align: center;">좋아요♥[<?=$detail_board['like_count']?>]♥</h6>
                </a>
              </div> <!-- 이거 지우셨어.. -->
                <input name="like_status" type="hidden" value="<?=$detail_board['like_status']?>">
              <div class="card-header pb-0 px-3" style="margin-bottom: 15px;"> 
              <!-- 조건걸어서 리스트 뿌려주는 박스 길이가 길어질경우 보여주기로 해보자 -->
                <!-- <h6 class="mb-0 text-danger text-gradient  font-weight-bold" style="float: right; margin-right: 10px; ">삭제</h6>
                <h6 class="mb-like_statusry text-gradient  font-weight-bold" style="float: right; margin-right: 20px;">수정</h6> -->
                <input type="hidden" name = "is_stor_check" value="<?=$detail_board['is_stor_check']?>"> 
                <input type="hidden" name = "ts_status" value="<?=$detail_board['ts_status']?>">
                
<?php
$seq = $_SESSION['seq'];
if($detail_board['is_stor_check'] == $seq && $detail_board['ts_status'] != 'Y' || $detail_board['is_stor_check'] == 'x'){
?>
                <div id="stor_Y">
                  <a style="cursor: pointer;" onclick="stor_check('Y')">
                    <h6 class="mb-0 text-info text-gradient  font-weight-bold" style="float: right; margin-right: 20px;">찜 등록</h6>
                  </a>
                </div>

                <div id="stor_D" style="display: none;">
                  <a style="cursor: pointer;" onclick="stor_check('D')">
                    <h6 class="mb-0 text-info text-gradient  font-weight-bold" style="float: right; margin-right: 20px;">찜 등록 취소</h6>
                  </a>
                </div>
<?php
}else if($detail_board['is_stor_check'] == $seq && $detail_board['ts_status'] == 'Y' ){
?>
                <div id="stor_D">
                  <a style="cursor: pointer;" onclick="stor_check('D')">
                    <h6 class="mb-0 text-info text-gradient  font-weight-bold" style="float: right; margin-right: 20px;">찜 등록 취소</h6>
                  </a>
                </div>

                <div id="stor_Y" style="display: none;"> 
                  <a style="cursor: pointer;" onclick="stor_check('Y')">
                    <h6 class="mb-0 text-info text-gradient  font-weight-bold" style="float: right; margin-right: 20px;">찜 등록</h6>
                  </a>
                </div>
<?php
}
?>



              </div>
            </div>
          </div>
        </div>

        <div class="col-md-5 mt-4" style="width: 380px;  height: auto; margin-left: 50px; max-height: 0;">
          <div class="card mb-4">
            <div class="card-body pt-4 p-3">
              <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3" id="detail_like">이 글을 좋아한 분들 ♥[<?=$detail_board['like_count']?>]♥</h6>
              <ul class="list-group like_member">
<?php
foreach($board_like as $row => $board_like){
?>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="" style="color: red; border: none; background: none;">♥</button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm"><?=$board_like['nickname']?></h6>
                      <span class="text-xs"><?=$board_like['tbl.regdt']?></span>
                    </div>
                  </div>
                </li>
<?php
}
?>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row" >
        <div class="col-md-7 mt-4" style="width: 1120px;">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">댓글</h6>
            </div>
            <div class="card-body pt-4 p-3">
              <ul class="list-group reply">

<?php
foreach($board_replay as $row => $replay){
?>
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="mb-3 text-sm"><?=$replay['nickname']?></h6>
                    <span class="mb-2 text-xs">댓글 :<span class="text-dark font-weight-bold ms-sm-2"><?=$replay['content']?></span></span>
                    <span class="mb-2 text-xs">등록 시간<span class="text-dark ms-sm-2 font-weight-bold"><?=$replay['regdt']?></span></span>  <!-- 해당 댓글의 seq 번호를 히든으로 넣어둔다움 지우기 및 수정 버튼을 클릭시 seq 를 이용해 보자 -->
                    <input type="hidden" name="r_seq<?=$replay['seq']?>" value="<?=$replay['seq']?>">
                    <input type="hidden" name="m_seq" value="<?=$replay['m_seq']?>">
                  </div>

<?php
  $seq = $_SESSION['seq'];
  if($seq == $replay['m_seq']){
?>                  

                  <div class="ms-auto text-end">
                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"  onclick="replay_delete(this)" data-seq="<?=$replay['seq']?>"><i class="far fa-trash-alt me-2"></i>Delete 댓글 삭제</a>
                    <!-- <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit 댓글 수정</a> -->
                  </div>
                </li>
<?php
  }
}
?>
              </ul>
              <div style="margin: 20px 0 0 20px;">
                             
                  <div class="d-flex flex-column">
                    <h6 class="mb-3 text-sm">댓글 작성</h6>
                    <span class="mb-2 text-xs">
                        <textarea name="content" id="replay_write" cols="30" rows="10" class="text-dark font-weight-bold ms-sm-2" style="width: 900px; height: 100px; border: 1; resize: none; outline-style: none;" ></textarea>
                      <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;" style="float: right; margin-right: 20px;" onclick="insert_replay()">
                        <i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>
                        댓글 등록
                      </a>
                    </span>
                  </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer pt-3  ">
        <div class="container-fluid">
        </div>
      </footer>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="/assets/js/core/popper.min.js"></script>
  <script src="/assets/js/core/bootstrap.min.js"></script>
  <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="/assets/js/soft-ui-dashboard.min.js?v=1.0.6"></script>
</body>

<!-- ****************************************************************************** -->

<!-- ****************************************************************************** -->

<script>
  async function list_delete(){  // 상세 게시글에 삭제를 활성화 하였을때
    const seq = document.querySelector('input[name="b_seq"]');
    
    if(confirm("게시글을 삭제하시겠습니까?")){
      const data = new FormData();
      const file_path = document.querySelector('input[name="file_url"]');
      data.append('seq',seq.value);
      data.append('file_url', file_path.value);

      await fetch(`/main/list_delete`,{
        method:'POST',
        mode:'cors',
        headers:{
          Accept:'application/json' 
        },
        body:data,
      }).then((res) =>{
        console.log(res);
        return res.json();
      }).then((json) =>{
        alert("삭제되었습니다.");
        location.href = "/main";
      }).catch((e) =>{
        alert('error');
        console.log(e);
      })
    }

  }

// 게시글 좋아요를 활성화 하였을때
async function like_or_dislike(type){ 
    const b_seq = document.querySelector('input[name="b_seq"]');
    const like_status = document.querySelector('input[name="like_status"]');

    const data = new FormData();
    data.append('b_seq', b_seq.value);
    data.append('type',type);

    await fetch(`/main/board_info_like_or_dislike`,{
      method: 'POST',
      mode: 'cors',
      headers:{
        Accept:'application/json'
      },
      body:data,
    }).then((res) =>{
      return res.json();
    }).then((json) =>{
    console.log( json ); //object arry 출력
    if(json.flag = 'o'){
      document.querySelector('#dislike_cnt_select').innerHTML = `싫어요[${json['dislike_count']}]`;
      document.querySelector('#like_cnt_select').innerHTML = `좋아요♥[${json['like_count']}]♥`;
      document.querySelector('#detail_like').innerHTML = `이 글을 좋아한 분들 ♥[${json['like_count']}]♥`;
      //문자열에 + 변수 담으려면 `1더하기1은=${변수}`;

      let ul_body = document.querySelector('.list-group.like_member');
      let html = '';
      for ( const el of json.board_like_member){
        html += `<li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="" style="color: red; border: none; background: none;">♥</button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">${el['nickname']}</h6>
                      <span class="text-xs">${el['tbl.regdt']}</span>
                    </div>
                  </div>
                </li>`;
      }
      ul_body.innerHTML = html;
    }
    }).catch((e) =>{
      alert('error');
      console.log(e);
    })
  
  }

  async function stor_check(type){ // 게시글 찜 하기 or 게시글 찜 해제하기를 실행 할 경우
    const b_seq = document.querySelector('input[name="b_seq"]');
    const is_stor_check = document.querySelector('input[name="is_stor_check"]');
    const ts_status = document.querySelector('input[name="ts_status"]');

    const data = new FormData();
    data.append('b_seq',b_seq.value);
    data.append('is_stor_check', is_stor_check.value);
    data.append('ts_status', ts_status.value);
    data.append('type', type);

    await fetch(`/main/stor_check`,{
      method:'POST',
      mode:'cors',
      headers:{
        Accept:'application/json'
      },
      body:data,
    }).then((res) =>{
      return res.json();
    }).then((json) =>{
      if(json.flag = 'o'){
        console.log(json);
        if(json.status == 'Y'){
          console.log(json.status); 
          document.querySelector('#stor_Y').style.display = 'none';
          console.log('등록');
          document.querySelector('#stor_D').style.display = 'block';   
        }
        if(json.status == 'D'){ 
          console.log(json.status);
          console.log('해제');
          document.querySelector('#stor_D').style.display = 'none';
          document.querySelector('#stor_Y').style.display = 'block';  
        }
      }
    }).catch((e) =>{
      alert('error');
      console.log(e);
    })
  }



  async function insert_replay(){  // 댓글 등록을 활성화 하였을때
    const content = document.querySelector('textarea[name="content"]');
    const b_seq = document.querySelector('input[name="b_seq"]');

    if (content.value.trim().length < 1){
      alert('댓글을 작성해 주세요');
      return false;
    } else{

      const data = new FormData();
      data.append('content',content.value);
      data.append('b_seq',b_seq.value);
  
      await fetch(`/main/replay_insert`,{
        method: 'POST',
        mode:'cors',
        headers:{
          Accept:'application/json'
        },
        body:data,
      }).then((res) =>{
        console.log(res); 
        return res.json();
      }).then((json) =>{
        if(json.flag = 'o'){
          console.log( json );   // json 다 보기
          console.log( json.replay );  // json 이름 으로 해당 데이터만 보기
          // console.log( json.end_array );  // json 이름 으로 해당 데이터만 보기
          // console.log( json.end_array['nickname'] );   // 이름  댓글  등록시간 
          // console.log( json.end_array['content'] );
          // console.log( json.end_array['regdt'] );

          // document.querySelector('#replay_add_nickname').innerHTML = `${json.end_array['nickname']}`;  // 해당 위치에 넣어주기
          // document.querySelector('#replay_add_content').innerHTML = `${json.end_array['content']}`;
          // document.querySelector('#replay_add_regdt').innerHTML = `${json.end_array['regdt']}`;

          // document.querySelector('#replay_add_seq').value = `${json.end_array['seq']}`;  // 댓글 테이블 seq 를 해당 태그 value 값 지정
          // document.querySelector('#replay_add_mseq').value = `${json.end_array['m_seq']}`;  // 댓글 테이블 seq 를 해당 태그 value 값 지정
          
          // document.querySelector('#replay_add').style.display = 'block';   
          
          alert('등록되었습니다.');
          
          let ul_body = document.querySelector('.list-group.reply');
          let html = return_html(json.replay);
          ul_body.innerHTML = html;
        }
        document.querySelector('#replay_write').value = '';  //댓글 작성구역 textarea value 값 '' 공백으로 만들어줌
        
      }).catch((e) =>{
        alert('error');
        console.log(e);
      })
    }

  }

  async function replay_delete(node){ // 댓글 삭제를 활성화 하였을때
    const b_seq = document.querySelector('input[name="b_seq"]');
    const r_seq = document.querySelector(`input[name="r_seq${node.dataset.seq}"]`);

    console.log(b_seq);
    console.log(r_seq);

    const data = new FormData();
    data.append('b_seq',b_seq.value);
    data.append('r_seq',r_seq.value);

    await fetch(`/main/replay_delete`,{
      method:'POST',
      mode:'cors',
      headers:{
        Accept:'application/json'
      },
      body:data,
    }).then((res) =>{
      return res.json();
    }).then((json) =>{

      let ul_body = document.querySelector('.list-group.reply');
      let html = return_html(json.replay);
      ul_body.innerHTML = html;

    }).catch((e) =>{
      alert('error');
      console.log(e);
    })
  }

  function return_html(reply_arr){
    let html = '';
          for( const el of reply_arr ){
            html += `<li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
            <div class="d-flex flex-column">
            <h6 class="mb-3 text-sm">test nickname1</h6>
            <span class="mb-2 text-xs">댓글 :<span class="text-dark font-weight-bold ms-sm-2">${el['content']}</span></span>
            <span class="mb-2 text-xs">등록 시간<span class="text-dark ms-sm-2 font-weight-bold">${el['regdt']}</span></span>  <!-- 해당 댓글의 seq 번호를 히든으로 넣어둔다움 지우기 및 수정 버튼을 클릭시 seq 를 이용해 보자 -->
            <input type="hidden" name="r_seq${el['seq']}" value="${el['seq']}">
            <input type="hidden" name="m_seq" value="${el['m_seq']}">
            </div>
            <div class="ms-auto text-end">
            <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;" onclick="replay_delete(this)" data-seq="${el['seq']}"><i class="far fa-trash-alt me-2" aria-hidden="true"></i>Delete 댓글 삭제</a>
            </div>
            </li>`;
          } 
    return html;

  }

  

</script>

</html>