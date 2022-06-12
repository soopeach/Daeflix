<?php
#0. 세션 시작하기
session_start();   // 세션 처리 시작하기. 맨 첫 줄에 있어야 함.
#1. DB 접속하기
include_once('dbconn.php');
#2. 폼 데이터 읽어오기
$email = $_POST['email'];
$password = $_POST['password'];
#3. SELECT SQL 구문 작성하기
$sql = "select * from user where email = '$email' and password = '$password'";

#4. SQL 실행하기
$result = $conn->query($sql); // 검색되면 레코드 한 건이 $result에 저장됨.
if(isset($result) && $result->num_rows > 0) {

	$row = $result->fetch_assoc();  // 검색된 레코드 하나를 연관배열 형태로 받음
	// 세션 데이터 생성
	$_SESSION['email'] = $email; 
    $_SESSION['nickName'] = $row['nickName']; // user id 값을 세션 키 uid에 저장
      // 세션 키 = 컬럼명
	echo "<script>location.href='browser.php'</script>";
}
else
	echo "<script>alert('이메일 또는 패스워드가 맞지 않습니다.'); history.go(-1)</script>";
?>