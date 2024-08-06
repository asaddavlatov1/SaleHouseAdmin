<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Http\Requests\CompanyRequest;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function __construct(
        protected CompanyServiceInterface $service,
        protected UserServiceInterface $userService
    ){}

    public function index()
    {
        $company = $this->service->index();
        return view('admin.company.index', compact('company'));
    }

    public function create()
    {
        $users = $this->userService->index();
        return view('admin.company.create', compact('users'));
    }

    public function store(CompanyRequest $request)
    {
        $this->service->create($company, $request->validated());
        return redirect()->route('admin.company.index')->with('success', '__(messages.created)');
    }
    

    public function edit(Company $company)
    {
        return view('admin.company.edit', compact('company'));
    }

    public function update(CompanyRequest $request, Company $company)
    {
        $this->service->update();
        return redirect()->route('admin.company.index')->with('success', '__(messages.updated)');
    }

    public function destroy(Company $company)
    {
        $this->service->delete($company);
        return to_back()->with('success', __('messages.success'));
    }
}