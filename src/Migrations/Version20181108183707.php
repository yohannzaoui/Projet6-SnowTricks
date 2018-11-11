<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181108183707 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE comment ADD pseudo_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', DROP pseudo');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C20E394C2 FOREIGN KEY (pseudo_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_9474526C20E394C2 ON comment (pseudo_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C20E394C2');
        $this->addSql('DROP INDEX IDX_9474526C20E394C2 ON comment');
        $this->addSql('ALTER TABLE comment ADD pseudo VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, DROP pseudo_id');
    }
}
