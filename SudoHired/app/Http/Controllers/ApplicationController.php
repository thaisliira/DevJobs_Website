<?php

namespace App\Http\Controllers;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
/**
 * Funçao para exibir candidaturas associadas ao user e a vaga
 */
class ApplicationController extends Controller
{
    public function index()
{
    $applications = Application::with(['user', 'jobListing'])->get();
    return view('applications', compact('applications'));
}

public function downloadResume($id)
{
    $application = Application::find($id);
    return Storage::download($application->resume_path);
}
}
