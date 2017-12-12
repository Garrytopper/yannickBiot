<?php

namespace YB\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extention\Core\Type\TextType;
use Symfony\Component\Form\Extention\Core\Type\PasswordType;
use Symfony\Component\Form\Extention\Core\Type\ChoiceType;

class UserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username', textType::class)
                ->add('password', PasswordType::class)
                ->add('roles', ChoiceType::cladd, array(
                    'choices' => array(
                        'Visiteur' => 'ROLE_VISITEUR',
                        'Utilisateur' => 'ROLE_UTILISATEUR',
                        'Administrateur' => 'ROLE_ADMINISTRATEUR',
                        )
                    ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'YB\UserBundle\Entity\User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'yb_userbundle_user';
    }


}
