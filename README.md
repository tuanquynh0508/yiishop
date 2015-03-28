Yii 2 Advanced Application Template
===================================

Yii 2 Advanced Application Template is a skeleton Yii 2 application best for
developing complex Web applications with multiple tiers.

The template includes three tiers: front end, back end, and console, each of which
is a separate Yii application.

The template is designed to work in a team development environment. It supports
deploying the application in different environments.


DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
tests                    contains various tests for the advanced application
    codeception/         contains tests developed with Codeception PHP Testing Framework
```


REQUIREMENTS
------------

The minimum requirement by this application template that your Web server supports PHP 5.4.0.


INSTALLATION
------------

### Install from an Archive File

Extract the archive file downloaded from [yiiframework.com](http://www.yiiframework.com/download/) to
a directory named `advanced` that is directly under the Web root.

Then follow the instructions given in "GETTING STARTED".


### Install via Composer

If you do not have [Composer](http://getcomposer.org/), you may install it by following the instructions
at [getcomposer.org](http://getcomposer.org/doc/00-intro.md#installation-nix).

You can then install the application using the following command:

~~~
php composer.phar global require "fxp/composer-asset-plugin:1.0.0"
php composer.phar create-project --prefer-dist --stability=dev yiisoft/yii2-app-advanced advanced
~~~


GETTING STARTED
---------------

After you install the application, you have to conduct the following steps to initialize
the installed application. You only need to do these once for all.

1. Run command `init` to initialize the application with a specific environment.
2. Create a new database and adjust the `components['db']` configuration in `common/config/main-local.php` accordingly.
3. Apply migrations with console command `yii migrate`. This will create tables needed for the application to work.
4. Set document roots of your Web server:

- for frontend `/path/to/yii-application/frontend/web/` and using the URL `http://frontend/`
- for backend `/path/to/yii-application/backend/web/` and using the URL `http://backend/`

To login into the application, you need to first sign up, with any of your email address, username and password.
Then, you can login into the application with same email address and password at any time.

### VIRTUAL HOST CONFIG
```
<VirtualHost *:80>
    #SSLEngine on
    #SSLCertificateFile "conf/ssl.crt/server.crt"
    #SSLCertificateKeyFile "conf/ssl.key/server.key"
    #DirectoryIndex  app.php

    ServerAdmin tuanquynh0508@gmail.com
    ServerName yiishop.local
    ServerAlias *.yiishop.local

    DocumentRoot "/home/nntuan/Gits/yiishop/frontend/web"
    SetEnv yiiEnv dev_tuan
    <Directory "/home/nntuan/Gits/yiishop/frontend/web">
        Options Indexes FollowSymLinks
        AllowOverride all
        Require all granted
    </Directory>

    #BACKEND
    Alias /backend "/home/nntuan/Gits/yiishop/backend/web"

    <Directory "/home/nntuan/Gits/yiishop/backend/web">
        Options Indexes FollowSymLinks
        AllowOverride all
        Require all granted
    </Directory>

    #ProxyPass /backend http://api-dev.securitoo.com/api/V8
        #ProxyPassReverse /backend http://api-dev.securitoo.com/api/V8

    #For Ubuntu apache config
    ErrorLog ${APACHE_LOG_DIR}/error-yiishop.log
    CustomLog ${APACHE_LOG_DIR}/access-yiishop.log combined

    #For Xampp windows config
    #ErrorLog "logs/api-news-error.log"
    #CustomLog "logs/api-news-access.log" combined
</VirtualHost>
```

### HTACCESS FOR BASIC
```
Options +FollowSymLinks
IndexIgnore */*
RewriteEngine on

# if request dosn't start with web add it
RewriteCond %{REQUEST_URI} !^/(web)
RewriteRule (.*) /web/$1

# if file or directory dosn't exists go to /web/index.php
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /web/index.php
```

### HTACCESS FOR ADVANCED
```
Options +FollowSymLinks
IndexIgnore */*
RewriteEngine on



# if request begins with /admin remove admin and ad /backend/web/
RewriteCond %{REQUEST_URI} ^/admin
RewriteRule ^admin\/?(.*) /backend/web/$1

# other requests add /frontend/web/$1
RewriteCond %{REQUEST_URI} !^/(frontend/web|backend/web|admin)
RewriteRule (.*) /frontend/web/$1

# if frontend request
RewriteCond %{REQUEST_URI} ^/frontend/web
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /frontend/web/index.php

# if backend request
RewriteCond %{REQUEST_URI} ^/backend/web
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /backend/web/index.php
```

### HTACCESS MINIMUM FOR FRONTEND
```
Options +FollowSymLinks
IndexIgnore */*
RewriteEngine on

RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . index.php
```

### HTACCESS MINIMUM FOR BACKEND
```
Options +FollowSymLinks
IndexIgnore */*
RewriteEngine on
RewriteBase /backend/

RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . index.php
```
