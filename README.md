# Laravel-Isbn

---

## 設置方法

### 1. リポジトリの clone

```sh
# clone先ディレクトリは任意(apacheのドキュメントルート配下は避ける)
$ cd /PATH/TO/LARAVELISBN

# フォルダ名は任意(アプリ名に合わせるか、複数設置したときに区別しやすいもの)
$ git clone https://github.com/YA-androidapp/Laravel-Isbn books
```

### 2. clone したリポジトリのディレクトリで composer を実行

```sh
$ cd books
$ composer install
```

### 3. .env を作成し、アプリケーションキーを初期化

```sh
$ cp .env.example .env
$ php artisan key:generate
```

### 4. データベース設定

#### 4.1. MySQL で、データベースとユーザーを作成

```sh
$ mysql -u root -pROOTPASSWORD
> CREATE DATABASE MYDBNAME DEFAULT CHARACTER SET utf8;
> CREATE USER MYUSERNAME IDENTIFIED BY 'MYPASSWORD';
> GRANT ALL PRIVILEGES ON MYDBNAME.* TO MYUSERNAME@localhost IDENTIFIED BY 'MYPASSWORD';
```

#### 4.2. データベースの接続情報を設定

```sh
$ nano .env
```

```ini
DB_HOST=localhost
DB_DATABASE=MYDBNAME
DB_USERNAME=MYUSERNAME
DB_PASSWORD=MYPASSWORD
```

#### 4.3. マイグレーションの実行

```sh
$ php artisan migrate
```

#### 5. Apache の設定

---

Copyright &copy; 2019 YA-androidapp(https://github.com/YA-androidapp) All rights reserved.
