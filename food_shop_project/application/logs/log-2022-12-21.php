<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2022-12-21 05:54:49 --> Severity: Notice --> Undefined variable: board_list D:\php_young_project\food_shop_project\application\views\pages\main_stor_page.php 244
ERROR - 2022-12-21 05:54:49 --> Severity: Warning --> Invalid argument supplied for foreach() D:\php_young_project\food_shop_project\application\views\pages\main_stor_page.php 244
ERROR - 2022-12-21 05:54:49 --> Severity: Notice --> Undefined variable: pagination D:\php_young_project\food_shop_project\application\views\pages\main_stor_page.php 288
ERROR - 2022-12-21 05:54:50 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 05:54:54 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 05:56:22 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 05:56:40 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 05:56:47 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 05:56:50 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 05:56:53 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:04:19 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:04:46 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:04:49 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:05:06 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:05:08 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:05:10 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:07:29 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:07:31 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:08:13 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:08:14 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:08:37 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:09:02 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:09:02 --> 404 Page Not Found: Ppms_img/ppms_icon
ERROR - 2022-12-21 06:09:14 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:09:24 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:09:27 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:09:30 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:09:32 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:09:35 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:15:26 --> Severity: error --> Exception: Too few arguments to function Main_model::board_list_select(), 2 passed in D:\php_young_project\food_shop_project\application\controllers\Main.php on line 68 and exactly 3 expected D:\php_young_project\food_shop_project\application\models\Main_model.php 80
ERROR - 2022-12-21 06:16:02 --> Severity: Notice --> Undefined variable: add_sql D:\php_young_project\food_shop_project\application\controllers\Main.php 65
ERROR - 2022-12-21 06:16:02 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:17:47 --> Severity: Notice --> Undefined variable: add_sql D:\php_young_project\food_shop_project\application\controllers\Main.php 65
ERROR - 2022-12-21 06:17:47 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:17:56 --> Severity: error --> Exception: Too few arguments to function Main_model::board_list_select(), 2 passed in D:\php_young_project\food_shop_project\application\controllers\Main.php on line 65 and exactly 3 expected D:\php_young_project\food_shop_project\application\models\Main_model.php 80
ERROR - 2022-12-21 06:18:04 --> Severity: error --> Exception: Too few arguments to function Main_model::board_list_select(), 2 passed in D:\php_young_project\food_shop_project\application\controllers\Main.php on line 65 and exactly 3 expected D:\php_young_project\food_shop_project\application\models\Main_model.php 80
ERROR - 2022-12-21 06:18:05 --> Severity: error --> Exception: Too few arguments to function Main_model::board_list_select(), 2 passed in D:\php_young_project\food_shop_project\application\controllers\Main.php on line 65 and exactly 3 expected D:\php_young_project\food_shop_project\application\models\Main_model.php 80
ERROR - 2022-12-21 06:18:05 --> Severity: error --> Exception: Too few arguments to function Main_model::board_list_select(), 2 passed in D:\php_young_project\food_shop_project\application\controllers\Main.php on line 65 and exactly 3 expected D:\php_young_project\food_shop_project\application\models\Main_model.php 80
ERROR - 2022-12-21 06:18:06 --> Severity: error --> Exception: Too few arguments to function Main_model::board_list_select(), 2 passed in D:\php_young_project\food_shop_project\application\controllers\Main.php on line 65 and exactly 3 expected D:\php_young_project\food_shop_project\application\models\Main_model.php 80
ERROR - 2022-12-21 06:18:13 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:18:21 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:18:26 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:19:43 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '\'%21%\'' at line 15 - Invalid query: SELECT tbi.seq AS b_seq,
                   tbi.member_seq ,
                   tm.nickname AS b_nickname,
                   tbi.title ,
                   tbi.content ,
                   tbi.like_count ,
                   tbi.dislike_count ,
                   tbi.is_adult ,
                   tbi.view_cnt ,
                   DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'tbi.regdt'
            FROM tbl_board_info tbi 
            INNER JOIN (SELECT tm.seq ,
                               tm.nickname 
                        FROM tbl_member tm) tm ON tm.seq = tbi.member_seq 
            WHERE tbi.status = 'Y'  AND tbi.title LIKE \'%21%\' 
ERROR - 2022-12-21 06:21:11 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '\'% 21 %\'' at line 15 - Invalid query: SELECT tbi.seq AS b_seq,
                   tbi.member_seq ,
                   tm.nickname AS b_nickname,
                   tbi.title ,
                   tbi.content ,
                   tbi.like_count ,
                   tbi.dislike_count ,
                   tbi.is_adult ,
                   tbi.view_cnt ,
                   DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'tbi.regdt'
            FROM tbl_board_info tbi 
            INNER JOIN (SELECT tm.seq ,
                               tm.nickname 
                        FROM tbl_member tm) tm ON tm.seq = tbi.member_seq 
            WHERE tbi.status = 'Y'  AND tbi.title LIKE \'% 21 %\' 
ERROR - 2022-12-21 06:21:12 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '\'% 21 %\'' at line 15 - Invalid query: SELECT tbi.seq AS b_seq,
                   tbi.member_seq ,
                   tm.nickname AS b_nickname,
                   tbi.title ,
                   tbi.content ,
                   tbi.like_count ,
                   tbi.dislike_count ,
                   tbi.is_adult ,
                   tbi.view_cnt ,
                   DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'tbi.regdt'
            FROM tbl_board_info tbi 
            INNER JOIN (SELECT tm.seq ,
                               tm.nickname 
                        FROM tbl_member tm) tm ON tm.seq = tbi.member_seq 
            WHERE tbi.status = 'Y'  AND tbi.title LIKE \'% 21 %\' 
ERROR - 2022-12-21 06:21:24 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '\'%21%\'' at line 15 - Invalid query: SELECT tbi.seq AS b_seq,
                   tbi.member_seq ,
                   tm.nickname AS b_nickname,
                   tbi.title ,
                   tbi.content ,
                   tbi.like_count ,
                   tbi.dislike_count ,
                   tbi.is_adult ,
                   tbi.view_cnt ,
                   DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'tbi.regdt'
            FROM tbl_board_info tbi 
            INNER JOIN (SELECT tm.seq ,
                               tm.nickname 
                        FROM tbl_member tm) tm ON tm.seq = tbi.member_seq 
            WHERE tbi.status = 'Y'  AND tbi.title LIKE \'%21%\' 
ERROR - 2022-12-21 06:24:46 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:24:48 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:24:48 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:24:49 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:24:52 --> Severity: error --> Exception: Object of class CI_DB_mysqli_driver could not be converted to string D:\php_young_project\food_shop_project\application\controllers\Main.php 39
ERROR - 2022-12-21 06:25:36 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '%21%' at line 15 - Invalid query: SELECT tbi.seq AS b_seq,
                   tbi.member_seq ,
                   tm.nickname AS b_nickname,
                   tbi.title ,
                   tbi.content ,
                   tbi.like_count ,
                   tbi.dislike_count ,
                   tbi.is_adult ,
                   tbi.view_cnt ,
                   DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'tbi.regdt'
            FROM tbl_board_info tbi 
            INNER JOIN (SELECT tm.seq ,
                               tm.nickname 
                        FROM tbl_member tm) tm ON tm.seq = tbi.member_seq 
            WHERE tbi.status = 'Y'  AND tbi.title LIKE %21% 
ERROR - 2022-12-21 06:25:56 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '\'%21%\'' at line 15 - Invalid query: SELECT tbi.seq AS b_seq,
                   tbi.member_seq ,
                   tm.nickname AS b_nickname,
                   tbi.title ,
                   tbi.content ,
                   tbi.like_count ,
                   tbi.dislike_count ,
                   tbi.is_adult ,
                   tbi.view_cnt ,
                   DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'tbi.regdt'
            FROM tbl_board_info tbi 
            INNER JOIN (SELECT tm.seq ,
                               tm.nickname 
                        FROM tbl_member tm) tm ON tm.seq = tbi.member_seq 
            WHERE tbi.status = 'Y'  AND tbi.title LIKE \'%21%\' 
ERROR - 2022-12-21 06:26:03 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '%21%' at line 15 - Invalid query: SELECT tbi.seq AS b_seq,
                   tbi.member_seq ,
                   tm.nickname AS b_nickname,
                   tbi.title ,
                   tbi.content ,
                   tbi.like_count ,
                   tbi.dislike_count ,
                   tbi.is_adult ,
                   tbi.view_cnt ,
                   DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'tbi.regdt'
            FROM tbl_board_info tbi 
            INNER JOIN (SELECT tm.seq ,
                               tm.nickname 
                        FROM tbl_member tm) tm ON tm.seq = tbi.member_seq 
            WHERE tbi.status = 'Y'  AND tbi.title LIKE %21% 
ERROR - 2022-12-21 06:26:31 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '\'%21%\'' at line 15 - Invalid query: SELECT tbi.seq AS b_seq,
                   tbi.member_seq ,
                   tm.nickname AS b_nickname,
                   tbi.title ,
                   tbi.content ,
                   tbi.like_count ,
                   tbi.dislike_count ,
                   tbi.is_adult ,
                   tbi.view_cnt ,
                   DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'tbi.regdt'
            FROM tbl_board_info tbi 
            INNER JOIN (SELECT tm.seq ,
                               tm.nickname 
                        FROM tbl_member tm) tm ON tm.seq = tbi.member_seq 
            WHERE tbi.status = 'Y'  AND tbi.title LIKE \'%21%\' 
ERROR - 2022-12-21 06:27:51 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '\'%21%\'' at line 15 - Invalid query: SELECT tbi.seq AS b_seq,
                   tbi.member_seq ,
                   tm.nickname AS b_nickname,
                   tbi.title ,
                   tbi.content ,
                   tbi.like_count ,
                   tbi.dislike_count ,
                   tbi.is_adult ,
                   tbi.view_cnt ,
                   DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'tbi.regdt'
            FROM tbl_board_info tbi 
            INNER JOIN (SELECT tm.seq ,
                               tm.nickname 
                        FROM tbl_member tm) tm ON tm.seq = tbi.member_seq 
            WHERE tbi.status = 'Y'  AND tbi.title LIKE\'%21%\' 
ERROR - 2022-12-21 06:27:51 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '\'%21%\'' at line 15 - Invalid query: SELECT tbi.seq AS b_seq,
                   tbi.member_seq ,
                   tm.nickname AS b_nickname,
                   tbi.title ,
                   tbi.content ,
                   tbi.like_count ,
                   tbi.dislike_count ,
                   tbi.is_adult ,
                   tbi.view_cnt ,
                   DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'tbi.regdt'
            FROM tbl_board_info tbi 
            INNER JOIN (SELECT tm.seq ,
                               tm.nickname 
                        FROM tbl_member tm) tm ON tm.seq = tbi.member_seq 
            WHERE tbi.status = 'Y'  AND tbi.title LIKE\'%21%\' 
ERROR - 2022-12-21 06:27:52 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '\'%21%\'' at line 15 - Invalid query: SELECT tbi.seq AS b_seq,
                   tbi.member_seq ,
                   tm.nickname AS b_nickname,
                   tbi.title ,
                   tbi.content ,
                   tbi.like_count ,
                   tbi.dislike_count ,
                   tbi.is_adult ,
                   tbi.view_cnt ,
                   DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'tbi.regdt'
            FROM tbl_board_info tbi 
            INNER JOIN (SELECT tm.seq ,
                               tm.nickname 
                        FROM tbl_member tm) tm ON tm.seq = tbi.member_seq 
            WHERE tbi.status = 'Y'  AND tbi.title LIKE\'%21%\' 
ERROR - 2022-12-21 06:27:57 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '\'%21%\'' at line 15 - Invalid query: SELECT tbi.seq AS b_seq,
                   tbi.member_seq ,
                   tm.nickname AS b_nickname,
                   tbi.title ,
                   tbi.content ,
                   tbi.like_count ,
                   tbi.dislike_count ,
                   tbi.is_adult ,
                   tbi.view_cnt ,
                   DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'tbi.regdt'
            FROM tbl_board_info tbi 
            INNER JOIN (SELECT tm.seq ,
                               tm.nickname 
                        FROM tbl_member tm) tm ON tm.seq = tbi.member_seq 
            WHERE tbi.status = 'Y'  AND tbi.title LIKE \'%21%\' 
ERROR - 2022-12-21 06:28:01 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '\'%21%\'' at line 15 - Invalid query: SELECT tbi.seq AS b_seq,
                   tbi.member_seq ,
                   tm.nickname AS b_nickname,
                   tbi.title ,
                   tbi.content ,
                   tbi.like_count ,
                   tbi.dislike_count ,
                   tbi.is_adult ,
                   tbi.view_cnt ,
                   DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'tbi.regdt'
            FROM tbl_board_info tbi 
            INNER JOIN (SELECT tm.seq ,
                               tm.nickname 
                        FROM tbl_member tm) tm ON tm.seq = tbi.member_seq 
            WHERE tbi.status = 'Y'  AND tbi.title LIKE\'%21%\' 
ERROR - 2022-12-21 06:28:04 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '\'%21%\'' at line 15 - Invalid query: SELECT tbi.seq AS b_seq,
                   tbi.member_seq ,
                   tm.nickname AS b_nickname,
                   tbi.title ,
                   tbi.content ,
                   tbi.like_count ,
                   tbi.dislike_count ,
                   tbi.is_adult ,
                   tbi.view_cnt ,
                   DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'tbi.regdt'
            FROM tbl_board_info tbi 
            INNER JOIN (SELECT tm.seq ,
                               tm.nickname 
                        FROM tbl_member tm) tm ON tm.seq = tbi.member_seq 
            WHERE tbi.status = 'Y'  AND tbi.title LIKE \'%21%\' 
ERROR - 2022-12-21 06:28:06 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '%21%\'' at line 15 - Invalid query: SELECT tbi.seq AS b_seq,
                   tbi.member_seq ,
                   tm.nickname AS b_nickname,
                   tbi.title ,
                   tbi.content ,
                   tbi.like_count ,
                   tbi.dislike_count ,
                   tbi.is_adult ,
                   tbi.view_cnt ,
                   DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'tbi.regdt'
            FROM tbl_board_info tbi 
            INNER JOIN (SELECT tm.seq ,
                               tm.nickname 
                        FROM tbl_member tm) tm ON tm.seq = tbi.member_seq 
            WHERE tbi.status = 'Y'  AND tbi.title LIKE %21%\' 
ERROR - 2022-12-21 06:28:12 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '%21%' at line 15 - Invalid query: SELECT tbi.seq AS b_seq,
                   tbi.member_seq ,
                   tm.nickname AS b_nickname,
                   tbi.title ,
                   tbi.content ,
                   tbi.like_count ,
                   tbi.dislike_count ,
                   tbi.is_adult ,
                   tbi.view_cnt ,
                   DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'tbi.regdt'
            FROM tbl_board_info tbi 
            INNER JOIN (SELECT tm.seq ,
                               tm.nickname 
                        FROM tbl_member tm) tm ON tm.seq = tbi.member_seq 
            WHERE tbi.status = 'Y'  AND tbi.title LIKE %21% 
ERROR - 2022-12-21 06:28:49 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '% 21 %' at line 15 - Invalid query: SELECT tbi.seq AS b_seq,
                   tbi.member_seq ,
                   tm.nickname AS b_nickname,
                   tbi.title ,
                   tbi.content ,
                   tbi.like_count ,
                   tbi.dislike_count ,
                   tbi.is_adult ,
                   tbi.view_cnt ,
                   DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'tbi.regdt'
            FROM tbl_board_info tbi 
            INNER JOIN (SELECT tm.seq ,
                               tm.nickname 
                        FROM tbl_member tm) tm ON tm.seq = tbi.member_seq 
            WHERE tbi.status = 'Y'  AND tbi.title LIKE  % 21 % 
ERROR - 2022-12-21 06:31:02 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '% 21 %' at line 15 - Invalid query: SELECT tbi.seq AS b_seq,
                   tbi.member_seq ,
                   tm.nickname AS b_nickname,
                   tbi.title ,
                   tbi.content ,
                   tbi.like_count ,
                   tbi.dislike_count ,
                   tbi.is_adult ,
                   tbi.view_cnt ,
                   DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'tbi.regdt'
            FROM tbl_board_info tbi 
            INNER JOIN (SELECT tm.seq ,
                               tm.nickname 
                        FROM tbl_member tm) tm ON tm.seq = tbi.member_seq 
            WHERE tbi.status = 'Y'  AND tbi.title LIKE  % 21 % 
ERROR - 2022-12-21 06:31:02 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '% 21 %' at line 15 - Invalid query: SELECT tbi.seq AS b_seq,
                   tbi.member_seq ,
                   tm.nickname AS b_nickname,
                   tbi.title ,
                   tbi.content ,
                   tbi.like_count ,
                   tbi.dislike_count ,
                   tbi.is_adult ,
                   tbi.view_cnt ,
                   DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'tbi.regdt'
            FROM tbl_board_info tbi 
            INNER JOIN (SELECT tm.seq ,
                               tm.nickname 
                        FROM tbl_member tm) tm ON tm.seq = tbi.member_seq 
            WHERE tbi.status = 'Y'  AND tbi.title LIKE  % 21 % 
ERROR - 2022-12-21 06:31:07 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '21' at line 15 - Invalid query: SELECT tbi.seq AS b_seq,
                   tbi.member_seq ,
                   tm.nickname AS b_nickname,
                   tbi.title ,
                   tbi.content ,
                   tbi.like_count ,
                   tbi.dislike_count ,
                   tbi.is_adult ,
                   tbi.view_cnt ,
                   DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'tbi.regdt'
            FROM tbl_board_info tbi 
            INNER JOIN (SELECT tm.seq ,
                               tm.nickname 
                        FROM tbl_member tm) tm ON tm.seq = tbi.member_seq 
            WHERE tbi.status = 'Y' 21
ERROR - 2022-12-21 06:31:08 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '21' at line 15 - Invalid query: SELECT tbi.seq AS b_seq,
                   tbi.member_seq ,
                   tm.nickname AS b_nickname,
                   tbi.title ,
                   tbi.content ,
                   tbi.like_count ,
                   tbi.dislike_count ,
                   tbi.is_adult ,
                   tbi.view_cnt ,
                   DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'tbi.regdt'
            FROM tbl_board_info tbi 
            INNER JOIN (SELECT tm.seq ,
                               tm.nickname 
                        FROM tbl_member tm) tm ON tm.seq = tbi.member_seq 
            WHERE tbi.status = 'Y' 21
ERROR - 2022-12-21 06:31:09 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '21' at line 15 - Invalid query: SELECT tbi.seq AS b_seq,
                   tbi.member_seq ,
                   tm.nickname AS b_nickname,
                   tbi.title ,
                   tbi.content ,
                   tbi.like_count ,
                   tbi.dislike_count ,
                   tbi.is_adult ,
                   tbi.view_cnt ,
                   DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'tbi.regdt'
            FROM tbl_board_info tbi 
            INNER JOIN (SELECT tm.seq ,
                               tm.nickname 
                        FROM tbl_member tm) tm ON tm.seq = tbi.member_seq 
            WHERE tbi.status = 'Y' 21
ERROR - 2022-12-21 06:31:09 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '21' at line 15 - Invalid query: SELECT tbi.seq AS b_seq,
                   tbi.member_seq ,
                   tm.nickname AS b_nickname,
                   tbi.title ,
                   tbi.content ,
                   tbi.like_count ,
                   tbi.dislike_count ,
                   tbi.is_adult ,
                   tbi.view_cnt ,
                   DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'tbi.regdt'
            FROM tbl_board_info tbi 
            INNER JOIN (SELECT tm.seq ,
                               tm.nickname 
                        FROM tbl_member tm) tm ON tm.seq = tbi.member_seq 
            WHERE tbi.status = 'Y' 21
ERROR - 2022-12-21 06:31:10 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '21' at line 15 - Invalid query: SELECT tbi.seq AS b_seq,
                   tbi.member_seq ,
                   tm.nickname AS b_nickname,
                   tbi.title ,
                   tbi.content ,
                   tbi.like_count ,
                   tbi.dislike_count ,
                   tbi.is_adult ,
                   tbi.view_cnt ,
                   DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'tbi.regdt'
            FROM tbl_board_info tbi 
            INNER JOIN (SELECT tm.seq ,
                               tm.nickname 
                        FROM tbl_member tm) tm ON tm.seq = tbi.member_seq 
            WHERE tbi.status = 'Y' 21
ERROR - 2022-12-21 06:31:10 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '21' at line 15 - Invalid query: SELECT tbi.seq AS b_seq,
                   tbi.member_seq ,
                   tm.nickname AS b_nickname,
                   tbi.title ,
                   tbi.content ,
                   tbi.like_count ,
                   tbi.dislike_count ,
                   tbi.is_adult ,
                   tbi.view_cnt ,
                   DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'tbi.regdt'
            FROM tbl_board_info tbi 
            INNER JOIN (SELECT tm.seq ,
                               tm.nickname 
                        FROM tbl_member tm) tm ON tm.seq = tbi.member_seq 
            WHERE tbi.status = 'Y' 21
ERROR - 2022-12-21 06:31:51 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:31:53 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:31:54 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:31:57 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:32:00 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:32:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near ''%21%' at line 15 - Invalid query: SELECT tbi.seq AS b_seq,
                   tbi.member_seq ,
                   tm.nickname AS b_nickname,
                   tbi.title ,
                   tbi.content ,
                   tbi.like_count ,
                   tbi.dislike_count ,
                   tbi.is_adult ,
                   tbi.view_cnt ,
                   DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'tbi.regdt'
            FROM tbl_board_info tbi 
            INNER JOIN (SELECT tm.seq ,
                               tm.nickname 
                        FROM tbl_member tm) tm ON tm.seq = tbi.member_seq 
            WHERE tbi.status = 'Y' AND tbi.title LIKE '%21% 
ERROR - 2022-12-21 06:32:54 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:32:58 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:33:05 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:33:07 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:33:18 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:33:23 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:33:27 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:33:30 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:34:22 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:34:23 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:34:26 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:34:33 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:34:36 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:35:19 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:35:22 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:35:28 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:35:37 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:35:41 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:36:06 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:36:08 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:36:13 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:36:16 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:38:46 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:38:47 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:38:49 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:45:49 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '%123% ORDER BY tbi.regdt DESC LIMIT 0 , 10' at line 15 - Invalid query: SELECT tbi.seq AS b_seq,
                   tbi.member_seq ,
                   tm.nickname AS b_nickname,
                   tbi.title ,
                   tbi.content ,
                   tbi.like_count ,
                   tbi.dislike_count ,
                   tbi.is_adult ,
                   tbi.view_cnt ,
                   DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'tbi.regdt'
            FROM tbl_board_info tbi 
            INNER JOIN (SELECT tm.seq ,
                               tm.nickname 
                        FROM tbl_member tm) tm ON tm.seq = tbi.member_seq 
            WHERE tbi.status = 'Y'  AND tbi.title LIKE  %123% ORDER BY tbi.regdt DESC LIMIT 0 , 10 
ERROR - 2022-12-21 06:45:50 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '%123% ORDER BY tbi.regdt DESC LIMIT 0 , 10' at line 15 - Invalid query: SELECT tbi.seq AS b_seq,
                   tbi.member_seq ,
                   tm.nickname AS b_nickname,
                   tbi.title ,
                   tbi.content ,
                   tbi.like_count ,
                   tbi.dislike_count ,
                   tbi.is_adult ,
                   tbi.view_cnt ,
                   DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'tbi.regdt'
            FROM tbl_board_info tbi 
            INNER JOIN (SELECT tm.seq ,
                               tm.nickname 
                        FROM tbl_member tm) tm ON tm.seq = tbi.member_seq 
            WHERE tbi.status = 'Y'  AND tbi.title LIKE  %123% ORDER BY tbi.regdt DESC LIMIT 0 , 10 
ERROR - 2022-12-21 06:46:07 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:46:08 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:46:11 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:46:14 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:46:17 --> Severity: Notice --> Undefined variable: add_sql D:\php_young_project\food_shop_project\application\controllers\Main.php 65
ERROR - 2022-12-21 06:46:17 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:46:21 --> Severity: Notice --> Undefined variable: add_sql D:\php_young_project\food_shop_project\application\controllers\Main.php 65
ERROR - 2022-12-21 06:46:21 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:46:50 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:46:53 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:46:56 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:47:37 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:47:40 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:47:44 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:47:46 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:47:48 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:51:44 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:51:51 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:52:03 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:52:06 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:52:14 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:52:15 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:52:17 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:52:23 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:52:44 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:52:52 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:54:34 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:54:38 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:58:09 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 06:58:12 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '-15 , 15' at line 15 - Invalid query: SELECT tbi.seq AS b_seq,
                   tbi.member_seq ,
                   tm.nickname AS b_nickname,
                   tbi.title ,
                   tbi.content ,
                   tbi.like_count ,
                   tbi.dislike_count ,
                   tbi.is_adult ,
                   tbi.view_cnt ,
                   DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'tbi.regdt'
            FROM tbl_board_info tbi 
            INNER JOIN (SELECT tm.seq ,
                               tm.nickname 
                        FROM tbl_member tm) tm ON tm.seq = tbi.member_seq 
            WHERE tbi.status = 'Y' ORDER BY tbi.regdt DESC LIMIT -15 , 15 
ERROR - 2022-12-21 06:58:13 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '-15 , 15' at line 15 - Invalid query: SELECT tbi.seq AS b_seq,
                   tbi.member_seq ,
                   tm.nickname AS b_nickname,
                   tbi.title ,
                   tbi.content ,
                   tbi.like_count ,
                   tbi.dislike_count ,
                   tbi.is_adult ,
                   tbi.view_cnt ,
                   DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'tbi.regdt'
            FROM tbl_board_info tbi 
            INNER JOIN (SELECT tm.seq ,
                               tm.nickname 
                        FROM tbl_member tm) tm ON tm.seq = tbi.member_seq 
            WHERE tbi.status = 'Y' ORDER BY tbi.regdt DESC LIMIT -15 , 15 
ERROR - 2022-12-21 06:58:37 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '-15 , 15' at line 15 - Invalid query: SELECT tbi.seq AS b_seq,
                   tbi.member_seq ,
                   tm.nickname AS b_nickname,
                   tbi.title ,
                   tbi.content ,
                   tbi.like_count ,
                   tbi.dislike_count ,
                   tbi.is_adult ,
                   tbi.view_cnt ,
                   DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'tbi.regdt'
            FROM tbl_board_info tbi 
            INNER JOIN (SELECT tm.seq ,
                               tm.nickname 
                        FROM tbl_member tm) tm ON tm.seq = tbi.member_seq 
            WHERE tbi.status = 'Y' ORDER BY tbi.regdt DESC LIMIT -15 , 15 
ERROR - 2022-12-21 06:58:37 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '-15 , 15' at line 15 - Invalid query: SELECT tbi.seq AS b_seq,
                   tbi.member_seq ,
                   tm.nickname AS b_nickname,
                   tbi.title ,
                   tbi.content ,
                   tbi.like_count ,
                   tbi.dislike_count ,
                   tbi.is_adult ,
                   tbi.view_cnt ,
                   DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'tbi.regdt'
            FROM tbl_board_info tbi 
            INNER JOIN (SELECT tm.seq ,
                               tm.nickname 
                        FROM tbl_member tm) tm ON tm.seq = tbi.member_seq 
            WHERE tbi.status = 'Y' ORDER BY tbi.regdt DESC LIMIT -15 , 15 
ERROR - 2022-12-21 06:58:38 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '-15 , 15' at line 15 - Invalid query: SELECT tbi.seq AS b_seq,
                   tbi.member_seq ,
                   tm.nickname AS b_nickname,
                   tbi.title ,
                   tbi.content ,
                   tbi.like_count ,
                   tbi.dislike_count ,
                   tbi.is_adult ,
                   tbi.view_cnt ,
                   DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'tbi.regdt'
            FROM tbl_board_info tbi 
            INNER JOIN (SELECT tm.seq ,
                               tm.nickname 
                        FROM tbl_member tm) tm ON tm.seq = tbi.member_seq 
            WHERE tbi.status = 'Y' ORDER BY tbi.regdt DESC LIMIT -15 , 15 
ERROR - 2022-12-21 06:59:03 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '-15 , 15' at line 15 - Invalid query: SELECT tbi.seq AS b_seq,
                   tbi.member_seq ,
                   tm.nickname AS b_nickname,
                   tbi.title ,
                   tbi.content ,
                   tbi.like_count ,
                   tbi.dislike_count ,
                   tbi.is_adult ,
                   tbi.view_cnt ,
                   DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'tbi.regdt'
            FROM tbl_board_info tbi 
            INNER JOIN (SELECT tm.seq ,
                               tm.nickname 
                        FROM tbl_member tm) tm ON tm.seq = tbi.member_seq 
            WHERE tbi.status = 'Y' ORDER BY tbi.regdt DESC LIMIT -15 , 15 
ERROR - 2022-12-21 06:59:04 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '-15 , 15' at line 15 - Invalid query: SELECT tbi.seq AS b_seq,
                   tbi.member_seq ,
                   tm.nickname AS b_nickname,
                   tbi.title ,
                   tbi.content ,
                   tbi.like_count ,
                   tbi.dislike_count ,
                   tbi.is_adult ,
                   tbi.view_cnt ,
                   DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'tbi.regdt'
            FROM tbl_board_info tbi 
            INNER JOIN (SELECT tm.seq ,
                               tm.nickname 
                        FROM tbl_member tm) tm ON tm.seq = tbi.member_seq 
            WHERE tbi.status = 'Y' ORDER BY tbi.regdt DESC LIMIT -15 , 15 
ERROR - 2022-12-21 06:59:04 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '-15 , 15' at line 15 - Invalid query: SELECT tbi.seq AS b_seq,
                   tbi.member_seq ,
                   tm.nickname AS b_nickname,
                   tbi.title ,
                   tbi.content ,
                   tbi.like_count ,
                   tbi.dislike_count ,
                   tbi.is_adult ,
                   tbi.view_cnt ,
                   DATE_FORMAT(tbi.regdt, '%Y-%m-%d') AS 'tbi.regdt'
            FROM tbl_board_info tbi 
            INNER JOIN (SELECT tm.seq ,
                               tm.nickname 
                        FROM tbl_member tm) tm ON tm.seq = tbi.member_seq 
            WHERE tbi.status = 'Y' ORDER BY tbi.regdt DESC LIMIT -15 , 15 
ERROR - 2022-12-21 06:59:16 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:02:16 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:02:21 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:02:25 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:02:28 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:02:36 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:02:40 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:02:42 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:02:45 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:02:47 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:02:50 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:02:53 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:03:02 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:03:04 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:03:07 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:03:43 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:03:45 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:03:45 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:03:46 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:03:46 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:03:46 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:03:47 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:03:48 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:03:48 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:03:51 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:03:53 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:03:56 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:07:42 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:07:48 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:07:49 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:07:51 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:07:54 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:07:56 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:07:58 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:07:59 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:08:08 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:08:12 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:08:14 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:08:16 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:08:28 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:08:34 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:08:40 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:08:41 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:08:42 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:08:43 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:08:45 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:08:46 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:08:48 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:08:55 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:08:57 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:08:58 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:08:59 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:09:04 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:09:10 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:09:12 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:09:14 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:09:16 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:09:18 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:09:20 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:09:22 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:12:59 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:12:59 --> 404 Page Not Found: Ppms_img/ppms_icon
ERROR - 2022-12-21 07:13:09 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:13:11 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:13:15 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:13:17 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:13:50 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:16:52 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:16:56 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:17:23 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:17:26 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:17:28 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:17:32 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:22:51 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:22:53 --> 404 Page Not Found: Assets/css
ERROR - 2022-12-21 07:23:13 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:23:13 --> 404 Page Not Found: Assets/css
ERROR - 2022-12-21 07:23:15 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:23:15 --> 404 Page Not Found: Assets/css
ERROR - 2022-12-21 07:24:03 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:24:04 --> 404 Page Not Found: Assets/css
ERROR - 2022-12-21 07:24:07 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:24:07 --> 404 Page Not Found: Assets/css
ERROR - 2022-12-21 07:24:09 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:24:09 --> 404 Page Not Found: Assets/css
ERROR - 2022-12-21 07:24:28 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:24:32 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:24:34 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:24:38 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:24:40 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:26:54 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:26:55 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:26:55 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:26:57 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:26:58 --> Severity: Notice --> Undefined variable: add_sql D:\php_young_project\food_shop_project\application\controllers\Main.php 182
ERROR - 2022-12-21 07:26:58 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:27:35 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:27:37 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:27:42 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:27:45 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:27:50 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:27:52 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:27:54 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:27:57 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:27:59 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:28:03 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:28:34 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:28:38 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:28:45 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:28:48 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:28:50 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:29:53 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:29:55 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:29:59 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:30:04 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:30:07 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:30:08 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:30:19 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:30:22 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:30:24 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:30:26 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:30:27 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:30:29 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:30:30 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:30:32 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:30:35 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:30:37 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:30:38 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:30:39 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:30:40 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:30:41 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:30:42 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:30:42 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:30:42 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:30:56 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:30:58 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:31:01 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:33:20 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:33:21 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:33:21 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:33:22 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:33:23 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:33:28 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:33:31 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:33:34 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:33:37 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:33:40 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:33:43 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:33:45 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:33:47 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:47:32 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:47:35 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:47:40 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:47:43 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:47:45 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:47:50 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:47:52 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:47:53 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:57:20 --> Severity: error --> Exception: Too few arguments to function Main_model::board_cnt(), 1 passed in D:\php_young_project\food_shop_project\application\controllers\Main.php on line 115 and exactly 2 expected D:\php_young_project\food_shop_project\application\models\Main_model.php 455
ERROR - 2022-12-21 07:57:43 --> Severity: error --> Exception: Too few arguments to function Main_model::board_cnt(), 1 passed in D:\php_young_project\food_shop_project\application\controllers\Main.php on line 108 and exactly 2 expected D:\php_young_project\food_shop_project\application\models\Main_model.php 455
ERROR - 2022-12-21 07:57:44 --> Severity: error --> Exception: Too few arguments to function Main_model::board_cnt(), 1 passed in D:\php_young_project\food_shop_project\application\controllers\Main.php on line 108 and exactly 2 expected D:\php_young_project\food_shop_project\application\models\Main_model.php 455
ERROR - 2022-12-21 07:57:44 --> Severity: error --> Exception: Too few arguments to function Main_model::board_cnt(), 1 passed in D:\php_young_project\food_shop_project\application\controllers\Main.php on line 108 and exactly 2 expected D:\php_young_project\food_shop_project\application\models\Main_model.php 455
ERROR - 2022-12-21 07:57:44 --> Severity: error --> Exception: Too few arguments to function Main_model::board_cnt(), 1 passed in D:\php_young_project\food_shop_project\application\controllers\Main.php on line 108 and exactly 2 expected D:\php_young_project\food_shop_project\application\models\Main_model.php 455
ERROR - 2022-12-21 07:58:07 --> Severity: Notice --> Undefined index: cnt D:\php_young_project\food_shop_project\application\controllers\Main.php 110
ERROR - 2022-12-21 07:58:07 --> Severity: Notice --> Trying to access array offset on value of type null D:\php_young_project\food_shop_project\application\controllers\Main.php 110
ERROR - 2022-12-21 07:58:07 --> Severity: Notice --> Undefined index: cnt D:\php_young_project\food_shop_project\application\controllers\Main.php 122
ERROR - 2022-12-21 07:58:07 --> Severity: Notice --> Trying to access array offset on value of type null D:\php_young_project\food_shop_project\application\controllers\Main.php 122
ERROR - 2022-12-21 07:58:07 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:59:03 --> Severity: Notice --> Undefined index: cnt D:\php_young_project\food_shop_project\application\controllers\Main.php 122
ERROR - 2022-12-21 07:59:03 --> Severity: Notice --> Trying to access array offset on value of type null D:\php_young_project\food_shop_project\application\controllers\Main.php 122
ERROR - 2022-12-21 07:59:03 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:59:03 --> Severity: Notice --> Undefined index: cnt D:\php_young_project\food_shop_project\application\controllers\Main.php 122
ERROR - 2022-12-21 07:59:03 --> Severity: Notice --> Trying to access array offset on value of type null D:\php_young_project\food_shop_project\application\controllers\Main.php 122
ERROR - 2022-12-21 07:59:04 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:59:04 --> Severity: Notice --> Undefined index: cnt D:\php_young_project\food_shop_project\application\controllers\Main.php 122
ERROR - 2022-12-21 07:59:04 --> Severity: Notice --> Trying to access array offset on value of type null D:\php_young_project\food_shop_project\application\controllers\Main.php 122
ERROR - 2022-12-21 07:59:04 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:59:04 --> Severity: Notice --> Undefined index: cnt D:\php_young_project\food_shop_project\application\controllers\Main.php 122
ERROR - 2022-12-21 07:59:04 --> Severity: Notice --> Trying to access array offset on value of type null D:\php_young_project\food_shop_project\application\controllers\Main.php 122
ERROR - 2022-12-21 07:59:04 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:59:35 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:59:37 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:59:41 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 07:59:44 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:00:49 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:00:52 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:00:58 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:01:01 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:01:03 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:04:08 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:04:08 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:04:08 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:04:08 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:04:10 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:04:11 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:04:11 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:04:15 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:04:17 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:05:11 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:05:16 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:05:19 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:06:15 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:06:16 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:06:18 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:06:20 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:06:22 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:06:24 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:06:26 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:06:29 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:06:31 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:06:34 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:06:36 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:06:39 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:06:41 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:06:45 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:06:51 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:06:54 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:06:56 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:07:00 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:07:02 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:07:05 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:07:07 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:07:10 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:07:12 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:07:15 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:07:34 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:07:35 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:07:38 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:07:40 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:07:48 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:07:53 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:07:56 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:07:58 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:08:05 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:08:11 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:08:13 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:08:15 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:08:18 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:08:20 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:08:34 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:08:38 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:08:41 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:08:44 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:08:48 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:08:51 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:08:53 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:08:59 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:08:59 --> 404 Page Not Found: Ppms_img/ppms_icon
ERROR - 2022-12-21 08:09:04 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:09:07 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:09:09 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:09:12 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:09:14 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:09:16 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:09:18 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:09:20 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:09:23 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:09:25 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:09:25 --> 404 Page Not Found: Ppms_img/ppms_icon
ERROR - 2022-12-21 08:09:29 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:09:33 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:09:35 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:09:38 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:09:40 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:09:42 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:09:47 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:09:48 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:09:51 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:09:59 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:10:01 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:11:56 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:11:58 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:12:01 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:12:03 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:12:10 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:12:14 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:12:16 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:12:18 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:12:20 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:13:05 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:13:07 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:13:09 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:13:13 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:13:15 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:13:21 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:13:23 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:13:26 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:13:29 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:13:31 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:13:34 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:13:36 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:13:41 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:13:44 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:16:27 --> Severity: error --> Exception: Too few arguments to function Main_model::stor_board_cnt(), 2 passed in D:\php_young_project\food_shop_project\application\controllers\Main.php on line 174 and exactly 3 expected D:\php_young_project\food_shop_project\application\models\Main_model.php 476
ERROR - 2022-12-21 08:16:28 --> Severity: error --> Exception: Too few arguments to function Main_model::stor_board_cnt(), 2 passed in D:\php_young_project\food_shop_project\application\controllers\Main.php on line 174 and exactly 3 expected D:\php_young_project\food_shop_project\application\models\Main_model.php 476
ERROR - 2022-12-21 08:16:28 --> Severity: error --> Exception: Too few arguments to function Main_model::stor_board_cnt(), 2 passed in D:\php_young_project\food_shop_project\application\controllers\Main.php on line 174 and exactly 3 expected D:\php_young_project\food_shop_project\application\models\Main_model.php 476
ERROR - 2022-12-21 08:17:18 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:17:20 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:17:24 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:18:30 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:18:43 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:18:53 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:19:40 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:19:41 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:19:42 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:19:48 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:19:49 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:19:59 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:20:16 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:20:17 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:20:17 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:20:17 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:20:18 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:20:19 --> Severity: Notice --> Undefined index: url D:\php_young_project\food_shop_project\application\controllers\Main.php 184
ERROR - 2022-12-21 08:20:19 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:20:41 --> Severity: Notice --> Undefined index: url D:\php_young_project\food_shop_project\application\controllers\Main.php 184
ERROR - 2022-12-21 08:20:41 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:20:44 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:21:09 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:21:09 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:21:10 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:21:13 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:21:19 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:24:16 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:24:16 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:24:18 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:24:18 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:24:22 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:24:54 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:24:54 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:24:55 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:24:59 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:34:01 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:34:03 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:34:12 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:34:13 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:34:15 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:34:17 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:34:19 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:34:21 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:34:23 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:34:25 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:34:54 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:34:58 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:35:00 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:36:05 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:36:06 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:36:08 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:43:09 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:50:20 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:50:22 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:50:34 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:50:36 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:50:39 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:53:02 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:53:03 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:53:07 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:53:14 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:53:15 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:56:41 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:56:42 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:56:47 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:56:50 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:56:53 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:56:56 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:57:06 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:57:13 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:57:19 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:57:21 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:57:23 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:57:30 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:57:34 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:57:38 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:57:40 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:57:44 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:57:46 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:57:50 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:57:52 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:57:54 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:57:55 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:58:39 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:58:46 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:58:53 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:58:57 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:59:36 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:59:38 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:59:41 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:59:48 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:59:53 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:59:56 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 08:59:58 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 09:00:04 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 09:00:08 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 09:00:48 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 09:00:50 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 09:00:53 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 09:00:55 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 09:00:58 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 09:01:02 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 09:01:04 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 09:01:06 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 09:01:11 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 09:01:13 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 09:01:17 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 09:01:25 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 09:01:28 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 09:01:34 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 09:01:42 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 09:01:43 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 09:02:47 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 09:02:49 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 09:02:51 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 09:02:54 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 09:03:00 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 09:03:00 --> 404 Page Not Found: Ppms_img/ppms_icon
ERROR - 2022-12-21 09:03:05 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 09:03:06 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 09:03:13 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 09:07:19 --> 404 Page Not Found: Assets/js
ERROR - 2022-12-21 09:07:30 --> 404 Page Not Found: Assets/css
