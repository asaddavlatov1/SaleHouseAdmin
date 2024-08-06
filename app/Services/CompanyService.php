<?php

namespace app\Services;

use App\Models\Company;
use App\Http\Requests\CompanyRequest;
use App\Services\Interface\CompanyServiceInterface;

class CompanyService implements CompanyServiceInterface
{
    public function index()
    {
        return Company::query()->get();
    }

    public function create(CompanyRequest $request) 
    {
        return Company::create($request->validated());
    }

    public function edit(company $company )
    {
        return User::find($company);
    }

    public function update(CompanyRequest $request, Company $company) 
    {
        return Company::update($request->validated());

    }

    public function delete(Company $company): void
    {
         $company->delete();
    }
}