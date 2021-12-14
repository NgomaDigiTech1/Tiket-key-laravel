<?php
declare(strict_types=1);

namespace App\Forms;

use App\Models\User;
use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class CompanyForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name_company', 'text', [
                'label' => "Nom de l'entreprise"
            ])
            ->add('picture', 'file', [
                'label' => "Logo de la company"
            ])
            ->add('address', 'text', [
                'Label' => "Addresse de l'entreprise"
            ])
            ->add('phone_number', 'tel', [
                'label' => "Numero telephone"
            ])
            ->add('email', 'email', [
                'label' => "Addresse email"
            ])
            ->add('user_id', Field::CHOICE, [
                'label' => 'Gestionnaire',
                'choices' => User::all()->pluck( 'first_name', 'id')->toArray(),
                'multiple' => false,
                'attr' => ['class' => 'form-select']
            ]);
    }
}
