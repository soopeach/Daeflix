# Daeflix

### 개요

불과 수개월 전 까지만 해도 코로나의 종식을 위하여 시행한 여러 제도에 의해 사회의 전체적인 분위기가 이전과는 아주 달랐습니다. 
대면 위주의 문화였던 전과 달리 인원 제한, 시간 제한 등으로 인해 비대면 문화가 발달하게 되었습니다. 그중에 특히 여러 영상을 볼 수 있는 OTT사이트들의 인기도 매우 높아졌다고 생각합니다. 이에 따라 OTT사이트들을 참고하여 직접 만들어보고 해당 사이트가 동작하는 원리를 알아보고자 이번 프로젝트를 진행하게 되었습니다.!

---

## 간단한 모습
![Daeflix](https://user-images.githubusercontent.com/90144041/173825544-a48a0ddc-91ea-4f0c-a322-7a7f5d327eea.gif) 

[조금 더 자세한 구현 모습](https://soopeach.tistory.com/184)

## 사이트 맵
![DaeflixMap](https://user-images.githubusercontent.com/90144041/173838816-9e522897-d98a-4243-a737-6dea7cff8455.png)



## 데이터베이스명 : DaeFlix (DATABASE ERD)
<img width="853" alt="Screen Shot 2022-06-12 at 8 04 19 PM" src="https://user-images.githubusercontent.com/90144041/173230114-be20a5f2-291f-41a7-8068-f61822c6c7a1.png">
<details><summary>데이터베이스 자세히 보기</summary>
  
  ### user 테이블 - 유저의 정보를 담는 테이블
  <details><summary>user 테이블 자세히 보기</summary>

  - email (PrimaryKey) - 유저의 이메일

  - membership - 유저가 가입한 멤버십의 종류 ex) 베이직, 스탠다드, 프리미엄

  - nickName - 유저의 닉네임

  - password - 유저의 비밀번호

  - phoneNum - 유저의 휴대전화 번호 

  </details>

  ### paymentInfo 테이블 - 결제정보를 담는 테이블 / 이메일을 기준으로 해당 유저의 결제 정보를 담음.
  <details><summary>paymentInfo 테이블 자세히 보기</summary>

  - email (PrimaryKey) - 유저의 이메일

  - cardNum - 카드번호

  - name - 이름

  - dateOfBirth - 생일

  </details>

  ### membership 테이블 - 멤버십의 정보를 담는 테이블
  <details><summary>membership 테이블 자세히 보기</summary>

  - membershipName (PrimaryKey) - 멤버십의 이름 ex) 베이직

  - monthlyFee - 월별 요금 ex) 9,500원 

  - quality - 영상의 질 ex) 좋음.

  - displayResolution - 영상의 해상도 ex) 4K+HDR

  - devices - 사용가능한 기기의 개수

  </details>

  ### VideoInfo 테이블 - 영상의 정보를 담는 테이블
  <details><summary>VideoInfo 테이블 자세히 보기</summary>

  - title (PrimaryKey) - 영상의 제목

  - genre - 영상의 장르

  - time - 영상의 상영시간

  - actors - 영상에 나오는 배우들

  - openingDate - 개봉일자

  - summary - 줄거리

  - video - 영상의 소스코드(유튜브 예고편 영상의 Id)

  - preview - 미리보기 (네이버 영화에 있는 포스터 이미지의 주소)

  </details>
  
</details>

## Dataflow
![Daeflix-Dataflow](https://user-images.githubusercontent.com/90144041/173826226-4af91693-10d4-48bc-ab2b-6459dfd24668.png)

