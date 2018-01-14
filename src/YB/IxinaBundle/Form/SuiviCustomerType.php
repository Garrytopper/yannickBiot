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
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use YB\IxinaBundle\Form\PlanType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CustomerType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('montantVenteHt', MoneyType::class)
                ->add('dateLivSouhaite', DateType::class, array('required' => false))
                ->add('montantAcompte', MoneyType::class)
                ->add('numTel', TextType::class)
                ->add('email', EmailType::class)
                ->add('livAd1', TextType::class, array('required' => false))
                ->add('livAd2', TextType::class, array('required' => false))
                ->add('livVille', TextType::class, array('required' => false))
                ->add('livCp', TextType::class, array('required' => false))
                ->add('renovation', CheckboxType::class, array('required' => false))
                ->add('dateLivSouhaite', DateType::class, array('required' => false))
                ->add('pose', CheckboxType::class, array('required' => false))
                ->add('liv', CheckboxType::class, array('required' => false))
                ->add('granite', CheckboxType::class, array('required' => false))
            
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