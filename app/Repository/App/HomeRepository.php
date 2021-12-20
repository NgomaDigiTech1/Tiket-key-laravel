<?php
declare(strict_types=1);

namespace App\Repository\App;

use App\Models\Company;
use App\Models\Town;
use Illuminate\Database\Eloquent\Collection;

class HomeRepository
{
    public function getTowns(): Collection|array
    {
        return Town::query()
            ->get();
    }

    public function getCompanies(): Collection|array
    {
        return Company::query()
            ->orderBy('created_at', 'DESC')
            ->get();
    }
}
