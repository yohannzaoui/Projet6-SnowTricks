<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181121135541 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE trick ADD defaultImage_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE trick ADD CONSTRAINT FK_D8F0A91E421EF703 FOREIGN KEY (defaultImage_id) REFERENCES image (id) ON DELETE CASCADE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D8F0A91E421EF703 ON trick (defaultImage_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE trick DROP FOREIGN KEY FK_D8F0A91E421EF703');
        $this->addSql('DROP INDEX UNIQ_D8F0A91E421EF703 ON trick');
        $this->addSql('ALTER TABLE trick DROP defaultImage_id');
    }
}
