<?php
declare(strict_types=1);

namespace App\Forms;

use App\Models\Company;
use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class DriverForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('first_name', 'text', [
                'label' => "Nom du chauffeur"
            ])
            ->add('name', 'text', [
                'label' => "Prenom du chauffeur"
            ])
            ->add('age', Field::NUMBER, [
                'label' => "Age du chauffeur"
            ])
            ->add('phone_number', 'tel', [
                'label' => "Numero de telephone"
            ])
            ->add('picture', 'file', [
                'label' => "Photo de profile"
            ])
            ->add('company_id',Field::CHOICE, [
                'label' => 'Gestionnaire',
                'choices' => Company::all()->pluck( 'name_company', 'id')->toArray(),
                'multiple' => false,
                'attr' => ['class' => 'form-select']
            ]);
    }
}
