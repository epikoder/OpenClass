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

`git clone https://github.com/epikoder/openclass`

Composer required
### Install Composer 
For debian based distro

`sudo apt install composer`

### Setup environment
`composer install`

**Edit Host file**

On Unix/Linux 

> /etc/hosts

On windows

> C:\windows\system32\drivers\etc\hosts

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

> SESSION_DOMAIN=.openclass.com 

In console execute

` php artisan key:generate`

` php artisan migrate`

` php artisan db:seed`

` php artisan serve --port=80`

By default port 8000 is used

All password is `password`
## Basic API Usage
All responses are Json object

### Return all courses  
http://api.openclass.com/api


### Return a course : param: int id| string slug    
http://api.openclass.com/api/course?id=course_id   or http://api.openclass.com/api/course?slug=slug

### Return all chapters in a course and infos : param: int id| string slug 
http://api.openclass.com/api/course/allchapters?id=course_id 

### Return a chapter and it pages : param: int id
http://api.openclass.com/api/course/chapter?id=chapter_id

### Return a page using it's id as key
http://api.openclass.com/api/page?id=page_id

## Web Editor
The web editor uses stackedit.js
### Web editor is currently deactivated
~~http://openclass.com/home~~


## Authentication

### Signup
http://api.openclass.com/api/signup
#### type : `post`
#### param :
`name, email, password`

### Login
http://api.openclass.com/api/login
#### type: `post`
#### params: `email`, `password`
#### return 
`plain_text_token`

Pass token as header 
`Authorization: Bearer 'token_here'`

### Logout
http://api.openclass.com/api/login
#### type: `get`
