<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181004110858 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE `group` CHANGE trick_id trick_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `group` ADD CONSTRAINT FK_6DC044C5B281BE2E FOREIGN KEY (trick_id) REFERENCES trick (id)');
        $this->addSql('CREATE INDEX IDX_6DC044C5B281BE2E ON `group` (trick_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE `group` DROP FOREIGN KEY FK_6DC044C5B281BE2E');
        $this->addSql('DROP INDEX IDX_6DC044C5B281BE2E ON `group`');
        $this->addSql('ALTER TABLE `group` CHANGE trick_id trick_id INT NOT NULL');
    }
}
