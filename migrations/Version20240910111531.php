<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240910111531 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE passage_scene DROP FOREIGN KEY FK_D6F2EDEA166053B4');
        $this->addSql('ALTER TABLE passage_scene DROP FOREIGN KEY FK_D6F2EDEADCC6487D');
        $this->addSql('DROP TABLE passage_scene');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE passage_scene (passage_id INT NOT NULL, scene_id INT NOT NULL, INDEX IDX_D6F2EDEADCC6487D (passage_id), INDEX IDX_D6F2EDEA166053B4 (scene_id), PRIMARY KEY(passage_id, scene_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE passage_scene ADD CONSTRAINT FK_D6F2EDEA166053B4 FOREIGN KEY (scene_id) REFERENCES scene (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE passage_scene ADD CONSTRAINT FK_D6F2EDEADCC6487D FOREIGN KEY (passage_id) REFERENCES passage (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE scene_passage DROP FOREIGN KEY FK_95909311166053B4');
        $this->addSql('ALTER TABLE scene_passage DROP FOREIGN KEY FK_95909311DCC6487D');
    }
}
