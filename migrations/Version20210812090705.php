<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210812090705 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE test DROP FOREIGN KEY FK_D87F7E0C1E5D0459');
        $this->addSql('DROP INDEX IDX_D87F7E0C1E5D0459 ON test');
        $this->addSql('ALTER TABLE test DROP test_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE test ADD test_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE test ADD CONSTRAINT FK_D87F7E0C1E5D0459 FOREIGN KEY (test_id) REFERENCES credit (id)');
        $this->addSql('CREATE INDEX IDX_D87F7E0C1E5D0459 ON test (test_id)');
    }
}
