<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\JobListing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class JobListingController extends Controller
{
    /**
    * funcao que exibe todas as vagas
    * @param mixed $id
    * @return \Illuminate\Contracts\View\View
    */
    public function showJobs($id){
        $job = JobListing::where('id', $id)->first();
        return view('companyjobs', compact('job'));
    }

    /**
     * 
     * funcao que exibe individualmente os detalhes de uma vaga
     * @param mixed $id
     * @return \Illuminate\Contracts\View\View
     */
    public function showJobDetail($id) {
    $job = JobListing::with('company')->findOrFail($id);

    return view('job_detail', compact('job'));
}

    /**
     * funcao para que seja atualizada uma vaga ja existente
     * @param Request $request
     * @param mixed $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateJob(Request $request){
        $request->validate([
            'title' => 'required',
            'salary' => 'required',
            'requirements' => 'required',
            'description' => 'required',
            'work_type' => 'required',
            'image' => 'nullable|url',
            'inscription_end_date' => 'required',
        ]);
    
        $currentJob = DB::table('job_listings')->where('id', $request->id)->first();
        // verifica se o campo imagem nao esta vazio ele puxa a imgaem da bd, se o user adc algo novo, ele troca, se nao alterar nada da imagem, mantem a que estava
        if (!empty($request->image)) {
            $image = $request->image;
        } else {
            $image = $currentJob->image;
        }

        DB::table('job_listings')
        ->where('id', $request->id)
        ->update([
            'title'                => $request->title,
            'salary'               => $request->salary,
            'requirements'         => $request->requirements,
            'description'          => $request->description,
            'work_type'            => $request->work_type,
            'image'                => $image,
            'inscription_end_date' => $request->inscription_end_date,
            'updated_at'           => now(),
        ]);

        return redirect()->route('jobs.index')->with('message', 'Vaga editada com sucesso!');
    }

    /**
     * funcao para criar uma nova vaga
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request){
    $request->validate([
        'title'        => 'required',
        'salary'       => 'required',
        'requirements' => 'required',
        'description'  => 'required',
        'work_type'    => 'required',
        'company_id'   => 'required',
        'image'        => 'nullable|url',
        'inscription_end_date' => 'required',
    ]);

    JobListing::create([
        'title'        => $request->title,
        'salary'       => $request->salary,
        'requirements' => $request->requirements,
        'description'  => $request->description,
        'work_type'    => $request->work_type,
        'image'        => $request->image,
        'company_id'   => $request->company_id,
        'release_date' => now()->toDateString(),
        'inscription_end_date' => $request->inscription_end_date,
    ]);

    return redirect()->route('jobs.index')->with('message', 'Vaga criada com sucesso!');
    }

    /**
     * funcao para deletar uma vaga
     * @param mixed $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteJob($id) {
        DB::table('job_listings')->where('id', $id)->delete();
        return back()->with('success', 'Vaga eliminada com sucesso!');
    }

    public function index()
{
    $jobs = JobListing::all();
    $companies = Company::all();

    return view('jobslist', compact('jobs', 'companies'));
}
}