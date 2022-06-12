<?php

session_start();
include_once('dbconn.php');

$email = $_SESSION['email'];

$sqlForPayment = "delete from paymentInfo where email = '$email'";

$sql = "delete from user where email = '$email'";



session_destroy(); 
if($conn->query($sqlForPayment)) {
	if($conn->query($sql)) {
    session_destroy();
    echo "<script>alert('회원탈퇴가 성공적으로 진행되었습니다..');location.href='index.php'</script>";
    } else {
        echo "<script>alert('결제 정보 삭제중 요류가 발생하였습니다.');location.href='index.php'</script>";
    }
   
}
else
    echo "<script>alert('회원탈퇴중 오류가 발생하였습니다.');location.href='index.php'</script>";
?>