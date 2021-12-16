<?php
declare(strict_types=1);

namespace App\Forms;

use App\Models\Company;
use App\Models\Driver;
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
            ->add('driver_id', Field::CHOICE, [
                'label' => 'Chauffeur',
                'choices' => Driver::all()->pluck( 'first_name', 'id')->toArray(),
                'multiple' => false,
                'attr' => ['class' => 'form-select']
            ])
            ->add('company_id', Field::CHOICE, [
                'label' => 'Nom company',
                'choices' => Company::all()->pluck( 'name_company', 'id')->toArray(),
                'multiple' => false,
                'attr' => ['class' => 'form-select']
            ]);
    }
}
