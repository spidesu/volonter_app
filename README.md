install:<br>
docker-compose build
docker-compose exec -it @name_app / <br>
 && composer install / <br>
 && php artisan migrate / <br>
 && php artisan passport:install / <br>
 && mkdir -p storage/api-docs / <br>
 
 php artisan doc: <br> /generate doc
 docker-compose exec -it @name_app / <br>
  && php artisan doc 
  
  
