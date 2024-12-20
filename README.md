Sujet recette 

1. Lancer `docker compose build --no-cache` pour construire le docker
2. Lancer `docker compose up --pull always -d --wait` pour lancer le docker
3. Site `https://localhost` 
4. Lancer `docker compose down --remove-orphans` pour stoper le docker
5. Lancer `docker-compose exec php php bin/console make:migration` pour creer les tables dans la bdd
6. Lancer `docker-compose exec php php bin/console doctrine:fixtures:load ` pour lancer les fixtures
