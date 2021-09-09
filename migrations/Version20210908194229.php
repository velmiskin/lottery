<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210908194229 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE participant (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', status_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', salutation_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', INDEX IDX_D79F6B116BF700BD (status_id), INDEX IDX_D79F6B112E5AD854 (salutation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salutation (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', title VARCHAR(32) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(255) NOT NULL, mail_subject VARCHAR(255) NOT NULL, mail_body VARCHAR(255) NOT NULL, is_default TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE participant ADD CONSTRAINT FK_D79F6B116BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE participant ADD CONSTRAINT FK_D79F6B112E5AD854 FOREIGN KEY (salutation_id) REFERENCES salutation (id)');
        $this->addSql('ALTER TABLE user CHANGE id id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE participant DROP FOREIGN KEY FK_D79F6B112E5AD854');
        $this->addSql('ALTER TABLE participant DROP FOREIGN KEY FK_D79F6B116BF700BD');
        $this->addSql('DROP TABLE participant');
        $this->addSql('DROP TABLE salutation');
        $this->addSql('DROP TABLE status');
        $this->addSql('ALTER TABLE user CHANGE id id VARCHAR(36) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
