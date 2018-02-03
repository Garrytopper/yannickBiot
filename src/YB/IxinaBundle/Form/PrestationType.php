<?php

namespace YB\IxinaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use YB\IxinaBundle\Form\PlanPrestationType;

class PrestationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('fournisseur', ChoiceType::class, array('choices' => array(
                'Aztiria' => 'Aztiria',
                'Lechner' => 'Lechner',
                'MiraLuver' => 'MiraLuver'), 'attr' => array('style' => 'width: 145px')))
                ->add('produit', TextType::class, array(
                    'attr' => array(
                    'style' => 'width: 138px',
                    'placeholder' => 'Nom du produit')))
                ->add('finitions', TextareaType::class, array('required' => false, 'attr' => array(
                    'placeholder' => 'Preciser les finitions',
                    'rows' => '13')))
                ->add('plan', PlanPrestationType::class, array('required' =>false))
                ->add('devisSigne', CheckboxType::class, array('required' => false))
                ->add('validation', CheckboxType::class, array('required' => false))
                ->add('rappel', CheckboxType::class, array('required' => false))
                ->add('planif', CheckboxType::class, array('required' => false))
                ->add('client', EntityType::class, array(
                'class' => 'YBIxinaBundle:Customer',
                'choice_label' => 'nom'
                ))
                ->add('enregistrer', SubmitType::class, array('attr' => array('style' => 'height: 35px; font-size: 1.5em;')));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'YB\IxinaBundle\Entity\Prestation'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'yb_ixinabundle_prestation';
    }


}
