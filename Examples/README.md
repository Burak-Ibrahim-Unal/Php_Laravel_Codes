# Php_Laravel_Codes
## Table of contents
* [General info](#general-info)
* [Technologies](#technologies)
* [Setup](#setup)

## General info
This projects are examples about Php Laravel
	
## Technologies
Project is created with:
* Xampp version: 8.0.0-3
* Laravel: 8.x
* Composer version: 2.0.8-1
* Visual Studio Code: 1.52.1
* Nodejs version: 15.6.0
* Npm version: 6.4.11


	
## Setup
Installation for Arch based Systems:

First update system and install base-devel,git and yay

1- Open terminal
```
$ sudo pacman -Syu
$ sudo pacman -S base-devel
$ sudo pacman -S git
$ cd /home/yourusername (for my case it is "cd /home/burak")
$ mkdir Setups
$ cd Setups
$ git clone https://aur.archlinux.org/yay.git
$ cd yay
$ makepkg -si
```

2- Download Xampp latest from main website https://www.apachefriends.org/tr/index.html

```
$ cd Downloads
$ ls
```

3 Find Xampp setup file. In my case it is "xampp-linux-x64-8.0.0-3-installer.run"
```

$ chmod +x xampp-linux-x64-8.0.0-3-installer.run 
$ sudo ./xampp-linux-x64-8.0.0-3-installer.run
```

4- Than start all services. If you close service start screen,than start xampp manually on terminal
```
$ sudo /opt/lampp/lampp start
```


5- If you have port problem,change port (install nano or vim for text editor,in my case i will use nano). If Mysql starts correctly,skip this step...
Stop Xampp
```
$ sudo /opt/lampp/lampp stop
```

5a. Open XAMPP Installation Directory

5b. Open "etc" Folder

5c. Find "my.cnf" file and open it in any text editor

5d. Change Port from 3306 to 3307 (if you have installed skype or other apps)

5e. Add "innodb_force_recovery=1" under "myisam_sort_buffer_size=8M"

5f. Save "my.cnf" file and start xampp again

```
$ sudo /opt/lampp/lampp start
```

6- Install necessary applications
```
$ yay -S nodejs
$ yay -S npm
$ yay -S composer

```

7- Finally install first Laravel App.Create folder for your codes and open terminal in it:

```
$ composer create-project laravel/laravel my_first-app
$ cd my_first-app
$ php artisan serve
```

8- Open browser and connect http://127.0.0.1:8000 and it should work
