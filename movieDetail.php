<!DOCTYPE html>
<html>
<head>
    <title>Daeflix - 상세페이지</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/movieDetail.css">
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>
<body style="background-color: #141414;">
    <!--상단바-->
    <nav id="navbar" class="navbar navbar-expand-sm fixed-top navbar-dark" style="background-color: #000000">
        <?php
        include_once("dbconn.php");
        session_start();
        $logged = false;
        if (isset($_SESSION['email'])){ // 세션에 id 키가 정의되어 있으면
            $email = $_SESSION['email'];
            $nickName = $_SESSION['nickName'];
            $logged = true;
        }
        $title = $_GET['title'];

        $sql = "select * from videoInfo where title = '$title'";
        $result = $conn->query($sql);
        $row = $result -> fetch_assoc();
    
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
                    <li class="nav-item pt-0 pb-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="여기서는 안 눌려요!">
                        <a class="nav-link active" aria-current="page">내가 찜한 목록</a>
                    </li>
                    <li class="nav-item pt-0 pb-0">
                        <a class="nav-link" aria-current="page" role="button" href="liked.php" data-bs-toggle="tooltip" data-bs-placement="right" title="찜목록 전체 보기">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" fill="currentColor" class="bi bi-justify-left" viewBox="0 0 18 20" style="color:#eee;">
                                <path fill-rule="evenodd" d="M2 12.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
                            </svg>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <!--프로필 드롭다운-->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false" style="color: #eee;">
                            <?=$nickName?>님의 프로필<!--여기에 닉네임 표시해야 함-->
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
    <!-- 상세 페이지가 들어갈 컨테이너 -->
    <div class="container-fluid" style="margin-top: 90px;">
        <div class="container">
            <div class="row">
                <h3 id="tab">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-ticket-perforated" viewBox="0 1 16 20" style="color: #0044ff;">
                        <path d="M4 4.85v.9h1v-.9H4Zm7 0v.9h1v-.9h-1Zm-7 1.8v.9h1v-.9H4Zm7 0v.9h1v-.9h-1Zm-7 1.8v.9h1v-.9H4Zm7 0v.9h1v-.9h-1Zm-7 1.8v.9h1v-.9H4Zm7 0v.9h1v-.9h-1Z"/>
                        <path d="M1.5 3A1.5 1.5 0 0 0 0 4.5V6a.5.5 0 0 0 .5.5 1.5 1.5 0 1 1 0 3 .5.5 0 0 0-.5.5v1.5A1.5 1.5 0 0 0 1.5 13h13a1.5 1.5 0 0 0 1.5-1.5V10a.5.5 0 0 0-.5-.5 1.5 1.5 0 0 1 0-3A.5.5 0 0 0 16 6V4.5A1.5 1.5 0 0 0 14.5 3h-13ZM1 4.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v1.05a2.5 2.5 0 0 0 0 4.9v1.05a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-1.05a2.5 2.5 0 0 0 0-4.9V4.5Z"/>
                    </svg>
                    <?=$row['title']?>
                </h3>
            </div>
            <div class="col-lg-9 mt-3">
                <div class="row gx-5">
                    <!--유튜브 영상이 들어갈 곳-->
                    <div class="border-0">
                        <a href=""><iframe src="https://www.youtube.com/embed/<?=$row['video']?>?autoplay=1&mute=0&loop=1" id="gallery" width="800" height="450"></iframe></a>
                    </div>
                </div>
                <div class="row gx-5">
                    <div class="col-lg-10 mt-3 pb-3" id="specbox"> <!--제목과 줄거리가 들어갈 곳-->
                        <h2 id="title" class="row mt-3">
                            <div class="col-6"><?=$row['title']?></div>
                            <div class="col-6">
                                <a role="button" class="btn btn-primary" href="likedproc.php?title=<?=$row['title']?>">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" fill="currentColor" class="bi bi-hand-thumbs-up" viewBox="0 0 16 20">
                                        <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/>
                                    </svg>
                                    좋아요!
                                </a>
                            </div>
                        </h2>
                        <hr style="height: 1px;">
                        <h5 class="row" id="title">
                            <div class="col-6">
                                <?=$row['actors']?>
                            </div>
                            <div class="col-6">
                                러닝타임 - <?=$row['time']?>
                            </div>
                        </h5>
                        <hr style="color:#eee; height: 1px;">
                        <p id="story"><?=$row['summary']?><br>                        
                        </p>
                    </div>   
                </div>
            </div>
        </div>
    </div>
    <!--멋 진 공 백-->
    <div class="container-fluid" id="void"></div>
    <!--검색 모달 -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="search.php" method="post">
                            <div class="input-group">
                                <input class="form-control" type="search" placeholder="검색할 영화의 제목을 입력해주세요" aria-label="Search" name="search">
                                <button class="btn btn-primary" type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 20">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--회원탈퇴 모달-->
    <div class="modal fade" id="signdelModal" tabindex="-1" aria-labelledby="signdelModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body">
                <p style="color: rgb(0, 119, 255);"><strong>정말요?</strong></p>
                <p>아직 수많은 영화들이 당신을 기다리고 있어요</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">다시 함께하기!</button>
                <a href="signdel.php">
                    <button type="button" class="btn btn-secondary">아니에요. 탈퇴할게요</button>
                </a>
            </div>
          </div>
        </div>
    </div>
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