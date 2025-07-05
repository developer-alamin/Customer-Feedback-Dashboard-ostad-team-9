<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestionAnswer;
use Inertia\Inertia;

class DashboardController extends Controller
{
    // Show dashboard page with all data from database
    public function index()
    {   
        // Get all question answers data
        $questions = QuestionAnswer::all();

        // Render dashboard page with data
        return Inertia::render('Dashboard', [
            'questions' => $questions
        ]);
    }
}
