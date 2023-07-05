<?php

namespace App\Form\Admin;

use App\Entity\Admin\Cargo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CargoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('KargoId')
            ->add('alici_adi')
            ->add('alici_adresi')
            ->add('gönderici_adi')
            ->add('gönderici_adresi')
            ->add('agirlik')
            ->add('boyutlar')
            ->add('gönderim_tarihi')
            ->add('teslimat_durumu')
            ->add('odeme_durumu')
            ->add('created_at')
            ->add('update_at')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cargo::class,
        ]);
    }
}
