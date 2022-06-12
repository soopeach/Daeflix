<?php
session_start();
# 세션에 등록한 데이터를 제거
session_destroy();   // id 데이터 삭제
echo "<script>alert('로그아웃 하였습니다.');location.href='index.php'</script>";
?>
