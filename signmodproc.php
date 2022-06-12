<?php
session_start();
#1. DB 접속하기
include_once('dbconn.php');
#2. 폼 데이터 읽어오기
$email = $_POST['email'];
$nickName = $_POST['nickName'];
$password = $_POST['password'];
$phoneNum = $_POST['phoneNum'];
//$rdate = date("Y/m/d");  // date 함수는 시스템의 날짜를 가져오는 함수. 년/월/일 형식으로 가져옴.
#3. UPDATE SQL 구문 작성하기
$sql = "update user set email = '$email', password = '$password', phoneNum = '$phoneNum' where email = '$email'";
#4. SQL 실행하기
if($conn->query($sql)) {
	$_SESSION['email'] = $email;
	$_SESSION['nickName'] = $nickName;
	echo "<script>alert('회원정보를 성공적으로 변경하였습니다.');location.href='index.php'</script>";

}
else
	echo "회원정보 수정중에 오류가 발생했습니다.";
?>