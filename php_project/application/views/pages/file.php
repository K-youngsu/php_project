<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* 첨부파일 */
        @charset "utf-8";

.wrap{
    position:relative;
    margin:0 auto;width:800px;max-width:800px;
    padding:0 30px;}

.makeFlex{display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;}
.flex_clmn{-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column;}
.flex_row{-webkit-box-orient:horizontal;-webkit-box-direction:normal;-ms-flex-direction:row;flex-direction:row;}
.jc_STR{-webkit-box-pack:stretch;-ms-flex-pack:stretch;justify-content:stretch;}
.jc_FS{-webkit-box-pack:start;-ms-flex-pack:start;justify-content:flex-start;}
.jc_C{-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center;}
.jc_FE{-webkit-box-pack:end;-ms-flex-pack:end;justify-content:flex-end;}
.jc_SB{-webkit-box-pack:justify;-ms-flex-pack:justify;justify-content:space-between;}
.ai_STR{-webkit-box-align:stretch;-ms-flex-align:stretch;align-items:stretch;}
.ai_FS{-webkit-box-align:start;-ms-flex-align:start;align-items:flex-start;}
.ai_C{-webkit-box-align:center;-ms-flex-align:center;align-items:center;}
.ai_FE{-webkit-box-align:end;-ms-flex-align:end;align-items:flex-end;}

table{width:800px;table-layout:fixed;}


/* 첨부파일 */
.ipt_file_area{
    position:relative;
    width: 610px;}
.ipt_file_area > *{margin:.5em;}

.filebox{ 
    position:relative;
    width:470px;}

.changeFileName{
    position:absolute; z-index:5;
    top:-5px;left:0;
    padding-left:1.5em;
    font-size:12px;color:#999;
    cursor:pointer;}
.changeFileName.on{font-weight:bold;color:#222;}
.changeFileName::before{ 
    content:'';display:block;position:absolute;
    left:0;top:3px;
    width:1em;height:1em;
    background:url('../ppms_img/ppms_icon/ic_pencil.svg') no-repeat left center;
    background-size:2em auto;}

.upload-name{
    display:block;position:relative;
    width:350px; /*이친구 길이조정하면 쓸만함*/
    padding:1.1em 1em .3em 0;
    background-color:#fff;
    border:2px solid #374548; border-width:0 0 2px 0;
    font-weight:bold;color:#374548;
    cursor:text;}
.upload-name:focus{
    background-color:#f8fafc;
    color:#003dad;
    outline:1px solid #003dad;}

.filebox label{
    display:inline-block;position:relative;
    width:85px;
    padding:.5em 0; margin-left:1em;
    border:1px solid #e0e0e0;
    font-weight:bold;font-size:12px;text-align:center;color:#374548;
    cursor:pointer;}

.filebox input[type="file"]{
    position:absolute;overflow:hidden;
    padding:0;margin:-1px;
    width:1px;height:1px;
    clip:rect(0,0,0,0);
    border:0;}

.btn_del{
    display:block;position:relative;
    margin-top:.5rem; padding:1em;
    border:none;}


    </style>
</head>
<body>

<table class="table_write">
    <!-- <colgroup>
        <col style="width:180px;"><col>
    </colgroup> -->
    <tbody>
        <tr class="fileTR">
            <!-- <th>첨부파일</th> -->
            <td>
                <div class="ipt_file_area makeFlex ai_C">
                    <div class="filebox makeFlex ai_FE">
                        <div class="changeFileName" onclick="changeFileName(this)">파일명을 수정하시려면 이곳을 클릭하세요</div>
                        <input class="upload-name" placeholder="파일선택" disabled="disabled">
                        <label>
                            파일 업로드 +
                            <input type="file" class="upload-hidden" onchange="uploadName(this)">
                        </label>
                    </div><!-- filebox -->
                    <button class="btn_del" title="첨부파일 삭제" onclick="delFile(this)">첨부파일 삭제</button>

                </div><!-- ipt_file_area -->
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
<input type="file">
<!-- --------- 스크립트 --------- -->


</body>
<script>
/* 첨부파일 추가 */
//초기화된 값을 배열에 추가
var fileTR = document.getElementsByClassName('fileTR')[0];
var list_clones = [];
for(let i=0; i<10; i++){
    var clone_fileTR = fileTR.cloneNode(true);
    list_clones.push(clone_fileTR);
}//for

var fileNums = 0;

function add_fileTR(){
    if(fileNums >= 10){
        alert('첨부파일은 10개 까지만 추가 됩니다.');
        return false;
    }else{
        // $('.table_write').find('tbody').append(list_clones[fileNums]);
        let table_write = document.getElementsByClassName('table_write')[0];
        table_write.getElementsByTagName('TBODY')[0].appendChild(list_clones[fileNums]);
        fileNums++;
    }
}//add_fileTR


/* 첨부파일 삭제 */
function delFile(e){
    var this_fileTR = e.parentNode.parentNode.parentNode; //console.log(this_fileTR);
    if(fileNums < 1){
        return false;
    }else{
        this_fileTR.parentNode.removeChild(this_fileTR);
        fileNums--;
    }//if,else
}//delFile


/* ★ upload-name 에 파일명을 불러옵니다 */ /* https://webdir.tistory.com/435 */
function uploadName(e){
    var files = e.files;
    var filename = files[0].name;  //console.log(filename);
    // 추출한 파일명 삽입 
    var upload_name = e.parentNode.previousElementSibling;
    upload_name.value = filename;
}//uploadName


/* ★ changeFileName을 클릭하면 파일명을 변경할 수 있게 disabled를 해제합니다 */
function changeFileName(e){
    e.classList.add('on');
    e.innerHTML = '파일명을 변경합니다.';
    e.nextElementSibling.disabled = false;
    e.nextElementSibling.focus();
}

</script>
</html>