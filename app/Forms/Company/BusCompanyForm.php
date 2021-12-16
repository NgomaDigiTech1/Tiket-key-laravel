<?php
declare(strict_types=1);

namespace App\Forms\Company;

use App\Models\Company;
use App\Models\Driver;
use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class BusCompanyForm extends Form
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
                'choices' => $this->getDrivers(),
                'multiple' => false,
                'attr' => ['class' => 'form-select']
            ]);
    }

    private function getDrivers(): array
    {
        return Driver::query()
            ->where('company_id', '=', auth()->user()->company->id)
            ->pluck( 'first_name', 'id')
            ->toArray();
    }
}
