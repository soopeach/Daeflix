<!DOCTYPE html>
<html>
<head>
    <title>Daeflix - 결제정보</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/payment.css">
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>
<body style="background-color: #141414;">
    <nav class="navbar navbar-expand-sm navbar-dark fixed-top" style="background-color: #000000;">
        <div class="container-fluid">
            <div class="navbar-brand"><img src="images/logo.PNG" style="width:100px; height:27px;"></a>
        </div>
    </nav>
    <div class="container-fluid" id="formbox" style="margin-top: 150px;">
        <form class="container needs-validation" action="paymentInputProc.php" method="post">
            <div class="continer-fluid px-1">
                <h3 id="maintitle"><strong>결제정보</strong></h3>
                <hr style="color: #000000; height: 3px;">  <!--결제정보 제목이랑 구분선-->
            </div>
            <div class="mb-3 row" id="spec">
                <label for="inputemail" class="col-sm-3 col-form-label">이메일
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" fill="currentColor" class="bi bi-envelope-check" viewBox="0 0 16 20" style="color: #0044ff;">
                        <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z"/>
                        <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686Z"/>
                    </svg>
                </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control-plaintext" value="<?=$_GET['email']?>" name="email" readonly>
                </div>
            </div>
            <div class="mb-3 row" id="spec">
                <label for="inputemail" class="col-sm-3 col-form-label">카드번호
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" fill="currentColor" class="bi bi-credit-card" viewBox="0 0 16 20" style="color: #0044ff;">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z"/>
                        <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z"/>
                    </svg>
                </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputCard" placeholder="1234-5678-0123-1111" name="cardNum">
                </div>
            </div>
            <div class="mb-3 row" id="spec">
                <label for="inputNickname" class="col-sm-3 col-form-label">이름</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputName" placeholder="홍길동" name="name" data-bs-toggle="tooltip" data-bs-placement="bottom" title="카드 소유자의 이름이에요!">
                </div>
            </div>
            <div class="mb-3 row" id="spec">
                <label for="inputDate" class="col-sm-3 col-form-label">생년월일</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" id="inputDate" name="dateOfBirth">
                </div>
            </div>
            <div class="d-grid gap-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="누르면 가입이 완료!">
                <button class="btn btn-primary" type="submit">결제정보저장</button>
            </div>
        </form>
    </div>
    <script> // 툴팁을 이쁘게 불러오기 위한 자바스크립트
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
</body>
</html>