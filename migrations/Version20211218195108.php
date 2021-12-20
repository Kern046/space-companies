<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211218195108 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE company__companies ADD slug VARCHAR(120) NOT NULL');
        $this->addSql('ALTER TABLE company__companies ADD description TEXT NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7256E2B1989D9B62 ON company__companies (slug)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP INDEX UNIQ_7256E2B1989D9B62');
        $this->addSql('ALTER TABLE company__companies DROP slug');
        $this->addSql('ALTER TABLE company__companies DROP description');
    }
}
