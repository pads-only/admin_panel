<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CompaniesController extends Controller
{
    public function index(Companies $companies)
    {
        $companies = $companies->latest()->simplePaginate(10);

        return view('companies.index', ['companies' => $companies]);
    }

    public function create(Request $request)
    {
        return view('companies.create');
        // validate

    }

    public function show(Companies $companies)
    {
        return view('companies.show', ['company' => $companies]);
    }

    public function edit(Companies $companies)
    {
        return view('companies.edit', ['company' => $companies]);
    }

    public function store(Request $request)
    {
        // validate
        $validatedAttributes = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'logo' => 'required|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'website' => 'required',
        ]);

        // move image to storage/app/public/images
        if (! $request->hasFile('logo')) {
            throw ValidationException::withMessages(['logo' => 'Invalid Image']);
        }

        $path = $request->file('logo')->store('images', 'public');

        // store in db
        Companies::create([
            'name' => $validatedAttributes['name'],
            'email' => $validatedAttributes['email'],
            'logo' => $path,
            'website' => $validatedAttributes['website'],
        ]);

        // dd($validatedAttributes);
        return redirect('/companies')->with('success', 'New company has been added successfully!');
    }

    public function update(Request $request, Companies $companies)
    {
        // dd($companies);
        // validate
        $validatedAttributes = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'logo' => 'required|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'website' => 'required',
        ]);

        // move image to storage/app/public/images
        if (! $request->hasFile('logo')) {
            throw ValidationException::withMessages(['logo' => 'Invalid Image']);
        }

        $path = $request->file('logo')->store('images', 'public');

        // //store in db
        $companies->update([
            'name' => $validatedAttributes['name'],
            'email' => $validatedAttributes['email'],
            'logo' => $path,
            'website' => $validatedAttributes['website'],
        ]);

        // // dd($validatedAttributes);
        return redirect('/companies/' . $companies->id)->with('success', 'Company detail has been updated!');
    }

    public function destroy(Companies $companies)
    {
        $companies->delete();

        return redirect('/companies')->with('error', 'Company has been deleted successfully!');
    }
}
