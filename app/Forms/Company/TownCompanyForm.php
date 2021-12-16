<?php
declare(strict_types=1);

namespace App\Forms\Company;

use App\Models\Company;
use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;

class TownCompanyForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name_town', 'text', [
                'label' => "Nom d'une ville"
            ]);
    }
}
