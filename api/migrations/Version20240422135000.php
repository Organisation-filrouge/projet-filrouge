<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240422135000 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fournir_produit ADD fournisseur_id INT DEFAULT NULL, ADD produit_id INT DEFAULT NULL, ADD quantite DOUBLE PRECISION NOT NULL, DROP quantity');
        $this->addSql('ALTER TABLE fournir_produit ADD CONSTRAINT FK_CB3ED231670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseur (id)');
        $this->addSql('ALTER TABLE fournir_produit ADD CONSTRAINT FK_CB3ED231F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('CREATE INDEX IDX_CB3ED231670C757F ON fournir_produit (fournisseur_id)');
        $this->addSql('CREATE INDEX IDX_CB3ED231F347EFB ON fournir_produit (produit_id)');
        $this->addSql('ALTER TABLE fournisseur DROP FOREIGN KEY FK_369ECA323187F06A');
        $this->addSql('DROP INDEX IDX_369ECA323187F06A ON fournisseur');
        $this->addSql('ALTER TABLE fournisseur DROP fournir_produit_id');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC273187F06A');
        $this->addSql('DROP INDEX IDX_29A5EC273187F06A ON produit');
        $this->addSql('ALTER TABLE produit DROP fournir_produit_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE fournisseur ADD fournir_produit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE fournisseur ADD CONSTRAINT FK_369ECA323187F06A FOREIGN KEY (fournir_produit_id) REFERENCES fournir_produit (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_369ECA323187F06A ON fournisseur (fournir_produit_id)');
        $this->addSql('ALTER TABLE fournir_produit DROP FOREIGN KEY FK_CB3ED231670C757F');
        $this->addSql('ALTER TABLE fournir_produit DROP FOREIGN KEY FK_CB3ED231F347EFB');
        $this->addSql('DROP INDEX IDX_CB3ED231670C757F ON fournir_produit');
        $this->addSql('DROP INDEX IDX_CB3ED231F347EFB ON fournir_produit');
        $this->addSql('ALTER TABLE fournir_produit ADD quantity INT NOT NULL, DROP fournisseur_id, DROP produit_id, DROP quantite');
        $this->addSql('ALTER TABLE produit ADD fournir_produit_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC273187F06A FOREIGN KEY (fournir_produit_id) REFERENCES fournir_produit (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_29A5EC273187F06A ON produit (fournir_produit_id)');
    }
}
