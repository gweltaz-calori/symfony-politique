<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181124135007 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE law (uuid VARCHAR(255) NOT NULL, president_uuid VARCHAR(255) DEFAULT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_C0B552F8379D2A5 (president_uuid), PRIMARY KEY(uuid)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE law_vote (uuid VARCHAR(255) NOT NULL, law_uuid VARCHAR(255) DEFAULT NULL, person_uuid VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_189712D793F8C715 (law_uuid), UNIQUE INDEX UNIQ_189712D75B99D48D (person_uuid), PRIMARY KEY(uuid)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE person (uuid VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(uuid)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE political_party (uuid VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(uuid)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE president (uuid VARCHAR(255) NOT NULL, political_party_uuid VARCHAR(255) DEFAULT NULL, name VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_6E8BD214F6EF5B9D (political_party_uuid), PRIMARY KEY(uuid)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE law ADD CONSTRAINT FK_C0B552F8379D2A5 FOREIGN KEY (president_uuid) REFERENCES president (uuid)');
        $this->addSql('ALTER TABLE law_vote ADD CONSTRAINT FK_189712D793F8C715 FOREIGN KEY (law_uuid) REFERENCES law (uuid)');
        $this->addSql('ALTER TABLE law_vote ADD CONSTRAINT FK_189712D75B99D48D FOREIGN KEY (person_uuid) REFERENCES person (uuid)');
        $this->addSql('ALTER TABLE president ADD CONSTRAINT FK_6E8BD214F6EF5B9D FOREIGN KEY (political_party_uuid) REFERENCES political_party (uuid)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE law_vote DROP FOREIGN KEY FK_189712D793F8C715');
        $this->addSql('ALTER TABLE law_vote DROP FOREIGN KEY FK_189712D75B99D48D');
        $this->addSql('ALTER TABLE president DROP FOREIGN KEY FK_6E8BD214F6EF5B9D');
        $this->addSql('ALTER TABLE law DROP FOREIGN KEY FK_C0B552F8379D2A5');
        $this->addSql('DROP TABLE law');
        $this->addSql('DROP TABLE law_vote');
        $this->addSql('DROP TABLE person');
        $this->addSql('DROP TABLE political_party');
        $this->addSql('DROP TABLE president');
    }
}
