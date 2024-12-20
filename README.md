Sujet recette 

1. Lancer `docker compose build --no-cache` pour construire le docker
2. Lancer `docker compose up --pull always -d --wait` pour lancer le docker
3. Site `https://localhost` 
4. Lancer `docker compose down --remove-orphans` pour stoper le docker
5. Lancer `docker-compose exec php php bin/console doctrine:migrations:migrate` pour creer les tables dans la bdd
6. Lancer `docker-compose exec php php bin/console doctrine:fixtures:load ` pour lancer les fixtures

Features fait sur le projet :

1. Créer les entités et faire les relations (minimum 4 entités) ✅
2. Créer des fixtures (PHP ou YAML) ✅
3. Faire l'authentification ✅
   - login ✅
   - mdp oublié, reset mdp ✅
   - Avoir 3 roles différents (ADMIN, USER, BANNED) ✅

4. Afficher du contenu dynamiquement en fonction de si l'utilisateur est connecté ou non ✅
   - Si connecté, afficher son nom et prénom ✅
   - Si non connecté, afficher un bouton pour se connecter ✅
   - Si connecté, afficher un bouton pour se déconnecter ✅

5. Afficher du contenu dynamiquement en fonction de si l'utilisateur à certains roles ou non
- Si ADMIN, afficher un bouton pour accéder à l'admin
- Si USER, afficher un bouton pour accéder à son profil
- Si BANNED, afficher un message pour dire qu'il est banni et ne pas lui afficher les pages
6. Faire les pages pour lire/créer/modifier/supprimer les différentes entités

Toute chose qui n'est pas demandé fera des points en +
- Chiffrage du mdp ✅
- Confirmation du mdp dans le mdp oublié ✅
- Mdp robuste dans le mdp oublié ✅
- Gestion expiration token dans le mdp oublié ✅
- Feature register non demandé fait ✅
- Envoie mail dans le register (confirmation d'email) ✅
- Envoie mail dans le mdp oublié ✅


Plus d'entités = Pts en +
J'ai rajouté l'entité : 
Feature pas demandé = Pts en +
Authantification register
modification Mon compte
Techno en + = Pts en +
Mailer
etc ...
