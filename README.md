### Hello Dears from Ocras. 

This is the dockerized version from the task.


### Prerequisites


```
Docker
Docker Compose
Postman
```


### Commands 

```
# This command to build all the dependcies for the project (mysql,nginx,composer)

docker-compose up -d --build site  

# access docker-compose file to add your mysql credentials

# To seed tables inside database 
docker-compose exec php php artisan migrate  

# Command to seed users into database every 8 hours  (combine urls and sync into database)
docker-compose exec php php artisan users:seed  

# Command to check next time of command schedule
docker-compose exec php php artisan schedule:list

# Running tests
docker-compose exec php php artisan test

```


### Postman collection 

All the APIs are in the collection.

Just import this collection into POSTMAN

https://www.getpostman.com/collections/1fd35fab58cd260682d8