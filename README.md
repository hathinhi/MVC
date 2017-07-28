# MVC
You can update CodeIgniter system folder to latest version with one command.

## Folder Structure

```
MVC/
├── config/
├── controller-base/
├── composer.json
├── composer.lock
├── public/
│   ├── assets
│   │   ├── css
│   │   ├── images
│   │   ├── js
│   │   ├── images
│   
└── vendor/
│   
└── libs/
│   
└── controllers/
│   
└── models/
│   
└── lang/
       ....
    
```

## Requirements

* PHP 5.3.2 or later
* `composer` command (See [Composer Installation](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx))
* `bower`
* Git

## How to Use

### Install
1. **Install dependences:**

    ```
    $ cd bin/               #go to bin folder
    $ sh install-deps.sh    #run install dependences script
    $ cd ../                #back to project root folder
    ```
2. **config database, url file**
```
$ config/config.php
$ config/database.php
```
If user login 
```
$ config/login.php
```
**Now you can run project**

### Run PHP built-in server (PHP 5.4 or later)

```
$ bin/server.sh
```

### Update

```
$ composer update       #update php dependences
$ bower update          #update js/css dependences
