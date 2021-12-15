<?php
declare(strict_types=1);

namespace App\Forms\Company;

use App\Models\Company;
use App\Models\Driver;
use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class ConfigCompanyForm extends Form
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
            ]);
    }
}
