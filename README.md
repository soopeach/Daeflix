# 웹 디자인 / 웹 프로그래밍 기말고사 대체 과제
---
## 코로나 시국에 많은 사람들이 사용했던 넷플릭스와 같은 OTT사이트들의 동작, 작동원리를 조금이라도 파악해보고자 이번 프로젝트를 진행하게 되었음.


# StarUML을 이용한 DATABASE ERD
## 테이블명 : DaeFlix
<img width="853" alt="Screen Shot 2022-06-12 at 8 04 19 PM" src="https://user-images.githubusercontent.com/90144041/173230114-be20a5f2-291f-41a7-8068-f61822c6c7a1.png">

### user 테이블 - 유저의 정보를 담는 테이블
<details><summary>자세히 보기</summary>
  
- email (PrimaryKey) - 유저의 이메일
  
- membership - 유저가 가입한 멤버십의 종류 ex) 베이직, 스탠다드, 프리미엄
  
- nickName - 유저의 닉네임
  
- password - 유저의 비밀번호
  
- phoneNum - 유저의 휴대전화 번호 
  
</details>

### paymentInf 테이블 - 결제정보를 담는 테이블 / 이메일을 기준으로 해당 유저의 결제 정보를 담음.
<details><summary>자세히 보기</summary>
  
- email (PrimaryKey) - 유저의 이메일
  
- cardNum - 카드번호
  
- name - 이름
  
- dateOfBirth - 생일
  
</details>

### membership 테이블 - 멤버십의 정보를 담는 테이블
<details><summary>자세히 보기</summary>
  
- membershipName (PrimaryKey) - 멤버십의 이름 ex) 베이직
  
- monthlyFee - 월별 요금 ex) 9,500원 
  
- quality - 영상의 질 ex) 좋음.
  
- displayResolution - 영상의 해상도 ex) 4K+HDR
  
- devices - 사용가능한 기기의 개수
  
</details>

### VideoInfo 테이블 - 영상의 정보를 담는 테이블
<details><summary>자세히 보기</summary>
  
- title (PrimaryKey) - 영상의 제목
  
- genre - 영상의 장르
  
- time - 영상의 상영시간
  
- actors - 영상에 나오는 배우들
  
- openingDate - 개봉일자

- summary - 줄거리
  
- video - 영상의 소스코드(유튜브 예고편 영상의 Id)
  
- preview - 미리보기 (네이버 영화에 있는 포스터 이미지의 주소)
  
</details>
