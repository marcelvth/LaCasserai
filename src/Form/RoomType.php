<?php

namespace App\Form;

use App\Entity\Room;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RoomType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Room_nr')
            ->add('Price')
            ->add('Bed')
            ->add('Description')
            ->add('available')
            ->add('Name')
            ->add('Image_name')
            ->add('Image_size')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('Soort')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Room::class,
        ]);
    }
}
