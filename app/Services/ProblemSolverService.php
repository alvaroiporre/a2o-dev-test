<?php

namespace App\Services;

use App\Services\ProblemsAlgorithms\Chess;
use App\Services\ProblemsAlgorithms\StringValue;

class ProblemSolverService
{
    public function solve($id, $input)
    {
      switch ($id) {
        case '1':
            $solver = new Chess();
            return $solver->solve($input);
        case '2':
            $solver = new StringValue();
            return $solver->solve($input);
        default:
            return null; // or throw an exception for unknown problem ID
    }
    }
}