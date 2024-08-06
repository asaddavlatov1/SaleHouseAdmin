<?php
namespace App\Services;

use App\Models\Company;

interface CompanyServiceInterface
{
    public function index();

    public function edit(company $company);

    public function create(CompanyRequest $requests);
    
    public function update(CompanyRequest $request, Company $company);
    
    public function delete(Company $company): void;
}