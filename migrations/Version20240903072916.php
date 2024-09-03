<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240903072916 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE date_horaire (id INT AUTO_INCREMENT NOT NULL, time DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formule (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, tarif DOUBLE PRECISION NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jour (id INT AUTO_INCREMENT NOT NULL, numéro INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jour_scene (jour_id INT NOT NULL, scene_id INT NOT NULL, INDEX IDX_DB514EA9220C6AD0 (jour_id), INDEX IDX_DB514EA9166053B4 (scene_id), PRIMARY KEY(jour_id, scene_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jour_performer (jour_id INT NOT NULL, performer_id INT NOT NULL, INDEX IDX_542FC48220C6AD0 (jour_id), INDEX IDX_542FC486C6B33F3 (performer_id), PRIMARY KEY(jour_id, performer_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE jour_date_horaire (jour_id INT NOT NULL, date_horaire_id INT NOT NULL, INDEX IDX_D6579EF8220C6AD0 (jour_id), INDEX IDX_D6579EF894F644B3 (date_horaire_id), PRIMARY KEY(jour_id, date_horaire_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE performer (id INT AUTO_INCREMENT NOT NULL, prestation_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_17210BEB9E45C554 (prestation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE performer_scene (performer_id INT NOT NULL, scene_id INT NOT NULL, INDEX IDX_59F5A4B86C6B33F3 (performer_id), INDEX IDX_59F5A4B8166053B4 (scene_id), PRIMARY KEY(performer_id, scene_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scene (id INT AUTO_INCREMENT NOT NULL, numero INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scene_date_horaire (scene_id INT NOT NULL, date_horaire_id INT NOT NULL, INDEX IDX_57A178CE166053B4 (scene_id), INDEX IDX_57A178CE94F644B3 (date_horaire_id), PRIMARY KEY(scene_id, date_horaire_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE jour_scene ADD CONSTRAINT FK_DB514EA9220C6AD0 FOREIGN KEY (jour_id) REFERENCES jour (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE jour_scene ADD CONSTRAINT FK_DB514EA9166053B4 FOREIGN KEY (scene_id) REFERENCES scene (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE jour_performer ADD CONSTRAINT FK_542FC48220C6AD0 FOREIGN KEY (jour_id) REFERENCES jour (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE jour_performer ADD CONSTRAINT FK_542FC486C6B33F3 FOREIGN KEY (performer_id) REFERENCES performer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE jour_date_horaire ADD CONSTRAINT FK_D6579EF8220C6AD0 FOREIGN KEY (jour_id) REFERENCES jour (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE jour_date_horaire ADD CONSTRAINT FK_D6579EF894F644B3 FOREIGN KEY (date_horaire_id) REFERENCES date_horaire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE performer ADD CONSTRAINT FK_17210BEB9E45C554 FOREIGN KEY (prestation_id) REFERENCES date_horaire (id)');
        $this->addSql('ALTER TABLE performer_scene ADD CONSTRAINT FK_59F5A4B86C6B33F3 FOREIGN KEY (performer_id) REFERENCES performer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE performer_scene ADD CONSTRAINT FK_59F5A4B8166053B4 FOREIGN KEY (scene_id) REFERENCES scene (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scene_date_horaire ADD CONSTRAINT FK_57A178CE166053B4 FOREIGN KEY (scene_id) REFERENCES scene (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scene_date_horaire ADD CONSTRAINT FK_57A178CE94F644B3 FOREIGN KEY (date_horaire_id) REFERENCES date_horaire (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE jour_scene DROP FOREIGN KEY FK_DB514EA9220C6AD0');
        $this->addSql('ALTER TABLE jour_scene DROP FOREIGN KEY FK_DB514EA9166053B4');
        $this->addSql('ALTER TABLE jour_performer DROP FOREIGN KEY FK_542FC48220C6AD0');
        $this->addSql('ALTER TABLE jour_performer DROP FOREIGN KEY FK_542FC486C6B33F3');
        $this->addSql('ALTER TABLE jour_date_horaire DROP FOREIGN KEY FK_D6579EF8220C6AD0');
        $this->addSql('ALTER TABLE jour_date_horaire DROP FOREIGN KEY FK_D6579EF894F644B3');
        $this->addSql('ALTER TABLE performer DROP FOREIGN KEY FK_17210BEB9E45C554');
        $this->addSql('ALTER TABLE performer_scene DROP FOREIGN KEY FK_59F5A4B86C6B33F3');
        $this->addSql('ALTER TABLE performer_scene DROP FOREIGN KEY FK_59F5A4B8166053B4');
        $this->addSql('ALTER TABLE scene_date_horaire DROP FOREIGN KEY FK_57A178CE166053B4');
        $this->addSql('ALTER TABLE scene_date_horaire DROP FOREIGN KEY FK_57A178CE94F644B3');
        $this->addSql('DROP TABLE date_horaire');
        $this->addSql('DROP TABLE formule');
        $this->addSql('DROP TABLE jour');
        $this->addSql('DROP TABLE jour_scene');
        $this->addSql('DROP TABLE jour_performer');
        $this->addSql('DROP TABLE jour_date_horaire');
        $this->addSql('DROP TABLE performer');
        $this->addSql('DROP TABLE performer_scene');
        $this->addSql('DROP TABLE scene');
        $this->addSql('DROP TABLE scene_date_horaire');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
