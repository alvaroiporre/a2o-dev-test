<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ProblemSolverService;
use Illuminate\Http\Request;

class ProblemSolverController extends Controller
{

    public function solve(Request $request, $id)
    {
        $solver = new ProblemSolverService();
        $input = $request->input('input');
        $output = $solver->solve($id, $input);
        return response()->json(['output' => $output]);
    }
}