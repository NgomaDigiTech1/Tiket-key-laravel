<?php
declare(strict_types=1);

namespace App\Forms;

use App\Models\Company;
use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class TownForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name_town', 'text', [
                'label' => "Nom d'une ville"
            ])
            ->add('company_id',Field::CHOICE, [
                'label' => 'Gestionnaire',
                'choices' => Company::all()->pluck( 'name_company', 'id')->toArray(),
                'multiple' => false,
                'attr' => ['class' => 'form-select']
            ]);
    }
}
