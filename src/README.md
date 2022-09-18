### Hello Dears from Ocras

This is a simple readme describing the steps to run the project. 


### Prerequisites
```
PHP v8
MYSQL 

```

### Installtion

```

cd ORCAS-Task

composer install

php artisan migrate

php artisan serve 

php artisan schedule:list

php artisan schedule:run


```

All the APIs are in a collection.

Just import this collection into POSTMAN
https://www.getpostman.com/collections/1fd35fab58cd260682d8 .

You will need to register to have token so you can access to the project

```
curl -X POST \
  http://127.0.0.1:8000/api/register \
  -H 'cache-control: no-cache' \
  -H 'content-type: application/json' \
  -H 'postman-token: ae00863b-5584-7596-a1a3-109339a0b1b4' \
  -d '{
    "email" : "mohamed.osama98@outlook.com",
    "password" : "12345678"

}'
```


You can login if you have a user 
```
curl -X POST \
  http://127.0.0.1:8000/api/login \
  -H 'cache-control: no-cache' \
  -H 'content-type: application/json' \
  -H 'postman-token: b333940a-a33a-fc8f-7062-7b45a15f29f0' \
  -d '{
	
	"email" : "mohamed.osama98@outlook.com",
	"password" : "12345678"
}'

```


Then you will get token and then you can access APIs related to User

```

curl -X GET \
  http://127.0.0.1:8000/api/users \
  -H 'authorization: Bearer {token}' \
  -H 'cache-control: no-cache' \
  -H 'content-type: application/json' \
  -H 'postman-token: b6bd452b-2d3f-29e8-aa9c-c19c58a8ff16' \
  -d '{
    "email" : "mohamed.osama98@outlook.com",
    "password" : "12345678"

}'
```