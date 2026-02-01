<?php

namespace App\Http\Controllers;
use App\Models\Company;
use App\Models\JobListing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Vai buscar TODAS as empresas e envia os dados para a view 'dashboard'
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        
        $companies = Company::withCount('jobs')->get();
        $jobs = JobListing::all();
        return view('dashboard', compact('companies', 'jobs'));
    }

    /**
     * Insere os dados na BD, de acordo com as colunas criadas
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'logo' => 'nullable|image',
        'city' => 'required'
    ]);

    $photo = null;
    if($request->hasFile('logo')){
    $photo = Storage::putFile('companyPhotos', $request->file('logo'), 'public');
    }

    Company::create([
        'name' => $request->name,
        'description' => $request->description,
        'logo' => $photo, 
        'city' => $request->city,
    ]);
    return redirect()->route('companies.index')->with('message', 'Empresa criada com sucesso!');
    }

      public function updateCompany(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'city' => 'required',
            'logo' => 'image|nullable'
        ]);

        // para buscar o logo atual da empresa e nao deixar null e nem obrigar o user carregar a imagem novamente, o first entrega um objeto, enquanto o get entrega uma coleção
        $currentCompany = DB::table('companies')->where('id', $request->id)->first();
        $logo=$currentCompany->logo;
        if($request->hasFile('logo')){
            $logo = Storage::putFile('companyPhotos', $request->file('logo'));
        }

        DB::table('companies')
        ->where('id', $request->id)
        ->update([
            'name' =>$request->name,
            'description' =>$request->description,
            'logo' =>$logo,
            'city'=> $request->city,
            'updated_at'=> now(),
        ]);

    return redirect()->route('companies.index')->with('message', 'Empresa editada com sucesso!');
    }

    /**
     * Deleta dados da BD
     * @param mixed $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteCompany($id) {
        // as vagas também serão apagadas(efeito cascade)
    $company = Company::where('id', $id)->delete();
    return back()->with('message', 'Empresa eliminada com sucesso!');
    }

    /**
     * Exibe as vagas associadas a cada empresa
     * @param mixed $id
     * @return \Illuminate\Contracts\View\View
     */
    public function showJobs($id) {
    $company = Company::where('id', $id)->first();
    return view('companyjobs', compact('company'));
    }
}
