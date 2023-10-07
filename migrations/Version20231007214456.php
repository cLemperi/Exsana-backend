<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231007214456 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE formations (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, price VARCHAR(255) DEFAULT NULL, for_who VARCHAR(255) DEFAULT NULL, prerequisite VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', date_formation VARCHAR(255) DEFAULT NULL, duration_formation VARCHAR(255) DEFAULT NULL, location VARCHAR(255) DEFAULT NULL, slug VARCHAR(255) NOT NULL, intervenant VARCHAR(255) DEFAULT NULL, evaluation VARCHAR(255) DEFAULT NULL, public_acces_and_condition VARCHAR(255) DEFAULT NULL, programme_pedago_file VARCHAR(255) DEFAULT NULL, INDEX IDX_4090213712469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE objectif_formation (id INT AUTO_INCREMENT NOT NULL, formations_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, content VARCHAR(500) DEFAULT NULL, INDEX IDX_400F6A93BF5B0C2 (formations_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE programme_formation (id INT AUTO_INCREMENT NOT NULL, formations_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, content VARCHAR(500) DEFAULT NULL, INDEX IDX_905A86B13BF5B0C2 (formations_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE formations ADD CONSTRAINT FK_4090213712469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE objectif_formation ADD CONSTRAINT FK_400F6A93BF5B0C2 FOREIGN KEY (formations_id) REFERENCES formations (id)');
        $this->addSql('ALTER TABLE programme_formation ADD CONSTRAINT FK_905A86B13BF5B0C2 FOREIGN KEY (formations_id) REFERENCES formations (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE formations DROP FOREIGN KEY FK_4090213712469DE2');
        $this->addSql('ALTER TABLE objectif_formation DROP FOREIGN KEY FK_400F6A93BF5B0C2');
        $this->addSql('ALTER TABLE programme_formation DROP FOREIGN KEY FK_905A86B13BF5B0C2');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE formations');
        $this->addSql('DROP TABLE objectif_formation');
        $this->addSql('DROP TABLE programme_formation');
    }
}
