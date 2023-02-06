<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//$error_msg : 뿌려줄 에러 메시지.
//줄바꿈 제거후 다시 script 에서 인식하는 \n 으로 변경
//preg_replace('/\r\n|\r|\n/','\n',$error_msg);
// echo "error_alert";
?>
<!doctype html>
<html lang="ko">
<body>
<script>
<?php
if(!empty($error_msg)) {
	echo "alert('". preg_replace('/\r\n|\r|\n/','\n', $error_msg) ."');". PHP_EOL;
}
if(isset($go_url) && $go_url !== 'back') {
	echo "document.location.href='".$go_url ."';". PHP_EOL;
} elseif($go_url === 'back') {
	echo "history.back();". PHP_EOL;
}
?>
</script>
</body>
</html>
