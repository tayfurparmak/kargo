<?php

namespace App\Form;

use App\Entity\Cargo;
use DateTime;
use DateTimeInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Security\Core\User\UserInterface;

class CargoType extends AbstractType
{
    protected Security $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('country', CountryType::class);

        if ($this->security->isGranted('ROLE_ADMIN')) {
            $builder->add('isActive');
        }


        $builder->addEventListener(FormEvents::SUBMIT, function (FormEvent $event) {
            /** @var Cargo $cargo */
            $cargo = $event->getData();

            if (!$cargo->getUser() instanceof UserInterface) {
                $cargo->setUser($this->security->getUser());
            }

            if (!$cargo->getCreatedAt() instanceof DateTimeInterface) {
                $cargo->setCreatedAt(new DateTime());
            }

            if (!$cargo->getUpdatedAt() instanceof DateTimeInterface) {
                $cargo->setUpdatedAt(new DateTime());
            }

            if (!$cargo->isIsActive()) {
                $cargo->setIsActive(false);
            }
        });
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cargo::class,
            'required' => false,
            'attr' => [
                'autocomplete' => 'off',
                'novalidate' => 'novalidate',
            ],
        ]);
    }
}
