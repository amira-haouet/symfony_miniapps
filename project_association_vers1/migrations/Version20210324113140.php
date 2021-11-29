<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210324113140 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE membre DROP name, DROP mail, CHANGE email email LONGTEXT NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F6B4FB29A9D1C132 ON membre (first_name)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F6B4FB2935C246D5 ON membre (password)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_F6B4FB29A9D1C132 ON membre');
        $this->addSql('DROP INDEX UNIQ_F6B4FB2935C246D5 ON membre');
        $this->addSql('ALTER TABLE membre ADD name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD mail LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
