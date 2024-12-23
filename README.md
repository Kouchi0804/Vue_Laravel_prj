# Vue_Laravel_prj


## 概要
このプロジェクトは、LaravelとVue.jsを使用して構築されたシングルページアプリケーション（SPA）です。

初回アクセスはLarabel側のルーティング(web.php)でルート処理してapp.blade.phpを通り、  
  以降はVue側のルーティングでコンポーネント切り替えでコンテンツを切り替えて表示しています。

■ディレクトリ
Vue_Laravel_prj  
├─app  
├省略  
├─resources  
│  └─views  
│     └─app.blade.php  
└─routes  
&nbsp;&nbsp;└─web.php  

### 背景
以前参加した案件で初めてvueに触る機会がありましたが、直近の案件では触る機会があまりなかったため、  
思い出しとPHPの学習も兼ねて、PHP(Laravel)+Vue3でプロジェクトを作成しました。  
サーバーにアップしていないため、今の時点ではローカル環境でしか見ることができません。  
将来的にはどこかのサーバーにアップしたいと考えています。

CSSはBoostrapを使って最低限整える程度で、レスポンシブ対応などは特に行っていません。

### 今後の課題・対応予定  
Laravel用のOSSのチェック（どういった機能設計かなど）

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


## 実装した機能・ページ

### SPA用のログイン機能
LaravelSanctumを利用したログイン機能を追加しました。
・ログイン画面
![image](https://github.com/user-attachments/assets/d39dc10a-46c3-4ae1-a0f8-15c58665ad55)
・ログイン後にユーザー情報画面に遷移
![image](https://github.com/user-attachments/assets/53d8d208-b906-4b68-a250-05cc6be464f5)

### CRUDの実装
商品情報を登録、表示、更新、削除する画面を追加

・登録
![image](https://github.com/user-attachments/assets/4981363f-39b5-47c4-b2f2-9af7d16682c4)

・表示
![image](https://github.com/user-attachments/assets/458dd867-52c9-41a6-bec2-0771d32821f0)

・更新
![image](https://github.com/user-attachments/assets/1618772c-78af-41bb-bd75-9de0b2c32d04)


・削除
![image](https://github.com/user-attachments/assets/3a2a3668-0963-4eeb-b7dc-97d4b97365dd)
