<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use App\Models\Employees;
use Illuminate\Http\Request;
use Symfony\Component\ErrorHandler\Error\UndefinedFunctionError;

class EmployeesController extends Controller
{
    public function index(Employees $employees)
    {
        $employees = $employees::with('companies')->latest()->simplePaginate(10);

        return view('employee.index', ['employees' => $employees]);
    }

    public function create(Companies $companies)
    {
        return view('employee.create', ['companies' => $companies::all()]);
    }

    public function show(Employees $employees)
    {
        return view('employee.show', ['employee' => $employees]);
    }

    public function edit(Employees $employees, Companies $companies)
    {
        return view('employee.edit', ['employee' => $employees, 'companies' => $companies::all()]);
    }

    public function store(Request $request)
    {
        $validateAttributes = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'companies_id' => 'required',
            'phone' => 'required',
        ]);

        //save to db
        Employees::create($validateAttributes);

        //redirect to index
        return redirect('/employees');
    }

    public function update(Request $request, Employees $employees)
    {
        $validateAttributes = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'companies_id' => 'required',
            'phone' => 'required',
        ]);

        $employees->update($validateAttributes);

        return redirect('/employees/' . $employees->id);
    }

    public function destroy(Employees $employees)
    {
        $employees->delete();

        return redirect('/employees');
    }
}
