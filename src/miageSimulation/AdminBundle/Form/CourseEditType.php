<?php

namespace miageSimulation\AdminBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CourseEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->remove('save')
            ->add('edit',      SubmitType::class);
    }

    public function getParent()
    {
        return CourseType::class;
    }
}
