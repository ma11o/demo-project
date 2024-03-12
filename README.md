# 技術課題

## 構成

- php8
- PostgreSQL
- Laravel
- Docker

## 起動手順

リポジトリをクローン後、.envファイルをsrcフォルダに配置してください。

dockerフォルダに移動して以下のコマンドを実行してください。

```
$ cd docker

$ docker-compose up -d
```

コンテナ内でライブラリのインストールとマイグレーションを実行します。

```
$ docker-compose exec php bash

# ライブラリのインストール
$ composer install

#マイグレーションを実行
$ php artisan migrate
```

以下のURLにアクセスします。

http://localhost:8080/

## 各画面について

### 画像一覧

ダミー画像の一覧を表示しています。

「解析」ボタンを押すと、各画像のパスをAPIに送信してレスポンスをDBに保存します。

解析処理完了後、成功もしくはエラーのメッセージを表示します。

### 解析ログ

DBに保存されたデータの一覧を表示しています。

## 備考

外部APIについてはPostmanでモックサーバーを立てています。