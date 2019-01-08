<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181125221216 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE education_history (id INT AUTO_INCREMENT NOT NULL, user_informations_id INT DEFAULT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, school VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, degree_title VARCHAR(255) NOT NULL, INDEX IDX_3B9E1F938284110D (user_informations_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employment_history (id INT AUTO_INCREMENT NOT NULL, user_informations_id INT DEFAULT NULL, job_title VARCHAR(255) NOT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, company VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_F93B3F928284110D (user_informations_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hobby (id INT AUTO_INCREMENT NOT NULL, user_info_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, icon VARCHAR(255) DEFAULT NULL, INDEX IDX_3964F337586DFF2 (user_info_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE language_skill (id INT AUTO_INCREMENT NOT NULL, user_info_id INT DEFAULT NULL, language_spoken VARCHAR(255) NOT NULL, rating INT NOT NULL, INDEX IDX_2165E026586DFF2 (user_info_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE professional_skill (id INT AUTO_INCREMENT NOT NULL, skill_category_id INT DEFAULT NULL, user_info_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, INDEX IDX_3F445E9DAC58042E (skill_category_id), INDEX IDX_3F445E9D586DFF2 (user_info_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE resume (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, template_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, path VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, popularity INT NOT NULL, INDEX IDX_60C1D0A0A76ED395 (user_id), INDEX IDX_60C1D0A05DA0FB8 (template_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill_category (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE template (id INT AUTO_INCREMENT NOT NULL, template_category_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, html LONGTEXT DEFAULT NULL, css LONGTEXT DEFAULT NULL, INDEX IDX_97601F8319BF8986 (template_category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE template_category (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_informations (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, driver_license VARCHAR(255) DEFAULT NULL, summary LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_EF5A188BA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE education_history ADD CONSTRAINT FK_3B9E1F938284110D FOREIGN KEY (user_informations_id) REFERENCES user_informations (id)');
        $this->addSql('ALTER TABLE employment_history ADD CONSTRAINT FK_F93B3F928284110D FOREIGN KEY (user_informations_id) REFERENCES user_informations (id)');
        $this->addSql('ALTER TABLE hobby ADD CONSTRAINT FK_3964F337586DFF2 FOREIGN KEY (user_info_id) REFERENCES user_informations (id)');
        $this->addSql('ALTER TABLE language_skill ADD CONSTRAINT FK_2165E026586DFF2 FOREIGN KEY (user_info_id) REFERENCES user_informations (id)');
        $this->addSql('ALTER TABLE professional_skill ADD CONSTRAINT FK_3F445E9DAC58042E FOREIGN KEY (skill_category_id) REFERENCES skill_category (id)');
        $this->addSql('ALTER TABLE professional_skill ADD CONSTRAINT FK_3F445E9D586DFF2 FOREIGN KEY (user_info_id) REFERENCES user_informations (id)');
        $this->addSql('ALTER TABLE resume ADD CONSTRAINT FK_60C1D0A0A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE resume ADD CONSTRAINT FK_60C1D0A05DA0FB8 FOREIGN KEY (template_id) REFERENCES template (id)');
        $this->addSql('ALTER TABLE template ADD CONSTRAINT FK_97601F8319BF8986 FOREIGN KEY (template_category_id) REFERENCES template_category (id)');
        $this->addSql('ALTER TABLE user_informations ADD CONSTRAINT FK_EF5A188BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE professional_skill DROP FOREIGN KEY FK_3F445E9DAC58042E');
        $this->addSql('ALTER TABLE resume DROP FOREIGN KEY FK_60C1D0A05DA0FB8');
        $this->addSql('ALTER TABLE template DROP FOREIGN KEY FK_97601F8319BF8986');
        $this->addSql('ALTER TABLE education_history DROP FOREIGN KEY FK_3B9E1F938284110D');
        $this->addSql('ALTER TABLE employment_history DROP FOREIGN KEY FK_F93B3F928284110D');
        $this->addSql('ALTER TABLE hobby DROP FOREIGN KEY FK_3964F337586DFF2');
        $this->addSql('ALTER TABLE language_skill DROP FOREIGN KEY FK_2165E026586DFF2');
        $this->addSql('ALTER TABLE professional_skill DROP FOREIGN KEY FK_3F445E9D586DFF2');
        $this->addSql('DROP TABLE education_history');
        $this->addSql('DROP TABLE employment_history');
        $this->addSql('DROP TABLE hobby');
        $this->addSql('DROP TABLE language_skill');
        $this->addSql('DROP TABLE professional_skill');
        $this->addSql('DROP TABLE resume');
        $this->addSql('DROP TABLE skill_category');
        $this->addSql('DROP TABLE template');
        $this->addSql('DROP TABLE template_category');
        $this->addSql('DROP TABLE user_informations');
    }
}
