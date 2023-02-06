<?php
defined('BASEPATH') OR exit('NO direct script access allowed');

Class Main_model extends CI_Model {
  function __construct() {
    parent::__construct();
  }
  
  public function all_list_cnt(){ //전체 리스트 갯수 출력
    $sql = "SELECT COUNT(tbi.seq)  AS cnt
            FROM tbl_board_info tbi 
            WHERE tbi.status ='Y'";

    return $this->db->query($sql);
  }

  public function today_list_cnt($today){ // 오늘의 리스트 갯수 출력
    $sql = "SELECT tbi.seq,
                   COUNT( tbi.member_seq ) AS cnt,
                   tm.seq,
                   DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'tbi.regdt' ,
                   tbi.regdt ,
                   tbi.status 
            FROM tbl_board_info tbi 
              INNER JOIN(SELECT tm.seq,
                                tm.nickname
              FROM tbl_member tm) tm ON tm.seq = tbi.member_seq 
              WHERE tbi.status = 'Y'  
                AND tbi.regdt LIKE  '%".$this->db->escape_str($today)."%' ";

    return $this->db->query($sql);
  }

  public function stor_list_cnt($seq){ // 찜한 리스트 갯수 출력
    $sql = "SELECT  COUNT(ts.member_seq) AS cnt
            FROM tbl_stor ts 
            INNER JOIN (SELECT tbi.seq ,
                               tbi.status
                        FROM tbl_board_info tbi
                        WHERE tbi.status = 'Y' ) tbi ON tbi.seq = ts.board_seq 
            WHERE ts.status = 'Y' 
              AND ts.member_seq = '".$this->db->escape_str($seq)."'";

    return $this->db->query($sql);
  }

  public function my_list_cnt($seq){ // 내가 작성한 리스트 갯수 출력
    $sql = "SELECT COUNT(tbi.seq) AS cnt
            FROM tbl_board_info tbi 
            WHERE tbi.member_seq = '".$this->db->escape_str($seq)."' AND tbi.status = 'Y'";

    return $this->db->query($sql);
  }

  public function today_list($today, $start_num, $per_page, $add_sql){ //오늘자 게시글 리스트 출력
    $sql = "SELECT tbi.seq AS b_seq,
                   tbi.member_seq ,
                   tm.seq,
                   tm.nickname AS b_nickname ,
                   tbi.title ,
                   tbi.content ,
                   tbi.view_cnt ,
                   tbi.like_count ,
                   tbi.dislike_count ,
                   tbi.is_adult ,
                   tbi.is_file ,
                   DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'b.regdt' ,
                   DATE_FORMAT(tbi.regdt,'%H : %i') AS 'tbi.regdt' ,
                   tbi.status 
            FROM tbl_board_info tbi 
              INNER JOIN(SELECT tm.seq ,
                                tm.nickname
              FROM tbl_member tm) tm ON tm.seq = tbi.member_seq 
            WHERE tbi.status = 'Y' 
              AND tbi.regdt LIKE '%".$this->db->escape_str($today)."%'"
              .$add_sql;
    $sql .= "ORDER BY tbi.regdt DESC LIMIT ".$this->db->escape_str($start_num)." , ".$this->db->escape_str($per_page)." ";

    return $this->db->query($sql);
  }

  public function today_best_like($today){ //오늘자 게시글 좋아요 1등 select 작업
    $sql = "SELECT tbi.seq AS b_seq,
                  tbi.member_seq ,
                  tm.seq,
                  tm.nickname AS b_nickname ,
                  tbi.title ,
                  tbi.content ,
                  tbi.view_cnt ,
                  tbi.like_count,
                  tbi.dislike_count ,
                  tbi.is_adult ,
                  tbi.is_file ,
                  DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'b.regdt' ,
                  DATE_FORMAT(tbi.regdt,'%H : %i') AS 'tbi.regdt' ,
                  tbi.status ,
                  tf.file_url
            FROM tbl_board_info tbi 
            INNER JOIN(SELECT tm.seq ,
                              tm.nickname
                      FROM tbl_member tm) tm ON tm.seq = tbi.member_seq 
            LEFT OUTER join(SELECT tf.seq,
                                  tf.board_seq,
                                  tf.file_url,
                                  tf.origin_filename,
                                  tf.user_filename,
                                  tf.regdt,
                                  tf.status
                            FROM tbl_file tf
                            WHERE tf.status = 'Y') tf ON tf.board_seq = tbi.seq
            WHERE tbi.status = 'Y' 
              AND tbi.regdt LIKE '%".$this->db->escape_str($today)."%'
                ORDER BY tbi.like_count DESC LIMIT 1 ";

    return $this->db->query($sql);
  }

  public function today_best_view_cnt($today){ //오늘자 게시글 조회수 1등 select 작업
    $sql = "SELECT tbi.seq AS b_seq,
                  tbi.member_seq ,
                  tm.seq,
                  tm.nickname AS b_nickname ,
                  tbi.title ,
                  tbi.content ,
                  tbi.view_cnt ,
                  tbi.like_count ,
                  tbi.dislike_count ,
                  tbi.is_adult ,
                  tbi.is_file ,
                  DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'b.regdt' ,
                  DATE_FORMAT(tbi.regdt,'%H : %i') AS 'tbi.regdt' ,
                  tbi.status ,
                  tf.file_url
            FROM tbl_board_info tbi 
            INNER JOIN(SELECT tm.seq ,
                              tm.nickname
                        FROM tbl_member tm) tm ON tm.seq = tbi.member_seq 
            LEFT OUTER join(SELECT tf.seq,
                                  tf.board_seq,
                                  tf.file_url,
                                  tf.origin_filename,
                                  tf.user_filename,
                                  tf.regdt,
                                  tf.status
                                FROM tbl_file tf
                                WHERE tf.status = 'Y') tf ON tf.board_seq = tbi.seq
            WHERE tbi.status = 'Y' 
              AND tbi.regdt LIKE '%".$this->db->escape_str($today)."%'
                ORDER BY tbi.view_cnt DESC LIMIT 1 ";

    return $this->db->query($sql);
  }

  public function best_title(){ // 전체 리스트 보여주는 페이지에 좋아요 1등 select 작업
    $sql = "SELECT tbi.seq AS b_seq,
                  tbi.member_seq ,
                  tm.seq ,
                  tm.nickname ,
                  tbi.title ,
                  tbi.content ,
                  tbi.like_count ,
                  tbi.dislike_count ,
                  tbi.is_adult ,
                  tbi.is_file ,
                  tbi.view_cnt ,
                  tbi.regdt ,
                  tbi.status ,
                  tf.board_seq ,
                  tf.file_url
            FROM tbl_board_info tbi
            INNER JOIN(SELECT tm.seq,
                              tm.nickname
                        FROM tbl_member tm) tm ON tm.seq = tbi.member_seq 
            LEFT OUTER JOIN(SELECT tf.seq,
                                  tf.board_seq,
                                  tf.file_url,
                                  tf.status
                            FROM tbl_file tf
                            WHERE tf.status = 'Y') tf ON tf.board_seq = tbi.seq
            WHERE tbi.status = 'Y' 
              AND tbi.like_count = (SELECT max(tbi.like_count) FROM tbl_board_info tbi)";

    return $this->db->query($sql);
  }

  public function board_view_title(){ // 전체 리스트 보여주는 페이지에 조회수 1위 select 작업
    $sql = "SELECT tbi.seq AS b_seq,
                  tbi.member_seq ,
                  tm.seq ,
                  tm.nickname ,
                  tbi.title ,
                  tbi.content ,
                  tbi.like_count ,
                  tbi.dislike_count ,
                  tbi.is_adult ,
                  tbi.is_file ,
                  tbi.view_cnt ,
                  tbi.regdt ,
                  tbi.status ,
                  tf.board_seq ,
                  tf.file_url
            FROM tbl_board_info tbi
            INNER JOIN(SELECT tm.seq,
                              tm.nickname
                        FROM tbl_member tm) tm ON tm.seq = tbi.member_seq 
            LEFT OUTER JOIN(SELECT tf.seq,
                                  tf.board_seq,
                                  tf.file_url,
                                  tf.status
                            FROM tbl_file tf
                            WHERE tf.status = 'Y') tf ON tf.board_seq = tbi.seq
            WHERE tbi.status = 'Y' 
              AND tbi.view_cnt  = (SELECT max(tbi.view_cnt) FROM tbl_board_info tbi)";

    return $this->db->query($sql);
  }

  public function board_list_select($start_num, $per_page, $add_sql){ //보드 리스트 전체 출력
    $sql = "SELECT tbi.seq AS b_seq,
                   tbi.member_seq ,
                   tm.nickname AS b_nickname,
                   tbi.title ,
                   tbi.content ,
                   tbi.like_count ,
                   tbi.dislike_count ,
                   tbi.is_adult ,
                   tbi.is_file ,
                   tbi.view_cnt ,
                   DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'tbi.regdt'
            FROM tbl_board_info tbi 
            INNER JOIN (SELECT tm.seq ,
                               tm.nickname 
                        FROM tbl_member tm) tm ON tm.seq = tbi.member_seq 
            WHERE tbi.status = 'Y' "
              .$add_sql;
    // if(!empty($add_sql)){
    //   $sql .= " '%".$this->db->escape_str($add_sql)."%' ";
    // } else{

    // }
    $sql .= "ORDER BY tbi.regdt DESC LIMIT ".$this->db->escape_str($start_num)." , ".$this->db->escape_str($per_page)." ";
           

    return $this->db->query($sql);
  }

  public function stor_list_select($seq, $start_num, $per_page, $add_sql){ //찜한 리스트 출력
    $sql = "SELECT ts.seq ,
                   ts.board_seq ,
                   tbi.seq AS b_seq,
                   ts.member_seq ,
                   tbi.mseq ,
                   tm.nickname AS t_nickname,
                   tbi.nickname AS b_nickname,
                   tbi.title ,
                   tbi.view_cnt ,
                   tbi.is_file ,
                   DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'tbi.regdt' ,
                   ts.status ,
                   tbi.status ,
                   DATE_FORMAT(ts.regdt, '%Y-%m-%d %H:%i') AS ts_regdt
            FROM tbl_stor ts
              INNER JOIN tbl_member tm ON ts.member_seq = tm.seq
              INNER JOIN(SELECT tbi.seq ,
                                tbi.member_seq ,
                                tm.seq AS 'mseq' ,
                                tm.nickname ,
                                tbi.title ,
                                tbi.content ,
                                tbi.like_count ,
                                tbi.dislike_count ,
                                tbi.is_adult ,
                                tbi.is_file ,
                                tbi.view_cnt ,
                                tbi.regdt ,
                                tbi.status
                          FROM tbl_board_info tbi
                            INNER JOIN tbl_member tm ON tbi.member_seq = tm.seq
                              AND tbi.status = 'Y' ) tbi ON ts.board_seq = tbi.seq
            WHERE ts.member_seq  = '".$this->db->escape_str($seq)."'
                AND ts.status = 'Y' "
                  .$add_sql;  

    $sql .= "ORDER BY ts_regdt DESC LIMIT ".$this->db->escape_str($start_num)." , ".$this->db->escape_str($per_page)."";

    return $this->db->query($sql);
  }

  public function stor_board_like($seq){ //찜한 리스트 좋아요 1등 select 작업
    $sql = "SELECT ts.seq ,
                  ts.board_seq ,
                  tbi.seq AS b_seq,
                  ts.member_seq ,
                  tbi.mseq ,
                  tm.nickname AS t_nickname,
                  tbi.nickname AS b_nickname,
                  tbi.title ,
                  tbi.content ,
                  tbi.view_cnt ,
                  tbi.like_count ,
                  tbi.is_file ,
                  DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'tbi.regdt' ,
                  ts.status ,
                  tbi.status ,
                  DATE_FORMAT(ts.regdt, '%Y-%m-%d %H:%i') AS ts_regdt,
                  tf.file_url
            FROM tbl_stor ts
            INNER JOIN tbl_member tm ON ts.member_seq = tm.seq
            INNER JOIN(SELECT tbi.seq ,
                              tbi.member_seq ,
                              tm.seq AS 'mseq' ,
                              tm.nickname ,
                              tbi.title ,
                              tbi.content ,
                              tbi.like_count ,
                              tbi.dislike_count ,
                              tbi.is_adult ,
                              tbi.is_file ,
                              tbi.view_cnt ,
                              tbi.regdt ,
                              tbi.status
                        FROM tbl_board_info tbi
                          INNER JOIN tbl_member tm ON tbi.member_seq = tm.seq
                            AND tbi.status = 'Y' ) tbi ON ts.board_seq = tbi.seq
            LEFT OUTER JOIN (SELECT tf.seq,
                                    tf.board_seq,
                                    tf.file_url,
                                    tf.origin_filename,
                                    tf.user_filename,
                                    tf.regdt,
                                    tf.status
                              FROM tbl_file tf
                              WHERE tf.status = 'Y') tf ON tf.board_seq = ts.board_seq                
            WHERE ts.member_seq  = '".$this->db->escape_str($seq)."'
              AND ts.status = 'Y' 
              ORDER BY tbi.like_count desc LIMIT 1 ";

    return $this->db->query($sql);
  }

  public function stor_best_view_cnt($seq){ // 찜한 리스트 조회수 1등 select 작업
    $sql = "SELECT ts.seq ,
                  ts.board_seq ,
                  tbi.seq AS b_seq,
                  ts.member_seq ,
                  tbi.mseq ,
                  tm.nickname AS t_nickname,
                  tbi.nickname AS b_nickname,
                  tbi.title ,
                  tbi.content ,
                  tbi.view_cnt ,
                  tbi.like_count ,
                  tbi.is_file ,
                  DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'tbi.regdt' ,
                  ts.status ,
                  tbi.status ,
                  DATE_FORMAT(ts.regdt, '%Y-%m-%d %H:%i') AS ts_regdt,
                  tf.file_url
            FROM tbl_stor ts
            INNER JOIN tbl_member tm ON ts.member_seq = tm.seq
            INNER JOIN(SELECT tbi.seq ,
                              tbi.member_seq ,
                              tm.seq AS 'mseq' ,
                              tm.nickname ,
                              tbi.title ,
                              tbi.content ,
                              tbi.like_count ,
                              tbi.dislike_count ,
                              tbi.is_adult ,
                              tbi.is_file ,
                              tbi.view_cnt ,
                              tbi.regdt ,
                              tbi.status
                        FROM tbl_board_info tbi
                          INNER JOIN tbl_member tm ON tbi.member_seq = tm.seq
                            AND tbi.status = 'Y' ) tbi ON ts.board_seq = tbi.seq
            LEFT OUTER JOIN (SELECT tf.seq,
                                    tf.board_seq,
                                    tf.file_url,
                                    tf.origin_filename,
                                    tf.user_filename,
                                    tf.regdt,
                                    tf.status
                              FROM tbl_file tf
                              WHERE tf.status = 'Y') tf ON tf.board_seq = ts.board_seq                
              WHERE ts.member_seq  = '".$this->db->escape_str($seq)."'
              AND ts.status = 'Y' 
              ORDER BY tbi.view_cnt desc LIMIT 1 ";

    return $this->db->query($sql);
  }

  public function my_list_select($seq, $start_num, $per_page, $add_sql){ //내가 작성한 리스트 출력 
    $sql = "  SELECT tbi.seq AS b_seq,
                      tm.seq ,
                      tm.nickname AS b_nickname,
                      tm.status ,
                      tbi.title ,
                      tbi.like_count ,
                      tbi.dislike_count ,
                      tbi.is_adult ,
                      tbi.is_file ,
                      tbi.view_cnt ,
                      DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'tbi.regdt' 
                  FROM tbl_board_info tbi 
                  INNER JOIN(SELECT tm.seq , 
                                tm.nickname ,
                                tm.status
                          FROM tbl_member tm
                          WHERE tm.seq  = ".$this->db->escape_str($seq)." ) tm ON tm.seq = tbi.member_seq 
                  WHERE tbi.member_seq  = ".$this->db->escape_str($seq)."
                  AND tbi.status = 'Y'"
                    .$add_sql;

    $sql .= "ORDER BY tbi.regdt DESC LIMIT ".$this->db->escape_str($start_num)." , ".$this->db->escape_str($per_page)." ";

    return $this->db->query($sql);
  }

  public function my_list_best_like($seq){ //내가 작성한 리스트 좋아요 1등 select 작업
    $sql = "SELECT tbi.seq AS b_seq,
                  tm.seq ,
                  tm.nickname AS b_nickname,
                  tm.status ,
                  tbi.title ,
                  tbi.content ,
                  tbi.like_count ,
                  tbi.dislike_count ,
                  tbi.is_adult ,
                  tbi.is_file ,
                  tbi.view_cnt ,
                  DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'tbi.regdt' ,
                  tf.board_seq,
                  tf.file_url
            FROM tbl_board_info tbi 
            INNER JOIN(SELECT tm.seq , 
                            tm.nickname ,
                            tm.status
                      FROM tbl_member tm
                      WHERE tm.seq  = ".$this->db->escape_str($seq)." ) tm ON tm.seq = tbi.member_seq 
            LEFT OUTER JOIN(SELECT tf.seq,
                                  tf.board_seq,
                                  tf.file_url,
                                  tf.origin_filename,
                                  tf.user_filename ,
                                  tf.regdt,
                                  tf.status
                              FROM tbl_file tf
                              WHERE tf.status = 'Y') tf ON tf.board_seq = tbi.seq        
            WHERE tbi.member_seq  = ".$this->db->escape_str($seq)."
              AND tbi.status = 'Y'
               ORDER BY tbi.like_count DESC LIMIT 1 ";

    return $this->db->query($sql);
  }

  public function my_list_best_view_cnt($seq){ //내가 작성한 리스트 조회수 1등 select 작업
    $sql = "SELECT tbi.seq AS b_seq,
                  tm.seq ,
                  tm.nickname AS b_nickname,
                  tm.status ,
                  tbi.title ,
                  tbi.content ,
                  tbi.like_count ,
                  tbi.dislike_count ,
                  tbi.is_adult ,
                  tbi.is_file ,
                  tbi.view_cnt ,
                  DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'tbi.regdt' ,
                  tf.board_seq,
                  tf.file_url
            FROM tbl_board_info tbi 
            INNER JOIN(SELECT tm.seq , 
                            tm.nickname ,
                            tm.status
                      FROM tbl_member tm
                      WHERE tm.seq  = ".$this->db->escape_str($seq)." ) tm ON tm.seq = tbi.member_seq 
            LEFT OUTER JOIN(SELECT tf.seq,
                                  tf.board_seq,
                                  tf.file_url,
                                  tf.origin_filename,
                                  tf.user_filename ,
                                  tf.regdt,
                                  tf.status
                            FROM tbl_file tf
                            WHERE tf.status = 'Y') tf ON tf.board_seq = tbi.seq        
              WHERE tbi.member_seq  = ".$this->db->escape_str($seq)."
                AND tbi.status = 'Y'
                  ORDER BY tbi.view_cnt DESC LIMIT 1 ";

    return $this->db->query($sql);
  }

  public function board_detail_select($seq, $b_seq){ // 디테일 보더 / 찜 유 무 / 좋아요 카운트/ 싫어요 카운트 select 작업
   
    $sql = "SELECT tbi.seq,
                    tbi.member_seq AS write_seq,
                    IFNULL(ts.member_seq, 'x') AS is_stor_check,
                    ts.status AS ts_status ,
                    tbi.title ,
                    tbi.content ,
                    IFNULL (tbl.like_status, 'x' ) AS like_status, 	
                    tbi.like_count ,
                    tbi.dislike_count ,
                    tbi.is_adult ,
                    tbi.is_file ,
                    tbi.view_cnt ,
                    DATE_FORMAT(tbi.regdt, '%Y.%m.%d %H:%i') AS 'tbi.regdt' ,
                    tbi.regdt ,
                    tf.board_seq ,
                    tf.file_url ,
                    tf.user_filename
            FROM tbl_board_info tbi
            LEFT OUTER JOIN (SELECT ts.seq, 
                                  ts.board_seq,
                                  ts.member_seq ,
                                  ts.status
                            FROM tbl_stor ts
                            WHERE ts.member_seq = ".$this->db->escape_str($seq)."
                              AND ts.board_seq = ".$this->db->escape_str($b_seq).") ts ON ts.board_seq = tbi.seq
            LEFT OUTER JOIN(SELECT tbl.like_status ,
                                  tbl.member_seq ,
                                  tbl.board_seq
                            FROM tbl_board_like tbl
                            WHERE tbl.member_seq = ".$this->db->escape_str($seq)."
                              AND tbl.board_seq = ".$this->db->escape_str($b_seq).") tbl ON tbl.board_seq = tbi.seq
            LEFT OUTER JOIN (SELECT tf.seq ,
                                  tf.board_seq ,
                                  tf.file_url ,
                                  tf.user_filename ,
                                  tf.status
                              FROM tbl_file tf
                              WHERE tf.status = 'Y'
                                AND tf.board_seq = ".$this->db->escape_str($b_seq).") tf ON tf.board_seq = tbi.seq
            WHERE tbi.seq = ".$this->db->escape_str($b_seq)."
              AND tbi.status = 'Y'";

    return $this->db->query($sql);
  }

  public function board_like($b_seq){ //상세보기 게시글의 좋아요를 활성화 한 유저 정보 출력
    $sql = "SELECT tbl.seq,
                   tbl.board_seq ,
                   tbl.member_seq ,
                   tm.seq AS m_seq,
                   tm.nickname,
                   tbl.like_status ,
                   DATE_FORMAT(tbl.regdt, '%Y.%m.%d %H:%i') AS 'tbl.regdt' ,
                   tbl.regdt 
            FROM tbl_board_like tbl
              INNER JOIN(SELECT tbi.seq
                        FROM tbl_board_info tbi) tbi ON tbi.seq = tbl.board_seq 
              INNER JOIN(SELECT tm.seq,
                                tm.nickname
                        FROM tbl_member tm
                        WHERE tm.status = 'Y') tm ON tm.seq = tbl.member_seq 
            WHERE tbl.board_seq = '".$this->db->escape_str($b_seq)."' 
              AND tbl.like_status = 'Y'
              ORDER BY tbl.regdt DESC ";

    return $this->db->query($sql);
  }

  public function board_replay($b_seq){ //상세보기 페이지에서 해당 게시글의 댓글 출력
    $sql = "SELECT tr.seq,
                   tm.seq AS m_seq,
                   tm.nickname ,
                   tr.member_seq ,
                   tr.board_seq ,
                   tr.content ,
                   tr.like_count ,
                   tr.dislike_count ,
                   tr.regdt 
            FROM tbl_reply tr 
              INNER JOIN(SELECT tm.seq ,
                                tm.nickname 
                        FROM tbl_member tm)tm ON tm.seq = tr.member_seq  
              WHERE board_seq = '".$this->db->escape_str($b_seq)."' 
                AND status = 'Y' 
                  ORDER BY seq DESC";

    return $this->db->query($sql);
  }

  public function replay_delete($m_seq, $b_seq, $r_seq){ //상세보기 페이지에서 댓글 삭제를 눌렀을 경우
    $sql = "DELETE FROM tbl_reply 
            WHERE seq = ".$this->db->escape_str($r_seq)." 
              AND board_seq = ".$this->db->escape_str($b_seq)." 
                AND member_seq = ".$this->db->escape_str($m_seq)." "; 

    return $this->db->query($sql);
  }

  public function update_view_cnt($b_seq){ //게시글 조회수 증가시키기
    $sql = "UPDATE tbl_board_info 
              SET view_cnt = view_cnt + 1 
              WHERE seq = '".$this->db->escape_str($b_seq)."';";

    return $this->db->query($sql);
  }

  public function list_delete($seq){ //게시글 삭제하기
    $sql = "UPDATE tbl_board_info 
              SET status = 'D' 
              WHERE seq = '".$this->db->escape_str($seq)."'";

    return $this->db->query($sql);
  }

  public function file_delete($seq) { // 파일 삭제 
    $sql = "UPDATE tbl_file 
              SET status = 'D'
              WHERE board_seq = ".$this->db->escape_str($seq)." ";

    return $this->db->query($sql);
  }

  public function replay_insert($content, $b_seq, $m_seq){ //게시글에 댓글 등록하기
    $sql = "INSERT INTO tbl_reply (member_seq,board_seq,content) 
            VALUES ('".$this->db->escape_str($m_seq)."','".$this->db->escape_str($b_seq)."','".$this->db->escape_str($content)."')";

    return $this->db->query($sql);
  }

  public function view_cnt_down($b_seq){ // 게시글 댓글 작성시 게시글 조회수 2개씩 오르는걸 막기위해 -1 해주기
    $sql = "UPDATE tbl_board_info 
              SET view_cnt = view_cnt -1 
              WHERE seq = '".$this->db->escape_str($b_seq)."'";

    return $this->db->query($sql);
  }

  public function board_info_like_tbl_select($seq, $b_seq){ // 상세보기 게시글의 좋아요를 실행할때 이미 해당 게시글의 seq 와 좋아요를 누른 유저의 seq 가 등록되어 있는지 구별
    $sql = "SELECT tbl.seq,
                   tbl.board_seq ,
                   tbl.member_seq ,
                   tbl.like_status ,
                   tbl.regdt 
            FROM tbl_board_like tbl 
              WHERE tbl.board_seq = '".$this->db->escape_str($b_seq)."' 
                AND tbl.member_seq = '".$this->db->escape_str($seq)."'";

    return $this->db->query($sql);
  }
  
  public function board_info_not_like_update($seq, $b_seq, $today){ //상세보기 게시글의 싫어요를 실행했을떄 해당 데이터가 기존에 없으면 update 작업
    $sql = "UPDATE tbl_board_like 
            SET like_status = 'N' , regdt = '".$this->db->escape_str($today)."'
              WHERE member_seq = '".$this->db->escape_str($seq)."' 
                AND board_seq = '".$this->db->escape_str($b_seq)."'";

    return $this->db->query($sql);
  }

  // *********************************************************************************************
  
  public function board_insert($arr){  // 보드에 새로운 게시글 등록 insert 작업
    $sql = "INSERT INTO tbl_board_info (member_seq, title, content) 
            VALUES ('".$this->db->escape_str($arr['seq'])."','".$this->db->escape_str($arr['title'])."','".$this->db->escape_str($arr['content'])."')";

    $this->db->query($sql);
    return $this->db->insert_id();
  }

  public function board_file_insert($b_seq, $file_url, $orig_file_name, $user_file_name ){  // 게시글 첨부 파일 insert 작업
    $sql = "INSERT INTO tbl_file (board_seq, origin_filename, file_url, user_filename) 
            VALUES (".$this->db->escape_str($b_seq).",
                    '".$this->db->escape_str($orig_file_name)."',
                    '".$this->db->escape_str($file_url)."' ,
                    '".$this->db->escape_str($user_file_name)."')";

    return $this->db->query($sql);
  }

  public function board_file_update($b_seq){ // file insert 작업이 실행되면 해당 게시글 테이블의 파일 유무 업데이트 작업
    $sql = "UPDATE tbl_board_info 
            SET is_file  = 'Y' 
            WHERE seq = ".$this->db->escape_str($b_seq)." ";

    $this->db->query($sql);
  }



  // ***********************************************************************************************














































  public function revise_board_select($b_seq, $seq){ // 글 수정 페이지에 수정할 글 출력 select 작업 
    $sql = "SELECT tbi.seq,
                  tbi.member_seq ,
                  tbi.title ,
                  tbi.content ,
                  tbi.is_adult ,
                  tbi.is_file ,
                  tbi.regdt ,
                  tf.board_seq , 
                  tf.file_url , 
                  tf.origin_filename ,
                  tf.user_filename 
            FROM tbl_board_info tbi 
            LEFT OUTER JOIN (SELECT tf.seq,
                                    tf.board_seq,
                                    tf.file_url,
                                    tf.origin_filename,
                                    tf.user_filename,
                                    tf.status
                              FROM tbl_file tf
                              WHERE tf.status = 'Y') tf ON tf.board_seq = tbi.seq 
            WHERE tbi.seq =  ".$this->db->escape_str($b_seq)."
              AND tbi.member_seq = ".$this->db->escape_str($seq)." ";

    return $this->db->query($sql);
  }

  public function revise_update($seq, $b_seq, $title, $content){ // 글 수정 페이지에서 수정하기를 실행 할경우 
    $sql = "UPDATE tbl_board_info 
            SET title = '".$this->db->escape_str($title)."', content = '".$this->db->escape_str($content)."' 
              WHERE seq = ".$this->db->escape_str($b_seq)." 
                AND member_seq = ".$this->db->escape_str($seq)."";

    return $this->db->query($sql);
  }

  public function get_like_or_dislike_cnt($b_seq, $seq) {   //like or dislike 가져오기 
    $sql = "SELECT tbi.like_count,
                    tbi.dislike_count,
                    IFNULL(tbl.like_status, 'x') AS like_status
            FROM tbl_board_info tbi 
            LEFT OUTER join (SELECT tbl.board_seq,
                                    tbl.like_status AS like_status
                            FROM tbl_board_like tbl
                            WHERE tbl.member_seq = ".$this->db->escape_str($seq)."
                              AND tbl.board_seq = ".$this->db->escape_str($b_seq)." ) tbl ON tbl.board_seq = tbi.seq
            WHERE tbi.seq = ".$this->db->escape_str($b_seq)." ";
    return $this->db->query($sql);            
  }
  
    public function board_info_like_insert($b_seq, $seq, $type){ // 상세보기 게시글의 좋아요 테이블에 해당 게시글 seq 와 유저 seq 가 없을경우 insert 작업
      $sql = "INSERT INTO tbl_board_like (board_seq, member_seq, like_status) 
              VALUES ('".$this->db->escape_str($b_seq)."','".$this->db->escape_str($seq)."' , '".$this->db->escape_str($type)."')";
  
      return $this->db->query($sql);
    }

  public function borad_cnt_update($b_seq, $status, $cnt, $opposit_status = '', $opposit_cnt = -1){ // 좋아요 or 싫어요가 눌러진 상태에서 다른 값을 눌렀을 경우 원래 해당되는 값 -1 현재 눌러진 값+1 
    $sql = "UPDATE tbl_board_info SET ".$status." = ".$this->db->escape_str($cnt)." ";
    if( $opposit_cnt != -1 && !empty($opposit_status) ){
      $sql .= " , {$opposit_status} = ".$opposit_cnt." ";
    }
    $sql .= " WHERE seq = ".$this->db->escape_str($b_seq)." ";
    $this->db->query($sql);            
  }

  public function delete_board_like_or_dislike_cnt($b_seq, $seq){ //좋아요나 싫어요를 이미 누른 상태에서 같은 값을 눌렀을 경우 실행 해당 게시글의 좋아요 or 싫어요 데이터 삭제
    $sql = "DELETE FROM tbl_board_like 
            WHERE board_seq = ".$this->db->escape_str($b_seq)."
              AND member_seq = {$seq}";
    $this->db->query($sql);            
  }

  public function update_like_or_dislike_cnt($b_seq, $seq, $type){  // 좋아요 or 싫어요를 이미 누른 상태에서 반대 속성을 눌렀을경우 update 작업
    $sql = "UPDATE tbl_board_like SET like_status = '".$this->db->escape_str($type)."' , regdt = NOW()
            WHERE board_seq = ".$this->db->escape_str($b_seq)." 
              AND member_seq = {$seq} ";

    $this->db->query($sql);
    }

  public function stor_check_select($seq, $b_seq){ // stor_tbl 찜 목록 테이블에 해당 유저의 seq 와 board seq 가 있는지 확인
    $sql = "SELECT tbi.seq,
                  tbi.member_seq ,
                  IFNULL(ts.member_seq ,'x') AS 'ts.member_seq' ,
                  IFNULL(ts.status, 'x') AS 'ts.status' 
            FROM tbl_board_info tbi 
            LEFT OUTER JOIN(SELECT ts.board_seq,
                                  ts.member_seq,
                                  ts.status
                            FROM tbl_stor ts
                            WHERE ts.member_seq = ".$this->db->escape_str($seq)."
                              AND ts.board_seq = ".$this->db->escape_str($b_seq).") ts ON ts.board_seq = tbi.seq
            WHERE tbi.member_seq = ".$this->db->escape_str($seq)." 
              AND tbi.seq = ".$this->db->escape_str($b_seq)." ";

    return $this->db->query($sql);
  }

  public function stor_update($seq, $b_seq, $type){ // 찜하기 테이블 stot_tbl 에 insert 작업
    switch ($type){
      case 'Y' :
        $sql = "INSERT INTO tbl_stor (board_seq, member_seq, status) 
                VALUES(".$this->db->escape_str($b_seq).", ".$this->db->escape_str($seq).", '".$this->db->escape_str($type)."') ";
        break;
      case 'D' :
        $sql = "DELETE FROM tbl_stor 
                WHERE seq = ".$this->db->escape_str($seq)." 
                  AND board_seq = ".$this->db->escape_str($b_seq)." ";
        break;
    }
    $this->db->query($sql);
  }
  
  public function board_cnt($per_page, $add_sql){  //페이징 을 위한 도움
    $sql = "SELECT COUNT(tbi.seq) AS 'cnt' ,
                    CEILING (CAST(COUNT(tbi.seq) AS DOUBLE) / ".$this->db->escape_str($per_page)." ) AS 'totalpage'
            FROM tbl_board_info tbi 
            WHERE tbi.status = 'Y'"
              .$add_sql;

    return $this->db->query($sql);
  }

  public function today_board_cnt($per_page, $today, $add_sql){
    $sql = "SELECT COUNT(tbi.seq) AS 'cnt' ,
                  CEILING (CAST(COUNT(tbi.seq) AS DOUBLE) / ".$this->db->escape_str($per_page)." ) AS 'totalpage'
            FROM tbl_board_info tbi 
            WHERE tbi.status = 'Y' 
              AND tbi.regdt LIKE '%".$this->db->escape_str($today)."%'"
                .$add_sql;

    return $this->db->query($sql);
  }

  public function stor_board_cnt($per_page, $seq, $add_sql){
    $sql = "SELECT  COUNT(ts.seq) AS 'cnt',
                    CEILING (CAST(COUNT(tbi.seq) AS DOUBLE) / ".$this->db->escape_str($per_page).") AS 'totalpage'
            FROM tbl_stor ts 
            LEFT OUTER JOIN(SELECT tbi.seq, 
                                   tbi.status ,
                                   tbi.title
                            FROM tbl_board_info tbi
                            WHERE tbi.status = 'Y') tbi ON tbi.seq = ts.board_seq 
            WHERE ts.status = 'Y'
              AND ts.member_seq = ".$this->db->escape_str($seq)."  "
                .$add_sql;

    return $this->db->query($sql);
  }

  public function my_board_cnt($per_page, $seq, $add_sql){
    $sql = "SELECT COUNT(tbi.seq) AS 'cnt' ,
                  CEILING (CAST(COUNT(tbi.seq) AS DOUBLE) / ".$this->db->escape_str($per_page)." ) AS 'totalpage'
            FROM tbl_board_info tbi 
            WHERE tbi.status = 'Y' 
              AND tbi.member_seq = ".$this->db->escape_str($seq)." "
                .$add_sql;
    
    return $this->db->query($sql);
  }

  // ------------------------------------------------------------------------------------------


  public function replay_select($b_seq){ //해당 게시글의 댓글 출력
    $sql = "SELECT tr.seq,
                  tr.member_seq,
                  tm.seq AS m_seq,
                  tm.nickname ,
                  tr.board_seq ,
                  tr.content ,
                  tr.status ,
                  tr.regdt 
            FROM tbl_reply tr 
            LEFT OUTER join(SELECT tm.seq,
                                  tm.nickname 
                            FROM tbl_member tm ) tm ON tm.seq = tr.member_seq 
            WHERE tr.status <>'D' 
              AND tr.board_seq = ".$this->db->escape_str($b_seq)." 
                ORDER BY seq DESC";
    return $this->db->query($sql);
  }

  public function member_info_select($seq){ // 로그인한 현재 member의 info select 작업
    $sql = "SELECT tm.id,
                    tm.email ,
                    tm.nickname ,
                    tm.regdt 
                FROM tbl_member tm 
                WHERE seq = ".$this->db->escape_str($seq)." ";

    return $this->db->query($sql);
  }

  public function member_check($seq){ // 프로필 페이지에서 회원 탈퇴를 실행했을 경우
    $sql = "SELECT tm.seq,
                  tm.id,
                  tm.pw ,
                  tm.nickname ,
                  tm.status 
            FROM tbl_member tm 
            WHERE seq = ".$this->db->escape_str($seq)." ";

    return $this->db->query($sql);
  }

  public function member_delete($seq, $user_id, $user_pwd){ //회원 탈퇴할경우 작업
    $sql = "UPDATE tbl_member 
            SET status = 'D' 
            WHERE seq = ".$this->db->escape_str($seq)."
              AND id = '".$this->db->escape_str($user_id)."' 
              AND pw = '".$this->db->escape_str($user_pwd)."' ";

    $this->db->query($sql);
  }

}