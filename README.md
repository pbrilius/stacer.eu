# c2c-mvc.pbgroupeu

A small scale - based on _Composer_ dependencies - **MVC - ORM** application project. It can be used on low-intensity resources consumption _PHP_ _e-benchmarks_ inferred environments like concerns of _e-commerce_ & _e-loans_.

Intended for _commercial_ use for enterprise sccale projects, so called **Friedman** stage scope, where the main goal and _labeled_ _consumption_ is government registered **profit** - _for profit_ entity.

## Installation & set up

```shell
mkdir log
touch log/app.log
chmod o+rw -R log
```

### Proxies:

```shell
mkdir proxy
chmod o+rw proxy
```

### Prerequisites

```shell
composer install
cp -v .env.dist .env
mkdir config/xml
```

### Run & develop

```shell
npm install
npm run watch dev
```

### Migrate

```shell
cp -v migrations-db.php.dist migrations-db.php
```

### Develop

```shell
mkdir cache
chmod o+rw cache
php -S localhost:2124 -t exposure
```

### Navigate

```shell
curl -LI localhost:2124/index.php
http -hF localhost:2124/index.php
```
