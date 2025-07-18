<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250718153649 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        // $this->addSql(<<<'SQL'
        //     ALTER TABLE furniture CHANGE outdoor outdoor TINYINT(1) NOT NULL, CHANGE category category VARCHAR(255) NOT NULL
        // SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE furniture_leg CHANGE name name VARCHAR(255) DEFAULT NULL, CHANGE image image VARCHAR(255) DEFAULT NULL
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE furniture_leg CHANGE name name VARCHAR(255) NOT NULL, CHANGE image image VARCHAR(255) NOT NULL
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE furniture CHANGE category category VARCHAR(255) DEFAULT NULL, CHANGE outdoor outdoor TINYINT(1) DEFAULT NULL
        SQL);
    }
}
