<?php

namespace Juliengidel\Julis;

class Julis implements JulisInterface {

    public $str;
    public $o_str;

    public function __construct(string $str)
    {
        $this->str = $str;
        $this->o_str = $str;
    }

    public function between(int $i_left, int $i_right) {
        $size_between = $i_right - $i_left + 1;
        $this->str = substr($this->str, $i_left, $size_between);
        return $this; 
    }

    public function camelize() {
        $this->str = lcfirst(str_replace(' ', '', ucwords(preg_replace('/[^a-zA-Z0-9\x7f-\xff]++/', ' ', $this->str))));
        return $this;
    }

    public function capitalize() {
        $this->str = ucfirst($this->str);
        return $this;
    }

    public function charAt($index) {
        $this->str = substr($this->str, $index, 1);
        return $this;
    }

    public function concat(Julis $julis) {
        $this->str = $this->str . $julis->__toString();
        return $this;
    }

    public function contains(string $search) {
        return $this->firstIndexOf($search) !== false;
    }

    public function count() {
        return strlen($this->str);
    }

    public function delete(string $search) {
        $this->str = str_replace($search, '', $this->str);
        return $this;
    }

    public function endsWith(string $search) {
        if(empty($search)) {
            return false;
        }

        $indexes = $this->indexesOf($search);
        return in_array(($this->count() - strlen($search)), $indexes, true);
    }

    public function equals(string $compare) {
        return $this->str === $compare;
    }

    public function equalsIgnoreCare(string $compare) {
        return strtolower($compare) === strtolower($this->str);
    }

    public function firstIndexOf(string $search) {
        return strpos($this->str, $search);
    }

    public function indexesOf(string $search) {
        $search_length = strlen($search);
        $str_length = strlen($this->str);
        $indexes = [];

        for($i = 0; $i <= ($str_length - $search_length); $i++) {
            if(substr($this->str, $i, $search_length) === $search) {
                $indexes[] = $i;
            }
        }

        return $indexes;
    }

    public function left(int $length) {
        if($length > $this->count()) {
            return $this->str;
        }

        $this->str = substr($this->str, 0, $length);
        return $this;
    }

    public function multiply(int $times) {
        $this->str = str_repeat($this->str, $times);
        return $this;
    }

    public function pad() {
        $this->replace(' ', '');
        return $this;
    }

    public function prefix(string $prefix) {
        $this->str = $prefix . $this->str;
        return $this;
    }

    public function replace(string $search, string $by) {
        $this->str = str_replace($search, $by, $this->str);
        return $this;
    }

    public function replaceVariables(array $values) {
        foreach($values as $variable => $value) {
            $this->replace('$'.$variable, $value); 
        }

        return $this;
    }

    public function reset() {
        $this->str = $this->o_str;
        return $this;
    }

    public function reverse() {
        $this->str = strrev($this->str);
        return $this;
    }

    public function right(int $length) {
        if($length > $this->count()) {
            return $this->str;
        }
        $this->str = substr($this->str, $this->count() - $length, $length);
        return $this;
    }

    public function startsWith(string $search) {
        if(empty($search)) return false;

        return $this->firstIndexOf($search) === 0;
    }

    public function strip(string $allow = '') {
        $this->str = strip_tags($this->str, $allow);
        return $this;
    }
    
    public function suffix(string $suffix) {
        $this->str = $this->str . $suffix;
        return $this;
    }

    public function trim() {
        $this->str = trim($this->str);
        return $this;
    }

    public function uppercase() {
        $this->str = strtoupper($this->str);
        return $this;
    }

    public function __toString()
    {
        return $this->str;
    }
}