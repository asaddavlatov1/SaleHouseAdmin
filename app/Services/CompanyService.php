<?php

namespace App\Services;

use App\Models\Company;
use App\Http\Requests\CompanyRequest;
use App\Services\Interfaces\CompanyServiceInterface;

class CompanyService implements CompanyServiceInterface
{
    public function index()
    {
        return Company::all();
    }

    public function store(CompanyRequest $request)
    {
        return Company::create($request->validated());
    }

    public function show(Company $company)
    {
        return $company;
    }

    public function update(CompanyRequest $request, Company $company)
    {
        return $company->update($request->validated());
    }

    public function delete(Company $company): void
    {
        $company->delete();
    }
}
