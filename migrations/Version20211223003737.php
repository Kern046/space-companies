<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211223003737 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE production__product__products ADD company_id UUID DEFAULT NULL');
        $this->addSql('ALTER TABLE production__product__products ADD slug VARCHAR(100) NOT NULL');
        $this->addSql('COMMENT ON COLUMN production__product__products.company_id IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE production__product__products ADD CONSTRAINT FK_3A43002B979B1AD6 FOREIGN KEY (company_id) REFERENCES company__companies (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_3A43002B979B1AD6 ON production__product__products (company_id)');
        $this->addSql('CREATE UNIQUE INDEX company_slug_uniq ON production__product__products (slug, company_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE production__product__products DROP CONSTRAINT FK_3A43002B979B1AD6');
        $this->addSql('DROP INDEX IDX_3A43002B979B1AD6');
        $this->addSql('DROP INDEX company_slug_uniq');
        $this->addSql('ALTER TABLE production__product__products DROP company_id');
        $this->addSql('ALTER TABLE production__product__products DROP slug');
    }
}
