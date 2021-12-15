<?php
declare(strict_types=1);

namespace App\Forms;

use App\Models\Company;
use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class BusForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('code_bus', 'text', [
                'label' => "Identifiant du bus (Code)"
            ])
            ->add('place_number', 'number', [
                'label' => "Nombre des places"
            ])
            ->add('colors', Field::COLOR, [
                'label' => "Couleur du bus"
            ])
            ->add('company_id', Field::CHOICE, [
                'label' => 'Role Utilisateur',
                'choices' => Company::all()->pluck( 'name_company', 'id')->toArray(),
                'multiple' => false,
                'attr' => ['class' => 'form-select']
            ]);
    }
}
