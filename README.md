# Vue_Laravel_prj


## 概要
以前参加した案件で初めてvueに触る機会がありましたが、直近の案件では触る機会があまりなかったため、  
思い出しとPHPの学習も兼ねて、Vue3+PHP(Laravel)でローカルにプロジェクトを作成しました。  
サーバーにアップしていないため、今の時点ではローカル環境でしか見ることができません。  
将来的にはどこかのサーバーにアップしたいと考えています。


## 環境
■Laravel + Laravel/ui + Vue3  
(Laravel11の標準では、Breeze+Inertiaですが、Inertia部分の仕組みを除いて作成を進めたかったので、今回は上記構成にしています)

■PHPバージョン  
PHP 8.2.12 (cli) (built: Oct 24 2023 21:15:15) (ZTS Visual C++ 2019 x64)

■Laravelバージョン  
Laravel Framework 11.21.0

■Composerバージョン  
Composer version 2.7.7 2024-06-10 22:11:12  

■DB情報
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=vue_laravel_prj
DB_USERNAME=vue_laravel_prj

データベースとの接続を確認
php artisan migrate


## コマンドプロンプト
■Laravelプロジェクト作成  
composer create-project --prefer-dist laravel/laravel Vue_laravel_prj

■laravel/uiインストール  
composer require laravel/ui

■Vue用の認証を追加(package.jsonファイルを確認するとvue3が追加)  
php artisan ui vue --auth  
参考URL:https://reffect.co.jp/laravel/laravel9-laravel-ui#Vue

■フロントエンドパッケージインストール
npm install

■Vue Routerインストール
npm install vue-router

