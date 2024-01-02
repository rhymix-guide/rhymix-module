# Example1 — 라이믹스 네임스페이스 기반의 모듈 템플릿

> [!TIP]
> 이 템플릿을 사용하면 라이믹스의 모듈 만들기를 쉽게 시작할 수 있습니다.  
> [Use this template](https://github.com/new?template_name=rhymix-module&template_owner=rhymix-guide) 버튼을 눌러보세요!
>
> 👉 [템플릿에서 리포지토리 만들기 - GitHub Docs](https://docs.github.com/ko/repositories/creating-and-managing-repositories/creating-a-repository-from-a-template)

> [!IMPORTANT]
> 이 모듈 템플릿은 PHP 7.4 이상, Rhymix 2.1.3 이상에서 동작합니다.

> [!IMPORTANT]
> 이 모듈 템플릿의 코딩 컨벤션은 [PSR-12](https://www.php-fig.org/psr/psr-12/) 표준안을 따릅니다.

---

이 모듈 템플릿은 라이믹스(Rhymix)의 네임스페이스 기능을 활용하여 작성된 예시 모듈입니다.

폴더와 파일 구조는 다음과 같습니다.

```shell
modules/example1      # 이 예제 모듈의 폴더
├── conf              # 모듈 정보 및 설정 (Manifest)
│   ├── info.xml        # 모듈 정보
│   └── module.xml      # 모듈 설정
├── lang              # 다국어
│   └── ko.php          # 한국어
├── public            # Assets
├── schemas           # 데이터베이스 스키마
├── src               # 모듈을 구성하는 PHP 코드
│   ├── controllers     # 컨트롤러
│   └── models          # 모델
├── views             # view 템플릿
│   └── admin           # 관리페이지용 템플릿
├── composer.json     # composer 설정
├── LICENSE           # 라이선스 파일 (GNU GPL v2 or later)
├── phpstan.neon      # phpstan 설정
└── README.md
```

## 정적 분석 도구 사용하기 - PHPStan

```shell
# 의존 패키지 설치
$ composer install

# PHPStan 실행
$ composer run phpstan

# 실행 결과 예시
> vendor/bin/phpstan analyse -c phpstan.neon
 5/5 [▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓] 100%

 [OK] No errors
```
