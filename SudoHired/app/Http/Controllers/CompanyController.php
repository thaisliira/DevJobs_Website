<?php

namespace App\Http\Controllers;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function index()
    {
        // Vai buscar TODAS as empresas e envia os dados para a view 'dashboard'
        $companies = Company::withCount('jobs')->get();
        return view('dashboard', compact('companies'));
    }

    public function store(Request $request)
    {
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'logo' => 'image'
    ]);

    $photo = null;
    if($request->hasFile('logo')){
    $photo = Storage::putFile('companyPhotos', $request->file('logo'));
    }

    DB::table('companies')->insert([
        'name' => $request->name,
        'description' => $request->description,
        'logo' => $photo, 
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect()->route('dashboard')->with('message', 'Empresa adicionada com sucesso!');
    }

    public function deleteCompany($id) {
        // as vagas também serão apagadas(efeito cascade)
    DB::table('companies')->where('id', $id)->delete();
    return back()->with('success', 'Empresa eliminada com sucesso!');
    }

    public function showJobs($id) {
    $company = Company::where('id', $id)->first();
    return view('jobs', compact('company'));
}
}
