<?php

include_once("dbconn.php");
$email = $_POST['email'];
$cardNum = $_POST['cardNum'];
$name = $_POST['name'];
$dateOfBirth = $_POST['dateOfBirth'];

// 빈값이 있으면 안됨.
if ($cardNum != "" && $name != "" && $dateOfBirth != ""){
    $sql =  "INSERT INTO paymentInfo VALUES('$email','$cardNum','$name','$dateOfBirth')";
} else {
    echo "<script>alert('모든 항목을 입력해주세요.'); history.go(-1)</script>";
}
// 좋아요 리스트를 만들기 위함.
$likeSql =  "INSERT INTO likeVideo VALUES('$email',',')";
if($conn->query($sql) && $conn->query($likeSql)){
    
    echo "<script>alert('회원가입에 성공하였습니다.');location.href='index.php'</script>";
}
else
	echo "회원가입중에 오류가 발생했습니다.";
?>