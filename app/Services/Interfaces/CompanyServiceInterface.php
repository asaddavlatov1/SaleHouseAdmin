<?php
namespace App\Services\Interfaces;

use App\Services\Interface\CompanyInterface;
use App\Models\Company;
use App\Http\Requests\CompanyRequest;

interface CompanyServiceInterface
{
    public function index();

    public function show(Company $company);

    public function store(CompanyRequest $request);
    
    public function update(CompanyRequest $request, Company $company);
    
    public function delete(Company $company): void;
}