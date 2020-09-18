# OpenClass
## About OpenClass

Openclass is free learning platform, to learn various programming language and projects.

### Features
- User Login
- User Registration (not available)
- Create Course
- Create chapters and pages for readability
- JSON API to render content for mobile


## Getting Started

> git clone https://github.com/epikoder/openclass

Composer required
### Install Composer 
For debian based distro
> sudo apt install composer

### Setup environment
> composer update

**Edit Host file**

On Unix/Linux 

/etc/hosts

On windows

C:\windows\system32\drivers\etc\hosts

Add line
> 127.0.0.1 http://api.openclass.com

> 127.0.0.1 openclass.com

Create a database openclass using phpmyadmin or your db client.

copy .env.example to .env and make changes

>DB_CONNECTION=mysql

>DB_HOST=127.0.0.1

>DB_PORT=3306

>DB_DATABASE=openclass

>DB_USERNAME=root

>DB_PASSWORD=yourpassword

In console execute

> php artisan migrate

> php artisan db:seed

> php artisan serve --port=80 

By default port 8000 is used

All password is 'password'
## Basic API Usage
Return available courses or projects JSON

http://api.openclass.com 

Return chapters in course

>param: course (int)

http://api.openclass.com/chapters?course=id

Return pages in chapter

>param: chapter (int)

http://api.openclass.com/pages?chapter=id

Return a page using unique id

>param: page (int)

http://api.openclass.com/page?page=id

Return a chapter

>param: chapter (int)

http://api.openclass.com/chapter?chapter=id

Return a course

>param: course (int)

http://api.openclass.com/course?course=id

## Web Editor
The web editor uses stackedit.js

http://openclass.com/home






