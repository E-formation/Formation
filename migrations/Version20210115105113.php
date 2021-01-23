<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210115105113 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE emploidutemps (id INT AUTO_INCREMENT NOT NULL, enseignant_id INT DEFAULT NULL, etudiant_id INT DEFAULT NULL, administrateur_id INT DEFAULT NULL, date DATE NOT NULL, salle_de_cours VARCHAR(255) NOT NULL, code_matiere VARCHAR(255) NOT NULL, nom_matiere VARCHAR(255) NOT NULL, nombre_heure_cours VARCHAR(255) NOT NULL, INDEX IDX_5152B578E455FCC0 (enseignant_id), INDEX IDX_5152B578DDEAB1A3 (etudiant_id), INDEX IDX_5152B5787EE5403C (administrateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE matiere (id INT AUTO_INCREMENT NOT NULL, enseignant_id INT DEFAULT NULL, etudiant_id INT DEFAULT NULL, note_id INT DEFAULT NULL, nom_matiere VARCHAR(255) NOT NULL, coefficient INT NOT NULL, cours VARCHAR(255) NOT NULL, absence VARCHAR(255) NOT NULL, INDEX IDX_9014574AE455FCC0 (enseignant_id), INDEX IDX_9014574ADDEAB1A3 (etudiant_id), INDEX IDX_9014574A26ED0855 (note_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE note (id INT AUTO_INCREMENT NOT NULL, notematiere INT NOT NULL, semestre INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE emploidutemps ADD CONSTRAINT FK_5152B578E455FCC0 FOREIGN KEY (enseignant_id) REFERENCES enseignant (id)');
        $this->addSql('ALTER TABLE emploidutemps ADD CONSTRAINT FK_5152B578DDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE emploidutemps ADD CONSTRAINT FK_5152B5787EE5403C FOREIGN KEY (administrateur_id) REFERENCES administrateur (id)');
        $this->addSql('ALTER TABLE matiere ADD CONSTRAINT FK_9014574AE455FCC0 FOREIGN KEY (enseignant_id) REFERENCES enseignant (id)');
        $this->addSql('ALTER TABLE matiere ADD CONSTRAINT FK_9014574ADDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE matiere ADD CONSTRAINT FK_9014574A26ED0855 FOREIGN KEY (note_id) REFERENCES note (id)');
        $this->addSql('ALTER TABLE administrateur DROP FOREIGN KEY FK_32EB52E87EE5403C');
        $this->addSql('DROP INDEX IDX_32EB52E87EE5403C ON administrateur');
        $this->addSql('ALTER TABLE administrateur ADD enseignant_id INT DEFAULT NULL, CHANGE administrateur_id etudiant_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE administrateur ADD CONSTRAINT FK_32EB52E8DDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('ALTER TABLE administrateur ADD CONSTRAINT FK_32EB52E8E455FCC0 FOREIGN KEY (enseignant_id) REFERENCES enseignant (id)');
        $this->addSql('CREATE INDEX IDX_32EB52E8DDEAB1A3 ON administrateur (etudiant_id)');
        $this->addSql('CREATE INDEX IDX_32EB52E8E455FCC0 ON administrateur (enseignant_id)');
        $this->addSql('ALTER TABLE etudiant CHANGE annee_inscrit annee_inscrit DATE NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE matiere DROP FOREIGN KEY FK_9014574A26ED0855');
        $this->addSql('DROP TABLE emploidutemps');
        $this->addSql('DROP TABLE matiere');
        $this->addSql('DROP TABLE note');
        $this->addSql('ALTER TABLE administrateur DROP FOREIGN KEY FK_32EB52E8DDEAB1A3');
        $this->addSql('ALTER TABLE administrateur DROP FOREIGN KEY FK_32EB52E8E455FCC0');
        $this->addSql('DROP INDEX IDX_32EB52E8DDEAB1A3 ON administrateur');
        $this->addSql('DROP INDEX IDX_32EB52E8E455FCC0 ON administrateur');
        $this->addSql('ALTER TABLE administrateur ADD administrateur_id INT DEFAULT NULL, DROP etudiant_id, DROP enseignant_id');
        $this->addSql('ALTER TABLE administrateur ADD CONSTRAINT FK_32EB52E87EE5403C FOREIGN KEY (administrateur_id) REFERENCES administrateur (id)');
        $this->addSql('CREATE INDEX IDX_32EB52E87EE5403C ON administrateur (administrateur_id)');
        $this->addSql('ALTER TABLE etudiant CHANGE annee_inscrit annee_inscrit INT NOT NULL');
    }
}
