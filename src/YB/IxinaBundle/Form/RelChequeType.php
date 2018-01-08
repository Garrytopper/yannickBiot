<?php

namespace YB\IxinaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class RelChequeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom', TextType::class)
                ->add('tel', TextType::class)
                ->add('email', TextType::class, array('required' => false))
                ->add('montant', MoneyType::class, array('attr' => array('style' => 'width: 80px')))
                ->add('nomCheque', TextType::class, array('required' => false))
                ->add('origine', TextareaType::class, array('attr' => array('rows' => '10', 'cols' => '30')))
                ->add('dateRelance', DateType::class)
                ->add('Enregister', SubmitType::class, array('attr' => array('style' => 'width: 120px; height: 30px; font-size: 1.2em;')));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'YB\IxinaBundle\Entity\RelCheque'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'yb_ixinabundle_relcheque';
    }


}
