
chmod +x bin/console

# update dependences
docker compose exec php composer install

# connect to container
docker exec -it php-fpm  /bin/bash

# generate jwt keys
php bin/console lexik:jwt:generate-keypair 
  setfacl -R -m u:www-data:rX -m u:"$(whoami)":rwX config/jwt
  setfacl -dR -m u:www-data:rX -m u:"$(whoami)":rwX config/jwt

# load fixtures

docker compose exec php bin/console doctrine:fixtures:load

# update bdd

docker compose exec php bin/console doctrine:database:drop --force
docker compose exec php bin/console doctrine:database:create
docker compose exec php-fpm bin/console doctrine:schema:update --force --dump-sql


# pour tué les port deja utilisé
sudo netstat -pna | grep 5173
sudo kill -9 `sudo lsof -t -i:5173`
