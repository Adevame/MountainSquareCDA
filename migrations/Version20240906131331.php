<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240906131331 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE passage (id INT AUTO_INCREMENT NOT NULL, performers_id INT NOT NULL, horaires_id INT NOT NULL, scene_id INT NOT NULL, jour_id INT NOT NULL, INDEX IDX_2B258F67C3A975B0 (performers_id), INDEX IDX_2B258F678AF49C8B (horaires_id), INDEX IDX_2B258F67166053B4 (scene_id), INDEX IDX_2B258F67220C6AD0 (jour_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE passage ADD CONSTRAINT FK_2B258F67C3A975B0 FOREIGN KEY (performers_id) REFERENCES performer (id)');
        $this->addSql('ALTER TABLE passage ADD CONSTRAINT FK_2B258F678AF49C8B FOREIGN KEY (horaires_id) REFERENCES date_horaire (id)');
        $this->addSql('ALTER TABLE passage ADD CONSTRAINT FK_2B258F67166053B4 FOREIGN KEY (scene_id) REFERENCES scene (id)');
        $this->addSql('ALTER TABLE passage ADD CONSTRAINT FK_2B258F67220C6AD0 FOREIGN KEY (jour_id) REFERENCES jour (id)');
        $this->addSql('ALTER TABLE date_horaire CHANGE time time DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE passage DROP FOREIGN KEY FK_2B258F67C3A975B0');
        $this->addSql('ALTER TABLE passage DROP FOREIGN KEY FK_2B258F678AF49C8B');
        $this->addSql('ALTER TABLE passage DROP FOREIGN KEY FK_2B258F67166053B4');
        $this->addSql('ALTER TABLE passage DROP FOREIGN KEY FK_2B258F67220C6AD0');
        $this->addSql('DROP TABLE passage');
        $this->addSql('ALTER TABLE date_horaire CHANGE time time DATETIME NOT NULL');
    }
}
