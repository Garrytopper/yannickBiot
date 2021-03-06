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
                        'style' => 'font-size: 5em;'
                        ),
                    ))
                ->add('dateCreation', DateType::class)
                ->add('dateDecision', TextType::class, array('required' => false, 'attr' => array('style' => 'font-size: 1.2em; margin: auto; height: 25px; width: 99%;')))
                ->add('dessin', CheckboxType::class, array('required' => false))
                ->add('preparation', CheckboxType::class, array('required' => false))
                ->add('nom', TextType::class, array('attr' => array('style' => 'font-weight: bold; height: 30px; width: 98%; font-size: 1.2em; color: orange')))
                ->add('numTel', NumberType::class, array('required' => false, 'attr' => array('style' => 'height: 30px; width: 98%; font-size: 1.2em;')))
                ->add('email', EmailType::class, array('required' => false, 'attr' => array('style' => 'height: 30px; width: 98%; font-size: 1.2em;')))
                ->add('autreNum', TextAreaType::class, array('required' => false, 'attr' => array('rows' => '4', 'cols' => '20', 'style' => 'font-size: 1.2em')))
                ->add('livAd1', TextType::class, array('required' => false, 'attr' => array('style' => 'font-weight: bold; color: rgb(1, 73, 147); height: 30px; width: 98%; font-size: 1.2em;')))
                ->add('livAd2', TextType::class, array('required' => false, 'attr' => array('style' => 'font-weight: bold; color: rgb(1, 73, 147); height: 30px; width: 98%; font-size: 1.2em;')))
                ->add('livVille', TextType::class, array('required' => false, 'attr' => array('style' => 'font-weight: bold; color: rgb(1, 73, 147); height: 30px; width: 95%; font-size: 1.2em;')))
                ->add('livCp', TextType::class, array('required' => false, 'attr' => array('style' => 'color: rgb(1, 73, 147); height: 30px; width: 70%; font-size: 1.2em;')))
                ->add('renovation', CheckboxType::class, array('required' => false))
                ->add('Plan', PlanType::class)
                ->add('dateLivSouhaite', DateType::class, array('required' => false, 'attr' => array('style' => 'margin: auto;')))
                ->add('budgetClient', MoneyType::class, array('required' => false, 'attr' => array('style' => 'height: 25px; width: 80%; font-size: 1.2em; margin: auto;')))
                ->add('motifDecision', TextType::class, array('required' => false, 'attr' => array('style' => 'font-size: 1.2em; margin: auto; height: 25px; width: 99%;')))
                ->add('modele', TextType::class, array('required' => false, 'attr' => array('style' => 'height: 18px;')))
                ->add('planW', TextType::class, array('required' => false, 'attr' => array('style' => 'height: 18px;')))
                ->add('poignee', TextType::class, array('required' => false, 'attr' => array('style' => 'height: 18px;')))
                ->add('descriptionFinition', TextareaType::class, array('required' => false, 'attr' => array('rows' => '7', 'cols' => '35', 'style' => 'margin-top: 5px;')))
                ->add('evier', CheckboxType::class, array('required' => false))
                ->add('mitigeur', CheckboxType::class, array('required' => false))
                ->add('four', CheckboxType::class, array('required' => false))
                ->add('microOnde', CheckboxType::class, array('required' => false))
                ->add('plaqueCuisson', CheckboxType::class, array('required' => false))
                ->add('hotte', CheckboxType::class, array('required' => false))
                ->add('frigo', CheckboxType::class, array('required' => false))
                ->add('laveVaisselle', CheckboxType::class, array('required' => false))
                ->add('laveLinge', CheckboxType::class, array('required' => false))
                ->add('caveVin', CheckboxType::class, array('required' => false))
                ->add('descriptionElectro', TextareaType::class, array('required' => false, 'attr' => array('cols' => '22', 'rows' => '6')))
                ->add('liv', CheckboxType::class, array('required' => false))
                ->add('pose', ChoiceType::class, array('choices' => array(
                        'Hors pose' => 'Hors pose',
                        'Aide pose' => 'Aide pose',
                        'Pose' => 'Pose')))
                ->add('descriptionTravaux', TextareaType::class, array('required' => false, 'attr' => array('cols' => '44', 'rows' => '7')))
                ->add('autre', CheckboxType::class, array('required' => false))
                ->add('prestation', CheckboxType::class, array('required' => false))
                ->add('dateProchaineAction', DateType::class)
                ->add('action', ChoiceType::class, array(
                    'choices' => array(
                        'Decouverte' => 'Decouverte',
                        'Retour' => 'Retour',
                        'Relance' => 'Relance',
                        'Metre' => 'Metre',
                        'Pose' => 'Pose'
                        )))
                ->add('actionRemarque', TextareaType::class, array('required' => false, 'attr' => array('rows' => '12', 'cols' =>'80', 'style' => 'border: solid; margin-left: -27px; margin-top: -10px;')))
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
                ->add('descriptionProfil', TextareaType::class, array('required' => false, 'attr' => array('rows' => '24', 'cols' => '40')))
                ->add('cabStyle', TextareaType::class, array('required' => false, 'attr' => array('rows' => '3', 'cols' => '70')))
                ->add('cabMeuble', TextareaType::class, array('required' =>false, 'attr' => array('rows' => '3', 'cols' => '70')))
                ->add('cabElectro', TextareaType::class, array('required' =>false, 'attr' => array('rows' => '3', 'cols' => '70')))
                ->add('cabSanitaire', TextareaType::class, array('required' =>false, 'attr' => array('rows' => '3', 'cols' => '70')))
                ->add('cabService', TextareaType::class, array('required' =>false, 'attr' => array('rows' => '3', 'cols' => '70')))
                ->add('cabVendeur', TextareaType::class, array('required' =>false, 'attr' => array('rows' => '3', 'cols' => '70')))
                ->add('diffConcurrence', TextareaType::class, array('required' => false, 'attr' => array('rows' => '11', 'cols' => '20', 'style' => 'border: solid; border-radius: 10px;')))
                ->add('concurrence', TextareaType::class, array('required' => false, 'attr' => array('rows' => '11', 'cols' => '20', 'style' => 'border: solid; border-radius: 10px;')))
                ->add('budgetAnnonce', MoneyType::class, array('required' => false, 'attr' => array('rows' => '4', 'cols' => '50')))
                ->add('beneficeIxina', TextareaType::class, array('required' =>false, 'attr' => array('rows' => '2', 'cols' => '35')))
                ->add('dramaDate', TextareaType::class, array('required' => false, 'attr' => array('rows' => '2', 'cols' => '35')))
                ->add('conclusion', TextareaType::class, array('required' =>false, 'attr' => array('rows' => '2', 'cols' => '35')))
                ->add('objections', TextareaType::class, array('required' =>false, 'attr' => array('rows' => '2', 'cols' => '35')))
                ->add('Enregister', SubmitType::class, array('attr' => array('style' => 'border-radius: 10px; width: 150px; height: 40px; font-size: 1.3em; color: orange; font-weight: bold;')))
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
