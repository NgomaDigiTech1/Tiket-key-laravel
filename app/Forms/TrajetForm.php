<?php
declare(strict_types=1);

namespace App\Forms;

use App\Models\Company;
use App\Models\Town;
use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class TrajetForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('starting_city', Field::CHOICE, [
                'label' => 'Ville de depart',
                'choices' => Town::all()->pluck( 'name_town', 'name_town')->toArray(),
                'multiple' => false,
                'attr' => ['class' => 'form-select']
            ])
            ->add('arrival_city', Field::CHOICE, [
                'label' => "Ville d'arriver",
                'choices' => Town::all()->pluck( 'name_town', 'name_town')->toArray(),
                'multiple' => false,
                'attr' => ['class' => 'form-select']
            ])
            ->add('prices', 'number', [
                'label' => "Prix du voyage"
            ])
            ->add('shutdowns', 'text', [
                'label' => "Arret de bus"
            ])
            ->add('start_time', Field::TIME, [
                'label' => "Heure de depart",
            ])
            ->add('arrival_time', Field::TIME, [
                'label' => "Heure d'arriver"
            ])
            ->add('company_id', Field::CHOICE, [
                'label' => "Nom Agence",
                'choices' => Company::all()->pluck( 'name_company', 'id')->toArray(),
                'multiple' => false,
                'attr' => ['class' => 'form-select']
            ]);
    }
}
