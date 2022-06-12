<?php
include_once("dbconn.php");
$nickName = $_POST['nickName'];
$membership = $_POST['membership'];
$email = $_POST['email'];
$password = $_POST['password'];
$phoneNum = $_POST['phoneNum'];

// 빈값이 있으면 안됨.
if ($nickName != "" && $email != "" && $password != "" && $phoneNum != ""){
    $sql =  "INSERT INTO user VALUES('$email','$membership','$nickName','$password','$phoneNum')";
} else {
    echo "<script>alert('모든 항목을 입력해주세요.'$email, $membership, $password, $phoneNum, $nickName); history.go(-1)</script>";
}
if($conn->query($sql))
	echo "<script>alert('결제 정보 입력창으로 넘어갑니다.');location.href='paymentInput.php?email=$email'</script>";
else
	echo "회원가입중에 오류가 발생했습니다.";
?>