<?php

namespace YB\IxinaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;

class CustomerType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('idUser', IntegerType::class)
                ->add('etatDossier', TextType::class)
                ->add('dateCreation', DateType::class)
                ->add('nom', TextType::class)
                ->add('prenom', TextType::class)
                ->add('numTel', NumberType::class)
                ->add('email', EmailType::class)
                ->add('postalAd1', TextType::class)
                ->add('postalAd2', TextType::class)
                ->add('postalVille', TextType::class)
                ->add('postalCp', TextType::class)
                ->add('livAd1', TextType::class)
                ->add('livAd2', TextType::class)
                ->add('livVille', TextType::class)
                ->add('livCp', TextType::class)
                ->add('renovation', CheckboxType::class)
                ->add('planClient', TextType::class)
                ->add('dateLivSouhaite', DateType::class)
                ->add('budgetClient', MoneyType::class)
                ->add('meuble', CheckboxType::class)
                ->add('electro', CheckboxType::class)
                ->add('liv', CheckboxType::class)
                ->add('pose', CheckboxType::class)
                ->add('autre', CheckboxType::class)
                ->add('Enregister', SubmitType::class)
                ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'YB\IxinaBundle\Entity\Customer'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'yb_ixinabundle_customer';
    }


}
