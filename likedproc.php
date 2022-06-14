<?php
session_start();

include_once('dbconn.php');

$email = $_SESSION['email'];
$title = $_GET['title'];

$likeSql = "select * from likeVideo where email = '$email'";
$resultForLikeSql = $conn->query($likeSql);
$row = $resultForLikeSql->fetch_assoc(); 

// 찜한 영상들이 담길 배열
$likeVideosList = explode(",",$row['videos']);
// 마지막은 공백이기 때문에 삭제해줌.
unset($likeVideosList[count($likeVideosList)-1]);

// 이미 찜(좋아요)한 영상이라면 찜 취소
if(in_array("$title", $likeVideosList)){

    // 이미 찜한 영상의 위치를 찾아서 취소
    $key = array_search($title, $likeVideosList);
    unset($likeVideosList[$key]);
    
    $newLikeVideo = implode(',',$likeVideosList);
    $sql = "update likeVideo set videos = '$newLikeVideo,' where email = '$email'";
    if($result = $conn->query($sql))
        echo "<script>alert('$title 을/를 찜! 취소하였습니다!'); history.go(-1)</script>";
    else 
        echo "<script>alert('찜! 을 취소하는 과정에서 오류가 발생하였습니다!'); history.go(-1)</script>";
    
// 찜(좋아요)한 영상이 아니라면 찜하기
} else {

    $addLikeVideo = $row['videos'].$title.',';

    $sql = "update likeVideo set videos = '$addLikeVideo' where email = '$email'";
    if($result = $conn->query($sql))
        echo "<script>alert('$title 을/를 찜! 하였습니다!'); history.go(-1)</script>";
    else 
        echo "<script>alert('찜! 하는 과정에서 오류가 발생하였습니다!'); history.go(-1)</script>";

}


?>