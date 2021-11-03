# CSV Excel Macro Injection Demo

このリポジトリは、CSV Excel Macro Injectionのデモ環境です。
以下の機能を実装しています。

- ユーザーの入力値をDBに保存するフォーム
- DBのデータからCSVを生成し、ダウンロードするボタン

## 環境構築

デモ環境はDockerで構築しています。
推奨動作環境は以下の通りです。

- Docker Engine  19.03.0 以上
- Docker Compose 1.25.5 以上

Docker Composeを実行するのみで、デモ環境用のコンテナが立ち上がります。

```
git clone https://github.com/irnak4t/CEMIDemo.git
cd CEMIDemo
docker-compose up
```

コンテナ起動後、 http://localhost:8080 をブラウザで開けば、デモ用のアプリケーションが利用できます。

## 注意事項

本リポジトリはCEMI脆弱性のデモンストレーションとして、脆弱性について体系的に学習することを目的としており、クラッキング行為やその他犯罪行為を助長するものではありません。
