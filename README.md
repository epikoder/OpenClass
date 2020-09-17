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

Composer and Npm required
### Install Composer 
For debian based distro
> sudo apt install composer

for windows getcomposer.com
### Install NPM
> sudo apt install npm

### Setup environment
> composer update

> npm run dev

**Edit Host file**

On Unix/Linux 

/etc/hosts

On windows

C:\windows\system32\drivers\etc\hosts

Add line
> 127.0.0.1 api.openclass.com

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

> php artisan serve --port=80 

By default port 8000 is used

All password is 'password'
## Basic API Usage
Return available courses or projects JSON

api.openclass.com 

Return chapters in course

param: course (int)

api.openclass.com/chapters?course=id

Return pages in chapter

param: chapter (int)

api.openclass.com/pages?chapter=id

Return a page using unique id

api.openclass.com/page?page=id

Return a chapter

api.openclass.com/chapter?chapter=id

Return a course

api.openclass.com/course?course=id

## Web Editor

openclass.com/home





