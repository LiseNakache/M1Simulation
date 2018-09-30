<?php

namespace miageSimulation\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
//use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
//use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
//Pour imbriquer une selection dans le formulaire
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CourseType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type',  TextType::class)
            ->add('name',  TextType::class)
            ->add('yearStart',  DateType::class, array(
                'widget' => 'single_text',
                'format' => 'yyyy',
            ))
            ->add('yearEnd',  DateType::class, array(
                'widget' => 'single_text',
                'format' => 'yyyy',
            ))
            ->add('studentsName', TextType::class)
//            ->add('totalCoef', NumberType::class)
//            ->add('subjects');
            ->add('subjects', EntityType::class, array(
                'class'        => 'miageSimulationAdminBundle:Subject',
                'choice_label' => 'name',
                'multiple'     => true,
                'expanded'     => true,
            ))
            ->add('save',      SubmitType::class);
    }




    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'miageSimulation\AdminBundle\Entity\Course'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'miagesimulation_adminbundle_course';
    }


}
