<?php

namespace App\DataFixtures;

use App\Entity\Avis;
use App\Entity\Ingredient;
use App\Entity\Etape;
use App\Entity\Recette;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $users = [];
        for ($i = 1; $i <= 5; $i++) {
            $user = new User();
            $user->setEmail('user' . $i . '@example.com');
            $user->setPassword(password_hash('user' . $i, PASSWORD_BCRYPT));
            $user->setRoles(['ROLE_USER']);
            $manager->persist($user);
            $users[] = $user;
        }

        $admin = new User();
        $admin->setEmail('admin@example.com');
        $admin->setPassword(password_hash('admin', PASSWORD_BCRYPT));
        $admin->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin);

        for ($j = 1; $j <= 10; $j++) {
                $recette = new Recette();
                $recette->setTitre('Recette ' . $j);
                $recette->setDescription('Description de la recette ' . $j);
                $recette->setTempsPreparation(rand(10, 60));
                $recette->setTempsCuisson(rand(10, 60));
                $recette->setInstructions('Instructions de la recette ' . $j);
                $recette->setImage('https://picsum.photos/1920/1080?random=' . $j); // Image aléatoire pour chaque recette
                $manager->persist($recette);

            for ($k = 1; $k <= rand(2, 5); $k++) {
                $ingredient = new Ingredient();
                $ingredient->setNom('Ingrédient ' . $k . ' de la recette ' . $j);
                $ingredient->setQuantite(rand(50, 300) . 'g');
                $ingredient->setRecette($recette);
                $manager->persist($ingredient);
            }

            for ($l = 1; $l <= rand(3, 6); $l++) {
                $etape = new Etape();
                $etape->setDescription('Étape ' . $l . ' de la recette ' . $j);
                $etape->setNumeroOrdre($l);
                $etape->setRecette($recette);
                $manager->persist($etape);
            }

            foreach ($users as $user) {
                $avis = new Avis();
                $avis->setContenu('Ceci est un avis pour la recette ' . $j . ' par ' . $user->getEmail());
                $avis->setNote(rand(1, 5));
                $avis->setRecette($recette);
                $avis->setUtilisateur($user);
                $manager->persist($avis);
            }
        }

        $manager->flush();
    }
}
