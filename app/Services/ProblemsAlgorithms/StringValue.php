<?php

namespace App\Services\ProblemsAlgorithms;

use App\Contracts\ProblemsAlgorithmsInterface;

class Node
{
    public $children;
    public $count;

    public function __construct()
    {
        $this->children = [];
        $this->count = 0;
    }
}

class StringValue implements ProblemsAlgorithmsInterface
{
    private $root;

    public function __construct()
    {
        $this->root = new Node();
    }

    public function solve($t)
    {
        $this->buildSuffixTreeHelper($t);
        return $this->dfs($this->root, 0);
    }

    private function buildSuffixTreeHelper($s)
    {
        $length = strlen($s);
        for ($i = 0; $i < $length; $i++) {
            $cur = $this->root;
            for ($j = $i; $j < $length; $j++) {
                $char = $s[$j];
                if (!isset($cur->children[$char])) {
                    $cur->children[$char] = new Node();
                }
                $cur = $cur->children[$char];
                $cur->count++;
            }
        }
    }

    private function dfs($node, $depth)
    {
        $max_f = $depth * $node->count;
        foreach ($node->children as $child) {
            $max_f = max($max_f, $this->dfs($child, $depth + 1));
        }
        return $max_f;
    }
}
