<?php

namespace App\Services\ProblemsAlgorithms;

use App\Contracts\ProblemsAlgorithmsInterface;

class Chess implements ProblemsAlgorithmsInterface
{
    private $n;
    private $k;
    private $rq;
    private $cq;
    private $obstacles;

    private function isValidPosition($r, $c) {
        return $r >= 1 && $r <= $this->n && $c >= 1 && $c <= $this->n;
    }

    public function queensAttack() {
        $directions = [[1, 0], [-1, 0], [0, 1], [0, -1],
                      [1, 1], [-1, -1], [1, -1], [-1, 1]];
        $attackedSquares = 0;

        foreach ($directions as $direction) {
            list($dr, $dc) = $direction;
            $r = $this->rq + $dr;
            $c = $this->cq + $dc;
            while ($this->isValidPosition($r, $c)) {
                if (in_array([$r, $c], $this->obstacles)) {
                    break;
                }
                $attackedSquares++;
                $r += $dr;
                $c += $dc;
            }
        }

        return $attackedSquares;
    }

    public function solve($input_text) {
        $lines = explode("\n", trim($input_text));
        list($n, $k) = explode(" ", $lines[0]);
        list($rq, $cq) = explode(" ", $lines[1]);
        $obstacles = [];
        for ($i = 2; $i < count($lines); $i++) {
            list($r, $c) = explode(" ", $lines[$i]);
            $obstacles[] = [$r, $c];
        }

        $this->n = $n;
        $this->k = $k;
        $this->rq = $rq;
        $this->cq = $cq;
        $this->obstacles = $obstacles;

        return $this->queensAttack();
    }
}