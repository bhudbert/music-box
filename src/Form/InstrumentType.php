<?php

namespace App\Form;


use App\Entity\Category;
use App\Entity\Instrument;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InstrumentType extends AbstractType
{



    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('stock')
            ->add('promoted')
            ->add('illustration')
            ->add('category',EntityType::class, [
               'class' => Category::class,
                'choice_label' => 'Name',
               ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Instrument::class,
        ]);
    }

    private function getCatChoices()
    {


        $choices=[];

        foreach ($categories as $category){

            array_push($choices, $category->getName());
         }
        dump($choices);
        return $choices;
    }
}
