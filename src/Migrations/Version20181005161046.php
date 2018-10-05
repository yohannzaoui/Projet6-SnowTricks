<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181005161046 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE avatar DROP FOREIGN KEY FK_1677722F86383B10');
        $this->addSql('DROP INDEX UNIQ_1677722F86383B10 ON avatar');
        $this->addSql('ALTER TABLE avatar CHANGE avatar_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE avatar ADD CONSTRAINT FK_1677722FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1677722FA76ED395 ON avatar (user_id)');
        $this->addSql('ALTER TABLE user DROP avatar_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE avatar DROP FOREIGN KEY FK_1677722FA76ED395');
        $this->addSql('DROP INDEX UNIQ_1677722FA76ED395 ON avatar');
        $this->addSql('ALTER TABLE avatar CHANGE user_id avatar_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE avatar ADD CONSTRAINT FK_1677722F86383B10 FOREIGN KEY (avatar_id) REFERENCES user (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1677722F86383B10 ON avatar (avatar_id)');
        $this->addSql('ALTER TABLE user ADD avatar_id INT DEFAULT NULL');
    }
}
