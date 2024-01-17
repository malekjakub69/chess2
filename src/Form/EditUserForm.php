<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class EditUserForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('name', TextType::class, ['label' => 'Jméno'])
        ->add('email', TextType::class, array(
            'required' => false, 'label' => 'Email'
        ))
        ->add('phone', TextType::class, array(
            'required' => false, 'label' => 'Telefon'
        ))
        ->add('white_win', NumberType::class, ['label' => 'Počet výher za bílé'])
        ->add('black_win', NumberType::class, ['label' => 'Počet výher za černé'])
        ->add('white_lose', NumberType::class, ['label' => 'Počet proher za bílé'])
        ->add('black_lose', NumberType::class, ['label' => 'Počet proher za černé'])
        ->add('best_game', NumberType::class, ['label' => 'Nejlepší hra v počtu tahů'])
        ->add('save', SubmitType::class, ['label' => 'Uložit']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class, // Set the default data class for this form
        ]);
    }
}