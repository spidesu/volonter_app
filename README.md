install:<br>
docker-compose build
docker-compose exec -it @name_app / <br>
 && composer install / <br>
 && php artisan vendor:publish --provider "L5Swagger\L5SwaggerServiceProvider" / <br>
 && php artisan migrate / <br>
 && php artisan passport:install / <br>
 && mkdir -p storage/api-docs / <br>
 
 generate swagger doc:<br>
 docker-compose exec -it @name_app / <br>
  && php artisan doc 
  
  
