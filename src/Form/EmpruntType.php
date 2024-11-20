<?php

namespace App\Form;

use App\Entity\Emprunt;
use App\Entity\Livre;
use App\Entity\Utilisateur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmpruntType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date_emprunt', null, [
                'widget' => 'single_text',
            ])
            ->add('date_retour', null, [
                'widget' => 'single_text',
            ])
            ->add('livres', EntityType::class, [
                'class' => Livre::class,
                'choice_label' => 'id',
            ])
            ->add('utilisateurs', EntityType::class, [
                'class' => Utilisateur::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Emprunt::class,
        ]);
    }
}
