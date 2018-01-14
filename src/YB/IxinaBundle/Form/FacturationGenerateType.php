<?php

namespace YB\IxinaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PercentType;

class FacturationGenerateType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom', TextType::class)
                ->add('ad1', TextType::class, array('required' => false))
                ->add('ad2' TextType::class, array('required' => false))
                ->add('ville', TextType::class, array('required' => false))
                ->add('cp', TextType::class, array('required' => false))
                ->add('montantVente', MoneyType::class, array('required' => false))
                ->add('tva', PercentType::class, array('required' => false))
                ->add('montantAcompte', MoneyType::class, array('required' => false))
                ->add('typeFacture', ChoiceType::class, array('choices', array(
                    'Solde' => 'Solde',
                    'Acompte' => 'Acompte'
                    )))
                ->add('Enregistrer', SubmitType::class)
                ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'YB\IxinaBundle\Entity\Facturation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'yb_ixinabundle_facturation';
    }


}
