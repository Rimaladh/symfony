<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
class Utilisateur implements UserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(length: 80)]
    private ?string $email = null;

    #[ORM\Column(length: 20)]
    private ?string $telephone = null;

    #[ORM\ManyToOne(inversedBy: 'utilisateur')]
    private ?Emprunt $historique_emprunts = null;

    #[ORM\Column(length: 255)]
    private ?string $motDePasse = null;

    
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getHistoriqueEmprunts(): ?Emprunt
    {
        return $this->historique_emprunts;
    }

    public function setHistoriqueEmprunts(?Emprunt $historique_emprunts): static
    {
        $this->historique_emprunts = $historique_emprunts;

        return $this;
    }

    public function getMotDePasse(): ?string
    {
        return $this->motDePasse;
    }

    public function setMotDePasse(string $motDePasse): static
    {
        $this->motDePasse = $motDePasse;

        return $this;
    }

    // Methods for UserInterface
    public function getRoles(): array {
        // Default role for users
        return ['ROLE_USER'];
    }

    // Implementing getUserIdentifier method
    public function getUserIdentifier(): string
    {
        return $this->email; // Return the email as the user identifier
    }

    public function eraseCredentials(): void {
        // You can implement this if you need to clear temporary data
    }

    
}
