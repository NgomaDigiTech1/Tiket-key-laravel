<?php
declare(strict_types=1);

namespace App\Forms;

use App\Models\Role;
use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class UserForm extends Form
{
    public function buildForm()
    {
        $this->add('name', 'text', [
            'label' => "Votre nom"
        ])
            ->add('first_name', 'text', [
                'label' => "Votre prenom"
            ])
            ->add('email', 'email', [
                'label' => "Votre addresse email"
            ])
            ->add('birthdays', 'date', [
                'label' => "Votre date de naissance"
            ])
            ->add('picture', 'file', [
                'label' => "Photo de profile"
            ])
            ->add('phone_number', Field::TEL, [
                'label' => "Numero telephone"
            ])
            ->add('password', Field::PASSWORD, [
                'label' => "Votre mot de passe"
            ])
            ->add('role_id', Field::CHOICE, [
                'label' => 'Role Utilisateur',
                'choices' => Role::all()->pluck( 'name', 'id')->toArray(),
                'multiple' => false,
                'attr' => ['class' => 'form-select']
            ]);
    }
}
