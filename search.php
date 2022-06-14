<!DOCTYPE html>
<html>
<head>
    <title>Daeflix - 검색결과</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/search.css">
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>
<body style="background-color: #141414;">
    <!--상단바-->
    <nav id="navbar" class="navbar navbar-expand-md fixed-top navbar-dark" style="background-color: #000000">
        <?php
            include_once("dbconn.php");
            session_start();
            $logged = false;
            if (isset($_SESSION['email'])){ // 세션에 id 키가 정의되어 있으면
                $email = $_SESSION['email'];
                $nickName = $_SESSION['nickName'];
                $logged = true;
            }
            $title = $_POST['search'];
            if($title =="") echo "<script>alert('검색된 영상이 없습니다!'); history.go(-1)</script>";
        ?>
        <div class="container-fluid">
            <!--상단바 로고-->
            <a class="navbar-brand" href="browser.php"><img src="images/logo.PNG" style="width:100px; height:27px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <!--상단바 찜목록 탭-->
                <ul class="navbar-nav me-auto mb-lg-0 justify-content-left">
                    <li class="nav-item pt-0 pb-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="여기서는 안 눌려요ㅠㅠ">
                        <a class="nav-link active" aria-current="page">내가 찜한 목록</a>
                    </li>
                    <li class="nav-item pt-0 pb-0">
                        <a class="nav-link" aria-current="page" role="button" href="liked.php" data-bs-toggle="tooltip" data-bs-placement="right" title="찜목록 전체 보기!">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" fill="currentColor" class="bi bi-justify-left" viewBox="0 0 18 20" style="color:#eee;">
                                <path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
                            </svg>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <!--프로필 드롭다운-->
                    <li class="nav-item dropdow" data-bs-toggle="tooltip" data-bs-placement="bottom" title="누르면 열려요!">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false" style="color: #eee;">
                            <?=$nickName?> 님의 프로필<!--여기에 닉네임 표시해야 함-->
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink" id="dropmenu">
                            <li>
                                <a class="dropdown-item" href="signmodify.php">회원정보수정
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wrench" viewBox="0 0 16 16">
                                        <path d="M.102 2.223A3.004 3.004 0 0 0 3.78 5.897l6.341 6.252A3.003 3.003 0 0 0 13 16a3 3 0 1 0-.851-5.878L5.897 3.781A3.004 3.004 0 0 0 2.223.1l2.141 2.142L4 4l-1.757.364L.102 2.223zm13.37 9.019.528.026.287.445.445.287.026.529L15 13l-.242.471-.026.529-.445.287-.287.445-.529.026L13 15l-.471-.242-.529-.026-.287-.445-.445-.287-.026-.529L11 13l.242-.471.026-.529.445-.287.287-.445.529-.026L13 11l.471.242z"/>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="paymentModify.php">결제정보수정
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-credit-card" viewBox="0 0 16 19">
                                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z"/>
                                        <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z"/>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item link-primary" href="signout.php">로그아웃
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" fill="currentColor" class="bi bi-power" viewBox="0 0 16 19" aria-hidden="true">
                                        <path d="M7.5 1v7h1V1h-1z"/>
                                        <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/>
                                    </svg>
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li data-bs-toggle="modal" data-bs-target="#signdelModal"><a class="dropdown-item link-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="정말요? 다시 생각해봐요!"><strong>회원탈퇴</strong>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="24" fill="currentColor" class="bi bi-person-x" viewBox="0 0 20 21" aria-hidden="true">
                                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                    <path fill-rule="evenodd" d="M12.146 5.146a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z"/>
                                </svg>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- 모달 버튼(검색) -->
                <form class="d-flex">
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#searchModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 20" style="color: #eee;">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </button>
                </form>   
            </div> 
        </div>
    </nav>
    <?php
        $sql = "select * from videoInfo where title like '%$title%'";
        if($result = $conn -> query($sql)){
    ?>
    <div class="container px-1" style="margin-top: 90px;">
        <?php
            while($row = $result->fetch_assoc()){
        ?>
        <h3 id="tab">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-binoculars" viewBox="0 0 16 20" style="color:dodgerblue;">
                <path d="M3 2.5A1.5 1.5 0 0 1 4.5 1h1A1.5 1.5 0 0 1 7 2.5V5h2V2.5A1.5 1.5 0 0 1 10.5 1h1A1.5 1.5 0 0 1 13 2.5v2.382a.5.5 0 0 0 .276.447l.895.447A1.5 1.5 0 0 1 15 7.118V14.5a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 14.5v-3a.5.5 0 0 1 .146-.354l.854-.853V9.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v.793l.854.853A.5.5 0 0 1 7 11.5v3A1.5 1.5 0 0 1 5.5 16h-3A1.5 1.5 0 0 1 1 14.5V7.118a1.5 1.5 0 0 1 .83-1.342l.894-.447A.5.5 0 0 0 3 4.882V2.5zM4.5 2a.5.5 0 0 0-.5.5V3h2v-.5a.5.5 0 0 0-.5-.5h-1zM6 4H4v.882a1.5 1.5 0 0 1-.83 1.342l-.894.447A.5.5 0 0 0 2 7.118V13h4v-1.293l-.854-.853A.5.5 0 0 1 5 10.5v-1A1.5 1.5 0 0 1 6.5 8h3A1.5 1.5 0 0 1 11 9.5v1a.5.5 0 0 1-.146.354l-.854.853V13h4V7.118a.5.5 0 0 0-.276-.447l-.895-.447A1.5 1.5 0 0 1 12 4.882V4h-2v1.5a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V4zm4-1h2v-.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5V3zm4 11h-4v.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V14zm-8 0H2v.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5V14z"/>
            </svg>
            <?=$row['title']?>
        </h3>
        <div class="continer">
            <!--아마 이 부분을 반복시키면 될 듯??-->
            <div class="row gx-5" >
                <div class="col-lg-3 mt-3"> <!--사진이 들어갈 곳-->
                    <div class="border-0">
                        <a href="movieDetail.php?title=<?=$row['title']?>"><img src="<?=$row['preview']?>" id="gallery"></a>
                    </div>
                </div>
                <div class="col-lg-9 mt-3 pb-3" id="specbox"> <!--제목과 줄거리가 들어갈 곳-->
                    <h3 id="title" class="mt-3"><?=$row['title']?></h3>
                    <p id="story"><?=$row['summary']?><br>
                    </p>
                </div>   
            </div>
        <?php }} else echo "<script>alert('검색된 영상이 없습니다!'); history.go(-1)</script>"; ?>
        </div>
    </div>
    
    <!--멋 진 공 백-->
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