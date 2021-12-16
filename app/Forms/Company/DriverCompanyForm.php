<?php
declare(strict_types=1);

namespace App\Forms\Company;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class DriverCompanyForm extends Form
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
            ->add('address', 'text', [
                'label' => "Adresse physique"
            ])
            ->add('picture', 'file', [
                'label' => "Photo de profile"
            ]);
    }
}
