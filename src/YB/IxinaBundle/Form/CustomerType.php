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
        $builder->add('etatDossier', ChoiceType::class, array(
                    'choices' => array(
                        'Prospect' => 'Prospect',
                        'Vendu' => 'Vendu',
                        'Perdu' => 'Perdu',
                        'Inactif' => 'Inactif'
                        ), 'attr' => array(
                        'style' => 'font-size: 5em'
                        ),
                    ))
                ->add('dateCreation', DateType::class)
                ->add('nom', TextType::class)
                ->add('prenom', TextType::class, array('required' => false))
                ->add('numTel', NumberType::class, array('required' => false))
                ->add('email', EmailType::class, array('required' => false))
                ->add('postalAd1', TextType::class, array('required' => false))
                ->add('postalAd2', TextType::class, array('required' => false))
                ->add('postalVille', TextType::class, array('required' => false))
                ->add('postalCp', TextType::class, array('required' => false))
                ->add('livAd1', TextType::class, array('required' => false))
                ->add('livAd2', TextType::class, array('required' => false))
                ->add('livVille', TextType::class, array('required' => false))
                ->add('livCp', TextType::class, array('required' => false))
                ->add('renovation', CheckboxType::class, array('required' => false))
                ->add('Plan', PlanType::class)
                ->add('dateLivSouhaite', DateType::class, array('required' => false))
                ->add('budgetClient', MoneyType::class, array('required' => false))
                ->add('descriptionFinition', TextareaType::class, array('required' => false, 'attr' => array('rows' => '5', 'cols' => '20')))
                ->add('electro', CheckboxType::class, array('required' => false))
                ->add('liv', CheckboxType::class, array('required' => false))
                ->add('pose', CheckboxType::class, array('required' => false))
                ->add('autre', CheckboxType::class, array('required' => false))
                ->add('dateProchaineAction', DateType::class)
                ->add('action', ChoiceType::class, array(
                    'choices' => array(
                        'Decouverte' => 'Decouverte',
                        'Retour' => 'Retour',
                        'Relance' => 'Relance',
                        'Metre' => 'Metre',
                        'Pose' => 'Pose'
                        )))
                ->add('actionRemarque', TextareaType::class, array('required' => false, 'attr' => array('rows' => '30', 'cols' =>'80')))
                ->add('decBestNeed', TextareaType::class, array('required' => false, 'attr' => array('rows' => '20', 'cols' => '35')))
                ->add('decToday', TextareaType::class, array('required' => false, 'attr' => array('rows' => '20', 'cols' => '35')))
                ->add('decTodayLike', TextareaType::class, array('required' => false, 'attr' => array('rows' => '20', 'cols' => '15')))
                ->add('decTodayNoLike', TextareaType::class, array('required' => false, 'attr' => array('rows' => '20', 'cols' => '15')))
                ->add('decReasons', TextareaType::class, array('required' => false, 'attr' => array('rows' => '20', 'cols' => '35')))
                ->add('profSecurite', CheckboxType::class, array('required' => false))
                ->add('profOrgueil', CheckboxType::class, array('required' => false))
                ->add('profNouveau', CheckboxType::class, array('required' => false))
                ->add('profConfort', CheckboxType::class, array('required' => false))
                ->add('profArgent', CheckboxType::class, array('required' => false))
                ->add('profSympa', CheckboxType::class, array('required' => false))
                ->add('cabMeuble', TextareaType::class, array('required' =>false, 'attr' => array('rows' => '2', 'cols' => '50')))
                ->add('cabElectro', TextareaType::class, array('required' =>false, 'attr' => array('rows' => '2', 'cols' => '35')))
                ->add('cabSanitaire', TextareaType::class, array('required' =>false, 'attr' => array('rows' => '2', 'cols' => '35')))
                ->add('cabService', TextareaType::class, array('required' =>false, 'attr' => array('rows' => '2', 'cols' => '35')))
                ->add('cabVendeur', TextareaType::class, array('required' =>false, 'attr' => array('rows' => '2', 'cols' => '35')))
                ->add('budgetAnnonce', MoneyType::class, array('required' => false, 'attr' => array('rows' => '4', 'cols' => '50')))
                ->add('beneficeIxina', TextareaType::class, array('required' =>false, 'attr' => array('rows' => '2', 'cols' => '35')))
                ->add('dramaDate', TextareaType::class, array('required' => false, 'attr' => array('rows' => '2', 'cols' => '35')))
                ->add('conclusion', TextareaType::class, array('required' =>false, 'attr' => array('rows' => '2', 'cols' => '35')))
                ->add('objections', TextareaType::class, array('required' =>false, 'attr' => array('rows' => '2', 'cols' => '35')))
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
