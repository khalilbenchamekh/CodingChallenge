# Software Engineer - Coding challenge

[![N|Solid](http://www.nextmedia.ma/assets/img/loading.gif)](https://nodesource.com/products/nsolid)

[![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://travis-ci.org/joemccann/dillinger)


### Technologies used

Dillinger uses a number of open source projects to work properly:

* [Laravel]
* [VueJs]
* [PHP7 ] 
* [MySQL]
* [React] 
* [Redux] 
* [Redux-Saga]


### Configuration


Install the dependencies and devDependencies and start the server.

```sh
$ cd CodingChallenge/backend
$ npm i
$ composer i
```

Now you can see many directory was added 'node_modules' and 'vendor'.
To create symbolic link by run.

```sh
$ php artisan storage:link
```
we can crerate databse using this command

```sh
$ php artisan db:create {name?}
```
Rollback all migrations and run them all again

```sh
$ php artisan migrate:refresh --seed
```
Now we had conifgure Our Envirement,next step we can test all required features by raning many commands see you in next step.
### Testing

Hi again, happy to see you again, so now we can run our servers.
to run server of laravel tap this:
```sh
$ php artisan serve
```

Second Tab is to run VueJs project:
```sh
$ npm run watch
```

(optional) Third to see front side with ReactJs:
```sh
$ cd ..
$ cd frontEnd
$ npm i
$ npm start
```

Verify the deployment by navigating to your server address in your preferred browser(Laravel/VueJs).

```sh
127.0.0.1:8000
```
 (optional) ReactJs Side.
 ```sh
127.0.0.1:3000
```
if you want to Add Product from cli
 ```sh
$ php artisan AddProduct
```
 [Laravel]: <https://laravel.com/>
[VueJs]: <https://vuejs.org//>
[PHP7]: <https://www.php.ne/>
[React]: <https://reactjs.org//> 
[MySQL]: <https://www.mysql.com/>
[Redux]: <https://redux.js.org/>
[Redux-Saga]: <https://redux-saga.js.org/>
