<?php
declare(strict_types=1);

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    public function showCompany(string $company)
    {
        return view('app.pages.company.detail');
    }
}
