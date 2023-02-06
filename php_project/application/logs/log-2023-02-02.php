<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-02-02 07:25:28 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-02 07:25:34 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-02 07:29:48 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-02 07:29:50 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-02 07:50:11 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-02 08:19:52 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-02 08:38:51 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-02 08:38:54 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-02 08:44:52 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-02 08:44:54 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-02 08:44:56 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-02 08:46:45 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-02 08:47:07 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-02 08:52:56 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-02 09:23:59 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-02 09:24:01 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-02 09:24:01 --> 404 Page Not Found: Ppms_img/ppms_icon
ERROR - 2023-02-02 09:28:11 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-02 09:28:13 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-02 09:28:18 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-02 09:28:19 --> Query error: Unknown column 'ppms_img' in 'where clause' - Invalid query: SELECT tbi.seq,
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
            WHERE tbi.seq =  ppms_img
              AND tbi.member_seq = 1 
ERROR - 2023-02-02 09:44:14 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-02 09:48:02 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-02 09:48:05 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-02 09:48:41 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-02 09:48:47 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-02 09:48:53 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-02 09:48:59 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-02 09:48:59 --> 404 Page Not Found: Ppms_img/ppms_icon
ERROR - 2023-02-02 09:49:05 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-02 09:49:14 --> 404 Page Not Found: Assets/js
ERROR - 2023-02-02 09:49:26 --> 404 Page Not Found: Assets/js
