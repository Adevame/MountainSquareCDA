<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240910114539 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE passage ADD CONSTRAINT FK_2B258F67166053B4 FOREIGN KEY (scene_id) REFERENCES scene (id)');
        $this->addSql('CREATE INDEX IDX_2B258F67166053B4 ON passage (scene_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE passage DROP FOREIGN KEY FK_2B258F67166053B4');
        $this->addSql('DROP INDEX IDX_2B258F67166053B4 ON passage');
        $this->addSql('ALTER TABLE scene_passage DROP FOREIGN KEY FK_95909311166053B4');
        $this->addSql('ALTER TABLE scene_passage DROP FOREIGN KEY FK_95909311DCC6487D');
    }
}
