<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Http\Requests\CompanyRequest;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    
    public function index()
    {
        $companies = Company::all();
        return view('admin.company.index', compact('companies'));
    }

    public function create()
    {
        return view('admin.company.create');
    }

    public function store(CompanyRequest $request)
    {
        Company::create($request->validated());

        return redirect()->route('admin.company.index')->with('success', 'Company created successfully.');
    }

    public function show(Company $company)
    {
        return view('admin.company.show', compact('company'));
    }

    public function edit(Company $company)
    {
        return view('admin.company.edit', compact('company'));
    }

    public function update(CompanyRequest $request, Company $company)
    {
        $company->update($request->validated());
        return redirect()->route('admin.company.index')->with('success', 'Company updated successfully.');
    }

    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('admin.company.index')->with('success', 'Company deleted successfully.');
    }
}