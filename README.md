# Module service
#### Version 1.0b
#### Author: Vitalii Minenko

A simple application for crating new modules using php laravel endpoint and vue js.

##### Requirements
* Docker
* WSL 2.0
* PowerShell
* Php 8.1
* Composer

##### How to start
* To start the application, you should install Docker and set up WSL engine.
* Clone the application into the folder with Docker.
* Copy .env.example to .env in the main folder.
* Open your project with a command-line shell application, for example, PowerShell, and execute the following commands:
1) Install all dependencies at docker.
```
composer install
```
2) Start docker.
```
make up
```
By default, your application will use http://localhost or http://0.0.0.0

* Now, the application is ready, and you can use it. Please enjoy ;)
