<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Entity\Product;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('name', ['error_bubbling' => true])
                ->add('description')
                ->add('price')
                ->add('Guardar',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        // $resolver->setDefaults([
         //   'data_class' => Product::class,
        //]);

        $resolver->setDefaults(array(
            'data_class' => Product::class,
        ));
    }

    public function getName()
    {
        return 'app_bundle_product_type';
    }
}
