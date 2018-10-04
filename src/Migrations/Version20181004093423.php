<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181004093423 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE trick ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME DEFAULT NULL, DROP category_id, DROP createdAt, DROP updateddAt, CHANGE video video LONGTEXT DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX name ON trick (name)');
        $this->addSql('ALTER TABLE user ADD created_at DATETIME NOT NULL, DROP createdAt, CHANGE avatar avatar VARCHAR(255) DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX email ON user (email)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX name ON trick');
        $this->addSql('ALTER TABLE trick ADD category_id INT DEFAULT NULL, ADD createdAt DATE NOT NULL, ADD updateddAt DATE DEFAULT NULL, DROP created_at, DROP updated_at, CHANGE video video LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('DROP INDEX email ON user');
        $this->addSql('ALTER TABLE user ADD createdAt DATE NOT NULL, DROP created_at, CHANGE avatar avatar VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
