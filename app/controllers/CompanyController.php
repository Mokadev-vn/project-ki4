<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\User;
use App\Models\Job;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $company = new Company();
        $listCompany = $company->params(['c.*', 'COUNT(IF(j.active = 1,1,null)) as open_job'])->join('jobs j','j.company_id = c.id', 'LEFT')->groupBy('c.id')->orderBy('c.id')->limit(9)->get();

        return $this->view('list-company', compact('listCompany'));
    }
}
