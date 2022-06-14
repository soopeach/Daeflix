<!DOCTYPE html>
<html>
<head>
    <title>Daefilx - 회원정보수정</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/signup.css">
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>
<body style="background-color: #141414;">
    <?php
        session_start();
        $email = $_SESSION['email'];
        include_once('dbconn.php');
        $sql = "select * from user where email = '$email'";
        $result = $conn->query($sql);
        if(isset($result) && $result->num_rows > 0)
            $row = $result->fetch_assoc();
    ?>
<!--상단 바-->
    <nav class="navbar navbar-expand-sm navbar-dark fixed-top" style="background-color: #000000;">
        <div class="container-fluid">
            <div class="navbar-brand">
                <a href="browser.php"><img src="images/logo.PNG" style="width:100px; height:27px;"></a>
            </div>
        </div>
    </nav>
<!-- 회원가입 폼-->
    <div class="container-fluid" id="formbox" style="margin-top: 150px;">
        <form class="container needs-validation" action="signmodproc.php" method="post">
            <div class="continer-fluid px-1">
                <h3 id="maintitle"><strong>회원정보수정</strong></h3>
                <hr style="color: #000000; height: 3px;">  <!--회원가입 제목이랑 구분선-->
                <div class="row g-3 mb-3" id="spec">
                    <div class="col-md-6">
                        <label for="inputEmail" class="form-label">이메일</label>
                        <input type="email" class="form-control" id="inputEmail" placeholder="email@example.com" value="<?=$email?>" name="email" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword" class="form-label">비밀번호</label>
                        <input type="password" class="form-control" id="inputPassword" value="<?=$row['password']?>" placeholder="비밀번호" name="password">
                    </div>
                </div>
                <div class="col-12 mb-3" id="spec">
                    <label for="inputNickname" class="form-label">닉네임</label>
                    <input type="text" class="form-control" id="inputNickname" value="<?=$row['nickName']?>" name="nickName" data-bs-toggle="tooltip" data-bs-placement="bottom" title="바꿀수 없다고 했죠!!" readonly>
                </div>
                <div class="col-12 mb-4" id="spec">
                    <label for="phoneNum" class="form-label">전화번호</label>
                    <input type="text" class="form-control" id="phoneNum" value="<?=$row['phoneNum']?>" placeholder="010-1234-5678" name="phoneNum">
                </div>
                <div class="g-10 row mb-4">
                    <label for="membershipInput" class="col-sm-2 col-form-label"
                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="네모 아이콘을 클릭해서 멤버쉽을 비교해요!" id="spec">멤버쉽
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" fill="currentColor" class="bi bi-collection" viewBox="0 0 16 18" data-bs-toggle="modal" data-bs-target="#membershipModal">
                                <path d="M2.5 3.5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11zm2-2a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1h-7zM0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6v7zm1.5.5A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-13z"/>
                            </svg>
                    </label>
                    <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select" id="membershipInput" name="membership">
                            <option disabled>멤버쉽을 선택해주세요!</option>
                            <?php 
                                $lastMembership = $row['membershipName'];
                                if($lastMembership == "베이직"){
                            ?>
                                <option selected value="베이직">베이직</option>
                            <?php }  else { ?>
                                <option value="베이직">베이직</option>
                            <?php } ?>

                            <?php 
                                if($lastMembership == "스탠다드"){
                            ?>
                                <option selected value="스탠다드">스탠다드</option>
                            <?php }  else { ?>
                                <option value="스탠다드">스탠다드</option>
                            <?php } ?>

                            <?php 
                                if($lastMembership == "프리미엄"){
                            ?>
                                <option selected value="프리미엄">프리미엄</option>
                            <?php }  else { ?>
                                <option value="프리미엄">프리미엄</option>
                            <?php } ?>
                        
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="" id="agreeCheck" aria-describedby="agreeCheckFeedback" required>
                        <label class="form-check-label" for="agreeCheck">
                            모든 <a data-bs-toggle="tooltip" data-bs-placement="bottom" title="책 아이콘을 클릭해서 약관을 확인해요!" style="color: #0055ff;">약관</a>
                            <a data-bs-toggle="modal" data-bs-target="#agreeModal" id="spec">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" fill="currentColor" class="bi bi-book" viewBox="0 0 16 19" data-bs-toggle="modal" data-bs-target="#agreeModal">
                                    <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                                </svg>
                            </a>
                            에 동의한다면 체크해주세요.<!--약관은 모달로 달자-->
                        </label>
                        <div id="agreeCheckFeedback" class="invalid-feedback">
                    
                        </div>
                    </div>
                  </div>
                <div class="d-grid gap-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="누르면 회원정보가 수정!">
                    <button class="btn btn-primary" type="submit">저장</button>
                </div>
            </div>
        </form>
    </div>
<!--멤버쉽 모달-->
    <div class="modal fade" id="membershipModal" tabindex="-1" aria-labelledby="membershipModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="membershipModalLabel" style="color: #E50914;"><strong>멤버쉽</strong></h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <h5 class="col-md-4" style="color: #ff8800">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-badge-4k" viewBox="0 0 16 18">
                                <path d="M4.807 5.001C4.021 6.298 3.203 7.6 2.5 8.917v.971h2.905V11h1.112V9.888h.733V8.93h-.733V5.001h-1.71zm-1.23 3.93v-.032a46.781 46.781 0 0 1 1.766-3.001h.062V8.93H3.577zm9.831-3.93h-1.306L9.835 7.687h-.057V5H8.59v6h1.187V9.075l.615-.699L12.072 11H13.5l-2.232-3.415 2.14-2.584z"/>
                                <path d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z"/>
                            </svg>
                            <strong>프리미엄</strong>
                        </h5>
                        <div class="col-md-8">
                            <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" fill="currentColor" class="bi bi-camera-video" viewBox="0 0 16 20">
                                <path fill-rule="evenodd" d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2V5zm11.5 5.175 3.5 1.556V4.269l-3.5 1.556v4.35zM2 4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H2z"/>
                                </svg>
                                최대
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-badge-4k" viewBox="0 0 16 18">
                                    <path d="M4.807 5.001C4.021 6.298 3.203 7.6 2.5 8.917v.971h2.905V11h1.112V9.888h.733V8.93h-.733V5.001h-1.71zm-1.23 3.93v-.032a46.781 46.781 0 0 1 1.766-3.001h.062V8.93H3.577zm9.831-3.93h-1.306L9.835 7.687h-.057V5H8.59v6h1.187V9.075l.615-.699L12.072 11H13.5l-2.232-3.415 2.14-2.584z"/>
                                    <path d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z"/>
                                  </svg>(2160p) 화질<br>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" fill="currentColor" class="bi bi-tv" viewBox="0 0 16 18">
                                    <path d="M2.5 13.5A.5.5 0 0 1 3 13h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zM13.991 3l.024.001a1.46 1.46 0 0 1 .538.143.757.757 0 0 1 .302.254c.067.1.145.277.145.602v5.991l-.001.024a1.464 1.464 0 0 1-.143.538.758.758 0 0 1-.254.302c-.1.067-.277.145-.602.145H2.009l-.024-.001a1.464 1.464 0 0 1-.538-.143.758.758 0 0 1-.302-.254C1.078 10.502 1 10.325 1 10V4.009l.001-.024a1.46 1.46 0 0 1 .143-.538.758.758 0 0 1 .254-.302C1.498 3.078 1.675 3 2 3h11.991zM14 2H2C0 2 0 4 0 4v6c0 2 2 2 2 2h12c2 0 2-2 2-2V4c0-2-2-2-2-2z"/>
                                </svg> 최대 4대의 기기에서 동시사용<br>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" fill="currentColor" class="bi bi-wallet" viewBox="0 0 16 18">
                                    <path d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z"/>
                                </svg> 매월 17,000원                         
                            </p>
                        </div>
                    </div>
                    <hr style="height: 1px;">
                    <div class="row">
                        <h5 class="col-md-4" style="color: #0051ff;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-badge-hd" viewBox="0 0 16 18">
                                <path d="M7.396 11V5.001H6.209v2.44H3.687V5H2.5v6h1.187V8.43h2.522V11h1.187zM8.5 5.001V11h2.188c1.811 0 2.685-1.107 2.685-3.015 0-1.894-.86-2.984-2.684-2.984H8.5zm1.187.967h.843c1.112 0 1.622.686 1.622 2.04 0 1.353-.505 2.02-1.622 2.02h-.843v-4.06z"/>
                                <path d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z"/>
                            </svg>
                            <strong>스탠다드</strong>
                        </h5>
                        <div class="col-md-8">
                            <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" fill="currentColor" class="bi bi-camera-video" viewBox="0 0 16 20">
                                <path fill-rule="evenodd" d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2V5zm11.5 5.175 3.5 1.556V4.269l-3.5 1.556v4.35zM2 4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H2z"/>
                                </svg>
                                최대
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-badge-hd" viewBox="0 0 16 18">
                                    <path d="M7.396 11V5.001H6.209v2.44H3.687V5H2.5v6h1.187V8.43h2.522V11h1.187zM8.5 5.001V11h2.188c1.811 0 2.685-1.107 2.685-3.015 0-1.894-.86-2.984-2.684-2.984H8.5zm1.187.967h.843c1.112 0 1.622.686 1.622 2.04 0 1.353-.505 2.02-1.622 2.02h-.843v-4.06z"/>
                                    <path d="M14 3a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h12zM2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2z"/>
                                </svg>(1080p) 화질<br>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" fill="currentColor" class="bi bi-tv" viewBox="0 0 16 18">
                                    <path d="M2.5 13.5A.5.5 0 0 1 3 13h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zM13.991 3l.024.001a1.46 1.46 0 0 1 .538.143.757.757 0 0 1 .302.254c.067.1.145.277.145.602v5.991l-.001.024a1.464 1.464 0 0 1-.143.538.758.758 0 0 1-.254.302c-.1.067-.277.145-.602.145H2.009l-.024-.001a1.464 1.464 0 0 1-.538-.143.758.758 0 0 1-.302-.254C1.078 10.502 1 10.325 1 10V4.009l.001-.024a1.46 1.46 0 0 1 .143-.538.758.758 0 0 1 .254-.302C1.498 3.078 1.675 3 2 3h11.991zM14 2H2C0 2 0 4 0 4v6c0 2 2 2 2 2h12c2 0 2-2 2-2V4c0-2-2-2-2-2z"/>
                                </svg> 최대 2대의 기기에서 동시사용<br>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" fill="currentColor" class="bi bi-wallet" viewBox="0 0 16 18">
                                    <path d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z"/>
                                </svg> 매월 13,500원                         
                            </p>
                        </div>
                    </div>
                    <hr style="height: 1px;">
                    <div class="row">
                        <h5 class="col-md-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-badge-sd" viewBox="0 0 16 18">
                                <path fill-rule="evenodd" d="M15 4a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4ZM0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm5.077 7.114c-1.524 0-2.263-.8-2.315-1.749h1.147c.079.466.527.809 1.234.809.739 0 1.13-.339 1.13-.83 0-.418-.3-.634-.923-.779l-.927-.215c-.932-.21-1.52-.747-1.52-1.657 0-1.098.918-1.815 2.24-1.815 1.371 0 2.162.77 2.22 1.692H6.238c-.075-.43-.466-.76-1.103-.76-.655 0-1.046.338-1.046.804 0 .36.294.598.821.712l.932.216c.971.22 1.613.685 1.613 1.691 0 1.117-.857 1.881-2.378 1.881ZM8.307 11V5.001h2.19c1.823 0 2.684 1.09 2.684 2.984 0 1.908-.874 3.015-2.685 3.015H8.308Zm2.031-5.032h-.844v4.06h.844c1.116 0 1.622-.667 1.622-2.02 0-1.354-.51-2.04-1.622-2.04Z"/>
                            </svg>
                            <strong>베이직</strong>
                        </h5>
                        <div class="col-md-8">
                            <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" fill="currentColor" class="bi bi-camera-video" viewBox="0 0 16 20">
                                <path fill-rule="evenodd" d="M0 5a2 2 0 0 1 2-2h7.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 4.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 13H2a2 2 0 0 1-2-2V5zm11.5 5.175 3.5 1.556V4.269l-3.5 1.556v4.35zM2 4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1H2z"/>
                                </svg>
                                최대
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-badge-sd" viewBox="0 0 16 18">
                                    <path fill-rule="evenodd" d="M15 4a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4ZM0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm5.077 7.114c-1.524 0-2.263-.8-2.315-1.749h1.147c.079.466.527.809 1.234.809.739 0 1.13-.339 1.13-.83 0-.418-.3-.634-.923-.779l-.927-.215c-.932-.21-1.52-.747-1.52-1.657 0-1.098.918-1.815 2.24-1.815 1.371 0 2.162.77 2.22 1.692H6.238c-.075-.43-.466-.76-1.103-.76-.655 0-1.046.338-1.046.804 0 .36.294.598.821.712l.932.216c.971.22 1.613.685 1.613 1.691 0 1.117-.857 1.881-2.378 1.881ZM8.307 11V5.001h2.19c1.823 0 2.684 1.09 2.684 2.984 0 1.908-.874 3.015-2.685 3.015H8.308Zm2.031-5.032h-.844v4.06h.844c1.116 0 1.622-.667 1.622-2.02 0-1.354-.51-2.04-1.622-2.04Z"/>
                                </svg>(480p) 화질<br>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" fill="currentColor" class="bi bi-tv" viewBox="0 0 16 18">
                                    <path d="M2.5 13.5A.5.5 0 0 1 3 13h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zM13.991 3l.024.001a1.46 1.46 0 0 1 .538.143.757.757 0 0 1 .302.254c.067.1.145.277.145.602v5.991l-.001.024a1.464 1.464 0 0 1-.143.538.758.758 0 0 1-.254.302c-.1.067-.277.145-.602.145H2.009l-.024-.001a1.464 1.464 0 0 1-.538-.143.758.758 0 0 1-.302-.254C1.078 10.502 1 10.325 1 10V4.009l.001-.024a1.46 1.46 0 0 1 .143-.538.758.758 0 0 1 .254-.302C1.498 3.078 1.675 3 2 3h11.991zM14 2H2C0 2 0 4 0 4v6c0 2 2 2 2 2h12c2 0 2-2 2-2V4c0-2-2-2-2-2z"/>
                                </svg> 최대 1대의 기기에서 동시사용<br>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" fill="currentColor" class="bi bi-wallet" viewBox="0 0 16 18">
                                    <path d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z"/>
                                </svg> 매월 9,500원                         
                            </p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" data-bs-placement="bottom" title="누르면 창이 닫혀요!">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">이제 선택해볼까요?</button>
                </div>
            </div>
        </div>
    </div>
    <!--약관 모달-->
    <div class="modal fade" id="agreeModal" tabindex="-1" aria-labelledby="agreeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="agreeModalLabel">약관</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="images/easteregg.jpg" style="width: 100%;">
                    <p>
                        미안하다 이거 보여주려고 어그로끌었다.. 나루토 사스케 싸움수준 ㄹㅇ실화냐? 
                        진짜 세계관최강자들의 싸움이다.. 그찐따같던 나루토가 맞나? 진짜 나루토는 전설이다..
                        진짜옛날에 맨날나루토봘는데 왕같은존재인 호카게 되서 세계최강 전설적인 영웅이된나루토보면
                        진짜내가다 감격스럽고 나루토 노래부터 명장면까지 가슴울리는장면들이 뇌리에 스치면서 가슴이 웅장해진다.. 
                        그리고 극장판 에 카카시앞에 운석날라오는 거대한 걸 사스케가 갑자기 순식간에 나타나서 
                        부숴버리곤 개간지나게 나루토가 없다면 마을을 지킬 자는 나밖에 없다 라며 바람처럼 
                        사라진장면은 진짜 나루토처음부터 본사람이면 안울수가없더라 진짜 너무 감격스럽고 
                        보루토를 최근에 알았는데 미안하다.. 지금20화보는데 진짜 나루토세대나와서 너무 
                        감격스럽고 모두어엿하게 큰거보니 내가 다 뭔가 알수없는 추억이라해야되나 
                        그런감정이 이상하게 얽혀있다.. 시노는 말이많아진거같다 좋은선생이고..
                        그리고 보루토왜욕하냐 귀여운데 나루토를보는것같다 성격도 닮았어 그리고버루토에
                        나루토사스케 둘이싸워도 이기는 신같은존재 나온다는게 사실임?? 그리고인터닛에 
                        쳐봣는디 이거 ㄹㅇㄹㅇ 진짜팩트냐?? 저적이 보루토에 나오는 신급괴물임?ㅡ 
                        나루토사스케 합체한거봐라 진짜 ㅆㅂ 이거보고 개충격먹어가지고 와 소리 저절로 나오더라 ;; 
                        진짜 저건 개오지는데.. 저게 ㄹㅇ이면 진짜 꼭봐야돼 진짜 세계도 파괴시키는거아니야 .. 
                        와 진짜 나루토사스케가 저렇게 되다니 진짜 눈물나려고했다.. 버루토그라서 계속보는중인데 
                        저거 ㄹㅇ이냐..? 하.. ㅆㅂ 사스케 보고싶다..  진짜언제 이렇게 신급 최강들이 되었을까 
                        옛날생각나고 나 중딩때생각나고 뭔가 슬프기도하고 좋기도하고 감격도하고 
                        여러가지감정이 복잡하네.. 아무튼 나루토는 진짜 애니중최거명작임..
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">확인했어요!</button>
                </div>
            </div>
        </div>
    </div>
    <!--공백을 주기위한 컨테이너-->
    <div class="container-fluid" id="void"></div>
    <script> // 툴팁을 이쁘게 불러오기 위한 자바스크립트
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')
        myModal.addEventListener('shown.bs.modal', function () {
            myInput.focus()
        })
    </script>
    <footer>
        <p>&copy;Copyright 2022 전현수 / 이우민</p>
    </footer>
</body>        
</html>
