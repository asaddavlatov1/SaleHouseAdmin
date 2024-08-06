<?php

namespace App\Services\Interface;

use App\Models\Company;
use App\Http\Requests\CompanyRequest;

interface CompanyServiceInterface
{
    
    public function index();

    public function edit(Company $company);

    public function create(CompanyRequest $request);
    
    public function store(CompanyRequest $request);
    
    public function update(CompanyRequest $request, Company $company);
    
    public function delete(Company $company): void;
}
