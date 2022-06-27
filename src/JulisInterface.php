<?php

namespace Juliengidel\Julis;

interface JulisInterface {
    public function between(int $i_left, int $i_right);
    public function camelize();
    public function capitalize();
    public function charAt($index);
    public function concat(Julis $julis);
    public function contains(string $search);
    public function count();
    public function dasherize();
    public function delete(string $search);
    public function endsWith(string $search);
    public function equals(string $compare);
    public function equalsIgnoreCare(string $compare);
    public function firstIndexOf(string $search);
    public function indexesOf(string $search);
    public function lastIndexOf(string $search);
    public function left(int $length);
    public function lowercase();
    public function multiply(int $times);
    public function pad();
    public function prefix(string $prefix);
    public function replace(string $search, string $by);
    public function replaceVariables(array $values);
    public function reset();
    public function reverse();
    public function right(int $length);
    public function splitLeft(string $separator, int $maxSplit);
    public function splitRight(string $separator, int $maxSplit);
    public function startsWith(string $search);
    public function strip(string $allow = '');
    public function suffix(string $suffix);
    public function trim();
    public function uppercase();
}