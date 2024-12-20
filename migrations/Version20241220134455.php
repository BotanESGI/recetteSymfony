<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241220134455 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE avis (id SERIAL NOT NULL, utilisateur_id INT NOT NULL, recette_id INT NOT NULL, contenu TEXT NOT NULL, note INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_8F91ABF0FB88E14F ON avis (utilisateur_id)');
        $this->addSql('CREATE INDEX IDX_8F91ABF089312FE9 ON avis (recette_id)');
        $this->addSql('CREATE TABLE etape (id SERIAL NOT NULL, recette_id INT NOT NULL, description TEXT NOT NULL, numero_ordre INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_285F75DD89312FE9 ON etape (recette_id)');
        $this->addSql('CREATE TABLE ingredient (id SERIAL NOT NULL, recette_id INT NOT NULL, nom VARCHAR(255) NOT NULL, quantite VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_6BAF787089312FE9 ON ingredient (recette_id)');
        $this->addSql('CREATE TABLE recette (id SERIAL NOT NULL, titre VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, temps_preparation INT NOT NULL, temps_cuisson INT DEFAULT NULL, instructions VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "user" (id SERIAL NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, roles JSON NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF0FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF089312FE9 FOREIGN KEY (recette_id) REFERENCES recette (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE etape ADD CONSTRAINT FK_285F75DD89312FE9 FOREIGN KEY (recette_id) REFERENCES recette (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE ingredient ADD CONSTRAINT FK_6BAF787089312FE9 FOREIGN KEY (recette_id) REFERENCES recette (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE avis DROP CONSTRAINT FK_8F91ABF0FB88E14F');
        $this->addSql('ALTER TABLE avis DROP CONSTRAINT FK_8F91ABF089312FE9');
        $this->addSql('ALTER TABLE etape DROP CONSTRAINT FK_285F75DD89312FE9');
        $this->addSql('ALTER TABLE ingredient DROP CONSTRAINT FK_6BAF787089312FE9');
        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE etape');
        $this->addSql('DROP TABLE ingredient');
        $this->addSql('DROP TABLE recette');
        $this->addSql('DROP TABLE "user"');
    }
}
