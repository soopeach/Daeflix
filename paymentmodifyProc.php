<?php
session_start();

include_once('dbconn.php');

$email = $_POST['email'];
$cardNum = $_POST['cardNum'];
$name = $_POST['name'];
$dateOfBirth = $_POST['dateOfBirth'];


$sql = "update paymentInfo set cardNum = '$cardNum', name = '$name', dateOfBirth = '$dateOfBirth' where email = '$email'";
if($conn->query($sql)) {
	echo "<script>alert('결제정보를 성공적으로 변경하였습니다.');location.href='browser.php'</script>";
}
?>