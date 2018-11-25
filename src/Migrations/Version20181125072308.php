<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181125072308 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE law_votes (law_uuid VARCHAR(255) NOT NULL, vote_uuid VARCHAR(255) NOT NULL, INDEX IDX_3A11F6E93F8C715 (law_uuid), INDEX IDX_3A11F6E661DA197 (vote_uuid), PRIMARY KEY(law_uuid, vote_uuid)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE law_votes ADD CONSTRAINT FK_3A11F6E93F8C715 FOREIGN KEY (law_uuid) REFERENCES law (uuid)');
        $this->addSql('ALTER TABLE law_votes ADD CONSTRAINT FK_3A11F6E661DA197 FOREIGN KEY (vote_uuid) REFERENCES law_vote (uuid)');
        $this->addSql('ALTER TABLE law_vote DROP FOREIGN KEY FK_189712D793F8C715');
        $this->addSql('DROP INDEX IDX_189712D793F8C715 ON law_vote');
        $this->addSql('ALTER TABLE law_vote DROP law_uuid');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE law_votes');
        $this->addSql('ALTER TABLE law_vote ADD law_uuid VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE law_vote ADD CONSTRAINT FK_189712D793F8C715 FOREIGN KEY (law_uuid) REFERENCES law (uuid)');
        $this->addSql('CREATE INDEX IDX_189712D793F8C715 ON law_vote (law_uuid)');
    }
}
