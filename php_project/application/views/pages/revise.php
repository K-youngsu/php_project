<!--
=========================================================
* Soft UI Dashboard - v1.0.6
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

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

  <style>
        /* 첨부파일 */
.wrap{
    position:relative;
    margin:0 auto;width:800px;
    max-width:800px;
    padding:0 30px;}

.makeFlex{
  display:-webkit-box;
  display:-ms-flexbox;
  display:flex;
  -ms-flex-wrap:wrap;
  flex-wrap:wrap;
}
.flex_clmn{
  -webkit-box-orient:vertical;
  -webkit-box-direction:normal;
  -ms-flex-direction:column;
  flex-direction:column;
}
.flex_row{
  -webkit-box-orient:horizontal;
  -webkit-box-direction:normal;
  -ms-flex-direction:row;
  flex-direction:row;
}
.jc_STR{
  -webkit-box-pack:stretch;
  -ms-flex-pack:stretch;
  justify-content:stretch;
}
.jc_FS{
  -webkit-box-pack:start;
  -ms-flex-pack:start;
  justify-content:flex-start;
}
.jc_C{
  -webkit-box-pack:center;
  -ms-flex-pack:center;
  justify-content:center;
}
.jc_FE{
  -webkit-box-pack:end;
  -ms-flex-pack:end;
  justify-content:flex-end;
}
.jc_SB{
  -webkit-box-pack:justify;
  -ms-flex-pack:justify;
  justify-content:space-between;
}
.ai_STR{
  -webkit-box-align:stretch;
  -ms-flex-align:stretch;
  align-items:stretch;
}
.ai_FS{
  -webkit-box-align:start;
  -ms-flex-align:start;
  align-items:flex-start;
}
.ai_C{
  -webkit-box-align:center;
  -ms-flex-align:center;
  align-items:center;
}
.ai_FE{
  -webkit-box-align:end;
  -ms-flex-align:end;
  align-items:flex-end;
}

table{
  width:800px;
  table-layout:fixed;
}


/* 첨부파일 */
.ipt_file_area{
    position:relative;
    width: 635px;}
.ipt_file_area > *{
  margin:.5em;
}

.filebox{ 
    position:relative;
    width:470px;}

.changeFileName{
    position:absolute; 
    z-index:5;
    top:-5px;left:0;
    padding-left:1.5em;
    font-size:12px;
    color:#999;
    cursor:pointer;
  }
.changeFileName.on
{font-weight:bold;
  color:#222;
}
.changeFileName::before{ 
    content:'';
    display:block;
    position:absolute;
    left:0;
    top:3px;
    width:1em;
    height:1em;
    background:url('../ppms_img/ppms_icon/ic_pencil.svg') no-repeat left center;
    background-size:2em auto;
  }

.upload-name{
    display:block;
    position:relative;
    width:350px; /*이친구 길이조정하면 쓸만함*/
    padding:1.1em 1em .3em 0;
    background-color:#fff;
    border:2px solid #374548; 
    border-width:0 0 2px 0;
    font-weight:bold;
    color:#374548;
    cursor:text;
  }
.upload-name:focus{
    background-color:#f8fafc;
    color:#003dad;
    outline:1px solid #003dad;
  }

.filebox label{
    display:inline-block;
    position:relative;
    width:85px;
    padding:.5em 0; 
    margin-left:1em;
    border:1px solid #e0e0e0;
    font-weight:bold;
    font-size:12px;
    text-align:center;
    color:#374548;
    cursor:pointer;
  }

.filebox input[type="file"]{
    position:absolute;
    overflow:hidden;
    padding:0;
    margin:-1px;
    width:1px;
    height:1px;
    clip:rect(0,0,0,0);
    border:0;
  }

.btn_del{
    display:block;
    position:relative;
    margin-top:.5rem; 
    padding:10px;
    border:none;
    font-size: 12.5px;
  }
    </style>

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
            <li class="nav-item d-flex align-items-center" style="margin-left: 10px;">
              <a href="/auth/logout" class="nav-link text-body font-weight-bold px-0" style="margin-left: 1450px;">
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
    <div class="container-fluid py-4" style="overflow: hidden;">

      <form name="revise_form" id="revise_form" method="POST"  enctype="multipart/form-data" onsubmit="return false">
      
      <div class="row">
        <div class="col-md-7 mt-4">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">게시글 수정</h6>
            </div>
            <div class="card-body pt-4 p-3" style="height: 700px;">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg" style="height: 100px;">
                  <input name="b_seq" type="hidden" value="<?=$revise_board['seq']?>">  <!-- 수정할 게시글의 seq 번호 히든으로 숨겨주기 -->
                  <textarea name="revise_title" id="revise_title" cols="30" rows="10" style="width: 900px; resize: none; overflow: hidden; border: none; outline: none;" placeholder="제목을 입력해주세요."><?=$revise_board['title']?></textarea>
                </li>
                <li class="list-group-item border-0 d-flex p-4 mb-2 mt-3 bg-gray-100 border-radius-lg" style="height: 470px;">
                  <!-- <textarea name="write_content" id="write_content" cols="30" rows="10" style="width: 900px; resize: none; overflow: hidden; border: none; outline: none;" placeholder="내용을 입력해주세요."></textarea> -->
                  <textarea id="summernote" name="editordata"><?=$revise_board['content']?></textarea> 
                </li>
              </ul>
              <div class="d-flex align-items-center" style="margin-top: 10px;">
                <!-- <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center">
                  <i class="fas fa-arrow-up"></i>
                </button> -->
                <button type="button" name="write_btn" onclick="check_validation()" style="cursor: pointer; z-index: 1; margin-left: 20px;">
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark text-sm">글 수정</h6>
                  </div>
                </button>
                <!-- <a href="/main/revise_cancel" style="z-index: 1;"> -->
                <a href="/main/replay_view/<?=$b_seq.'/'.$cate?>" style="z-index: 1;">
                  <button type="button" name="write_btn"  style="cursor: pointer;  margin-left: 20px; z-index: 1;">
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">수정 취소</h6>  <!-- history.go(-2) 실행입니다 -->
                    </div>
                  </button>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-5 mt-4">
          <div class="card h-100 mb-4">
            <div class="card-header pb-0 px-3">
              <div class="row">
                <div class="col-md-6">
                  <h6 class="mb-0">파일 첨부 수정</h6>
                </div>
              </div>
            </div>
            <div class="card-body pt-4 p-3">
              <table class="table_write">
                <!-- <tbody>
                  <tr class="fileTR">
                   <th>첨부파일</th> 
                    <td>
                      <div class="ipt_file_area makeFlex ai_C">
                        <div class="filebox makeFlex ai_FE">
                          <div class="changeFileName" onclick="changeFileName(this)">파일명을 수정하시려면 이곳을 클릭하세요</div>
                          <input class="upload-name" name="upload-name" placeholder="파일선택" disabled="disabled" id="file" for="board_file" value="<?=$revise_board['origin_filename']?>">

                          <input type="hidden" name="origin_file_name" value="<?=$revise_board['origin_filename']?>">
                          <label>
                            파일 업로드 +
                          <input type="file" class="upload-hidden" id= "board_file" name= "board_file"  onchange="uploadName(this)">
                          </label>
                        </div>filebox 
                        <button class="btn_del" title="첨부파일 삭제" onclick="delFile(this)">첨부파일 삭제</button>
                      </div>ipt_file_area 
                    </td>
                  </tr>
                </tbody> -->


                <!-- 해당 게시글 원래 이름 -->
                <input type="hidden" name="origin_file_name" value="<?=$revise_board['origin_filename']?>"> 
                <!-- 바뀐 파일 명 -->
                <!-- <input type="hidden" name="new_file_name" id="new_file"> -->
                <!-- 해당 게시글 원래 url -->
                <input type="hidden" name="origin_file_url" value="<?=$revise_board['file_url']?>">
        
                <tbody>
                  <tr class="fileTR">
                    <td>
                      <div class="ipt_file_area makeFlex ai_C">
                        <div class="filebox makeFlex ai_FE">
                          <div class="changeFileName" onclick="changeFileName(this)">파일명을 수정하시려면 이곳을 클릭하세요</div>
                          <input class="upload-name" placeholder="파일선택"  disabled="disabled" name="upload_name" id="file" for="board_file" value="<?=$revise_board['origin_filename']?>">
                          <label>
                            파일 업로드 +
                          <input type="file" class="upload-hidden" id="board_file" name="board_file"  onchange="insert_file(this)">
                          </label>
                        </div>
                        <button class="btn_del" title="첨부파일 삭제" onclick="delFile(this)">첨부파일 삭제</button>
                      </div>



                      <!-- <div class="custom-file">
                        <input type="file" name="board_file" class="custom-file-input" id="board_file" onchange="insert_file(this)">
                        <label class="custom-file-label" for="board_file" id="file">파일을 선택해 주세요.</label>
                      </div>
                      <input name="new_file_name"> -->


                    </td>
                  </tr>
                </tbody>




                <tfoot>
                  <tr>
                    <th colspan="2">
                      <div><button title="첨부파일 추가" id="btn_addFile" onclick="add_fileTR()" class="btn white noBDR wider">...첨부파일 추가</button></div>
                    </th>
                  </tr>
                </tfoot>
              </table><!-- table_write -->
              <!-- <ul class="list-group">
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">파일 등록</h6>
                    </div>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i class="fas fa-arrow-down"></i></button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">파일 등록 취소</h6>
                    </div>
                  </div>
                </li>
              </ul> -->
              <!-- <div class="file">
                <label for="file">첨부 파일</label>
                <input type="file" id="file">
              </div> -->
            </div>
          </div>
        </div>
      </div>

      </form>

    </div>
  </main>
  
  <!--   Core JS Files   -->
  <script src="/assets/js/core/popper.min.js"></script>
  <script src="/assets/js/core/bootstrap.min.js"></script>
  <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="https://code.jquery.com/jquery-latest.min.js"></script>
  <script>

// 메인화면 페이지 로드 함수
$(document).ready(function () {
	var toolbar = [
    // 글꼴 설정
    ['fontname', ['fontname']],
    // 글자 크기 설정
    ['fontsize', ['fontsize']],
    // 굵기, 기울임꼴, 밑줄,취소 선, 서식지우기
    ['style', ['bold', 'italic', 'underline','strikethrough', 'clear']],
    // 글자색
    ['color', ['forecolor','color']],
    // 표만들기
    ['table', ['table']],
    // 글머리 기호, 번호매기기, 문단정렬
    ['para', ['ul', 'ol', 'paragraph']],
    // 줄간격
    ['height', ['height']],
    // 그림첨부, 링크만들기, 동영상첨부
    ['insert',['picture','link','video']],
    // 코드보기, 확대해서보기, 도움말
    ['view', ['codeview','fullscreen', 'help']]
  ];

	var setting = {
        placeholder : '내용을 작성하세요',
        height : 500,
        minHeight : 300,
        maxHeight : 700,
        focus : true,
        lang : 'ko-KR',
        toolbar : toolbar,
       /* callbacks : { //여기 부분이 이미지를 첨부하는 부분  비동기 할때 사용 
        onImageUpload : function(files, editor,
        welEditable) {
        for (var i = files.length - 1; i >= 0; i--) {
        uploadSummernoteImageFile(files[i],
        this);
            }
          }
        } */
      };

    $('#summernote').summernote(setting);
    });

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
  <script src="/assets/js/summernote/summernote-lite.js"></script>
  <script src="/assets/js/summernote/lang/summernote-ko-KR.js"></script>
  <link rel="stylesheet" href="/assets/css/summernote/summernote-lite.css">

</body>

<script>
// /* 첨부파일 추가 */
// //초기화된 값을 배열에 추가
// var fileTR = document.getElementsByClassName('fileTR')[0];
// var list_clones = [];
// for(let i=0; i<10; i++){
//     var clone_fileTR = fileTR.cloneNode(true);
//     list_clones.push(clone_fileTR);
// }//for

// var fileNums = 0;

// function add_fileTR(){
//     if(fileNums >= 10){
//         alert('첨부파일은 10개 까지만 추가 됩니다.');
//         return false;
//     }else{
//         // $('.table_write').find('tbody').append(list_clones[fileNums]);
//         let table_write = document.getElementsByClassName('table_write')[0];
//         table_write.getElementsByTagName('TBODY')[0].appendChild(list_clones[fileNums]);
//         fileNums++;
//     }
// }//add_fileTR


// /* 첨부파일 삭제 */
// function delFile(e){
//     var this_fileTR = e.parentNode.parentNode.parentNode; //console.log(this_fileTR);
//     if(fileNums < 1){
//         return false;
//     }else{
//         this_fileTR.parentNode.removeChild(this_fileTR);
//         fileNums--;
//     }//if,else
// }//delFile


// /* ★ upload-name 에 파일명을 불러옵니다 */ /* https://webdir.tistory.com/435 */
// function uploadName(e){
//     var files = e.files;
//     var filename = files[0].name;  //console.log(filename);
//     // 추출한 파일명 삽입 
//     var upload_name = e.parentNode.previousElementSibling;
//     upload_name.value = filename;
// }//uploadName


// /* ★ changeFileName을 클릭하면 파일명을 변경할 수 있게 disabled를 해제합니다 */
// function changeFileName(e){
//     e.classList.add('on');
//     e.innerHTML = '파일명을 변경합니다.';
//     e.nextElementSibling.disabled = false;
//     e.nextElementSibling.focus();
// }


// ******************************************************************************************

var MaxSize = 20;
var FileExt = 'gif, png, jpg, jpeg, pdf, xls, xlsx, doc, docx, ppt, pptx, hwp, hwpx, txt, zip';



// 파일 등록
function insert_file(node) {

  

  var files = node.files;
    var filename = files[0].name;  //console.log(filename);
    // 추출한 파일명 삽입 
    var upload_name = node.parentNode.previousElementSibling;

    upload_name.value = filename;

    document.querySelector('#new_file').value = upload_name;

    document.querySelector('#board_file').value = upload_name;
    // document.querySelector('#board_file').value = filename.value;

  if( node.value != '' ) {
    var extPlan = FileExt;
    var checkSize = 1024 * 1024 * MaxSize;
    if( !checkFile($('#board_file'), extPlan) | !checkFileSize($('#board_file'), checkSize) ) {
      node.value = '';
      $('#file').text('첨부 파일을 선택하세요.');
      return;
    } else {
      document.querySelector('#file').innerText = node.value;
    }
  }
}
function checkFile(obj, ext) {
  var check = false;
  var extName = obj.val().substring(obj.val().lastIndexOf(".") + 1).toLowerCase();
  var str = ext.split(",");
  for( var i = 0; i < str.length; i++ ) {
    if( extName == str[i].trim() ) {
      check = true;
      break;
    } else {
      check = false;
    }
  }
  if( !check ) {
    alert(ext + ' 파일만 업로드 가능합니다.');
  }
  return check;
}

function checkFileSize(obj, size) {
  var check = false;
  var sizeinbytes = obj[0].files[0].size;
  var fSExt = new Array('Bytes', 'KB', 'MB', 'GB');
  var i = 0;
  var checkSize = size;
  while( checkSize > 900 ) {
    checkSize /= 1024;
    i++;
  }
  checkSize = (Math.round(checkSize * 100) / 100) + ' ' + fSExt[i];
  var fSize = sizeinbytes;
  if( fSize > size ) {
    alert('첨부파일은 ' + checkSize + ' 이하로 첨부 바랍니다.');
    check = false;
  } else {
    check = true;
  }
  return check;
}

// *************************************************************************************************



  
  function check_validation(){
    //게시글 
    const revise_title = document.querySelector('textarea[name="revise_title"]');
    const editordata = document.querySelector('textarea[name="editordata"]');

    // 파일 
    const upload_name = document.querySelector('input[name="upload_name"]');
    // document.querySelector('#new_file').value = upload_name;
    const new_file_name = document.querySelector('input[name="new_file_name"]');
    // const upload_name = document.querySelector('#file').value;
    const origin_file_name = document.querySelector('input[name="origin_file_name"]');
  
    let returnVal = true;
  
    if(revise_title.value.trim().length < 1 ){
        alert('글 제목을 작성해주세요.');
        returnVal = false;
        return false;
      }
  
    if( editordata.value.trim().length < 1 ){
      alert('글 내용을 작성해주세요.');
      returnVal = false;
      return false;
    }
    document.revise_form.action = '/main/revise_board';
    document.revise_form.submit();
  }

</script>

</html>