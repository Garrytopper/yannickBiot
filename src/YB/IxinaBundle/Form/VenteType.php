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

class VenteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('montantVenteTTC', MoneyType::class, array('required' => false))
                ->add('dateLivSouhaite', DateType::class, array('required' => false))
                ->add('montantAcompte', MoneyType::class)
                ->add('numTel', NumberType::class, array('required' => false))
                ->add('email', EmailType::class, array('required' => false))
                ->add('livAd1', TextType::class, array('required' => false, 'attr' => array('style' => 'width: 200px')))
                ->add('livAd2', TextType::class, array('required' => false, 'attr' => array('style' => 'width: 200px')))
                ->add('livVille', TextType::class, array('required' => false, 'attr' => array('style' => 'width: 113px')))
                ->add('livCp', TextType::class, array('required' => false, 'attr' => array('style' => 'width: 75px')))
                ->add('renovation', CheckboxType::class, array('required' => false))
                ->add('dateLivSouhaite', DateType::class, array('required' => false))
                ->add('pose', ChoiceType::class, array('choices' => array(
                        'Hors pose' => 'Hors pose',
                        'Aide pose' => 'Aide pose',
                        'Pose' => 'Pose')))
                ->add('liv', CheckboxType::class, array('required' => false))
                ->add('granite', CheckboxType::class, array('required' => false))
                ->add('fairePlanTech', CheckboxType::class, array('required' => false))
                ->add('faireFactureAcompte', CheckboxType::class, array('required' => false))
                ->add('faireRelanceCheque', CheckboxType::class, array('required' => false))
                ->add('Enregistrer', SubmitType::class)
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