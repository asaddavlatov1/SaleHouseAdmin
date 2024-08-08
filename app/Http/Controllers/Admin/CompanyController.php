<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Http\Requests\CompanyRequest;
use App\Services\Interfaces\CompanyServiceInterface;
use App\Services\Interfaces\UserServiceInterface;

class CompanyController extends Controller
{
    public function __construct(
        protected CompanyServiceInterface $service,
        protected UserServiceInterface $userService
    ) {}

    public function index()
    {
        $companies = $this->service->index();
        return view('admin.company.index', compact('companies'));
    }

    public function create()
    {
        $company = $this->userService->index(); 
        return view('admin.company.create', compact('company'));
    }

    public function store(CompanyRequest $request)
    {
        $this->service->store($request); 
        return redirect()->route('admin.company.index')->with('success', __('messages.created'));
    }

    public function edit(Company $company)
    {
        $company = $this->userService->index(); 
        return view('admin.company.edit', compact('company'));
    }

    public function update(CompanyRequest $request, Company $company)
    {
        $this->service->update($request, $company); 
        return redirect()->route('admin.company.index')->with('success', __('messages.updated'));
    }

    public function destroy(Company $company)
    {
        $this->service->delete($company); 
        return redirect()->back()->with('success', __('messages.deleted'));
    }
}