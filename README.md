# 目次

<!-- TOC -->

1. [データベースとテーブルの作成](#データベースとテーブルの作成)

1. [権限の設定](#権限の設定)

<!-- /TOC -->

<br>

# データベースとテーブルの作成

MySQLにログイン
```
mysql -u root -p;
```

データベースを作成
```
CREATE DATABASE IF NOT EXISTS file_share_app CHARACTER SET utf8 COLLATE utf8_general_ci;
```

テーブルを作成
```
CREATE TABLE IF NOT EXISTS account (id BIGINT auto_increment, user_id VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, authority BIGINT NOT NULL, PRIMARY KEY(id));
```

<br>

# 権限の設定

```
sudo find /var/www/html/project/  -type d -exec chmod 755 {} +
```

```
sudo find /var/www/html/project/ -type f -exec chmod 644 {} +
```

```
sudo find /var/www/html/project/ -type f -regex ".*\.\(php\)" -exec chmod 0755 {} \;
```

```
sudo find /var/www/html/project/ -name "templates_c" -type d
```

```
sudo find /var/www/html/project/ -name "templates_c" -type d -exec chmod 0705 {} \;
```
