<?php

namespace App\Form;

use App\Entity\EmploymentHistory;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmHiType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('jobTitle')
            ->add('startDate')
            ->add('endDate')
            ->add('company')
            ->add('description')
            ->add('userInformations')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => EmploymentHistory::class,
        ]);
    }
}
