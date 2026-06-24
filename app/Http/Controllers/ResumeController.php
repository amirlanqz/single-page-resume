<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class ResumeController extends Controller
{
    public function index()
    {
        $resume = Storage::disk('resumes')->get('resume.json');

        $resultResume = json_decode($resume, true);

        return view('resume', [
            'resume' => $resultResume
        ]);
    }
}
