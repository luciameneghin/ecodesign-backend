<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20250716162528 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add default images for legs and seat in furniture';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(<<<'SQL'
            ALTER TABLE furniture
            ADD default_legs_image VARCHAR(255) DEFAULT NULL,
            ADD default_seat_image VARCHAR(255) DEFAULT NULL
        SQL);
    }

    public function down(Schema $schema): void
    {
        $this->addSql(<<<'SQL'
            ALTER TABLE furniture
            DROP default_legs_image,
            DROP default_seat_image
        SQL);
    }
}
