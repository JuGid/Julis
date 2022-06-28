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

    /**
     * Return chars between index $i_left and $i_right
     */
    public function between(int $i_left, int $i_right) {
        $size_between = $i_right - $i_left + 1;
        $this->str = substr($this->str, $i_left, $size_between);
        return $this; 
    }

    /**
     * Change the string to camel case
     */
    public function camelize() {
        $this->str = lcfirst(str_replace(' ', '', ucwords(preg_replace('/[^a-zA-Z0-9\x7f-\xff]++/', ' ', $this->str))));
        return $this;
    }

    /**
     * Set all chars to capital letter
     */
    public function capitalize() {
        $this->str = ucfirst($this->str);
        return $this;
    }

    /**
     * Get the char at $index
     */
    public function charAt($index) {
        $this->str = substr($this->str, $index, 1);
        return $this;
    }

    /**
     * Concatenate the Julis and another one $julis including a potential $separator
     */
    public function concat(Julis $julis, string $separator = '') {
        $this->str = $this->str . $separator .$julis->__toString();
        return $this;
    }

    /**
     * Returns a boolean representing if the Julis contains $search
     */
    public function contains(string $search) {
        return $this->firstIndexOf($search) !== false;
    }

    /**
     * Returns the number of chars
     */
    public function count() {
        return strlen($this->str);
    }

    /**
     * Replace spaces with dash an lower the string
     */
    public function dasherize() {
        $this->str = strtolower($this->str);
        $this->str = str_replace(' ', '-', $this->str);
        return $this;
    }

    /**
     * Delete the $search in the Julis
     */
    public function delete(string $search) {
        $this->str = str_replace($search, '', $this->str);
        return $this;
    }

    /**
     * Returns a boolean determining if the Julis ends with the specified $search
     */
    public function endsWith(string $search) {
        if(empty($search)) {
            return false;
        }

        $indexes = $this->indexesOf($search);
        return in_array(($this->count() - strlen($search)), $indexes, true);
    }

    /**
     * Compare a Julis and a specified $compare string
     */
    public function equals(string $compare) {
        return $this->str === $compare;
    }

    /**
     * Same as equals but ignore case
     */
    public function equalsIgnoreCase(string $compare) {
        return strtolower($compare) === strtolower($this->str);
    }

    /**
     * Returns the first index in Julis that where $search is found, false if not found
     */
    public function firstIndexOf(string $search) {
        return strpos($this->str, $search);
    }

    /**
     * Returns all indexes where $search can be found, empty array if not found
     */
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

    /**
     * Return the last index where $search can be found
     */
    public function lastIndexOf(string $search) {
        return end($this->indexesOf($search));
    }

    /**
     * Truncate the Julis beginning from the left
     */
    public function left(int $length) {
        if($length > $this->count()) {
            return $this->str;
        }

        $this->str = substr($this->str, 0, $length);
        return $this;
    }

    /**
     * Lower every chars of the Julis
     */
    public function lowercase() {
        $this->str = strtolower($this->str);
        return $this;
    }

    /**
     * Repeat current Julis for $times
     */
    public function multiply(int $times) {
        $this->str = str_repeat($this->str, $times);
        return $this;
    }

    /**
     * Delete white spaces
     */
    public function pad() {
        $this->replace(' ', '');
        return $this;
    }

    /**
     * Add $prefix to the begining of the Julis
     */
    public function prefix(string $prefix) {
        $this->str = $prefix . $this->str;
        return $this;
    }

    /**
     * Replace $search by $by
     */
    public function replace(string $search, string $by) {
        $this->str = str_replace($search, $by, $this->str);
        return $this;
    }

    /**
     * TODO
     */
    public function replaceVariables(array $values) {
        foreach($values as $variable => $value) {
            $this->replace('$'.$variable, $value); 
        }

        return $this;
    }

    /**
     * Reset the Julis to the original
     */
    public function reset() {
        $this->str = $this->o_str;
        return $this;
    }

    /**
     * Reverse the chars
     */
    public function reverse() {
        $this->str = strrev($this->str);
        return $this;
    }

    /**
     * Truncate the Julis beginning from the right
     */
    public function right(int $length) {
        if($length > $this->count()) {
            return $this->str;
        }
        $this->str = substr($this->str, $this->count() - $length, $length);
        return $this;
    }

    public function splitLeft(string $separator, int $maxSplit = PHP_INT_MAX) {
        return explode($separator, $this->str, $maxSplit);
    }

    public function splitRight(string $separator, int $maxSplit) {

    }

    /**
     * Returns a boolean determining if the Julis ends with the specified $search
     */
    public function startsWith(string $search) {
        if(empty($search)) return false;

        return $this->firstIndexOf($search) === 0;
    }

    /**
     * Delete HTML tags in Julis. You can allow some tags with $allow
     */
    public function strip(string $allow = '') {
        $this->str = strip_tags($this->str, $allow);
        return $this;
    }
    
    /**
     * Add $suffix to the end of Julis
     */
    public function suffix(string $suffix) {
        $this->str = $this->str . $suffix;
        return $this;
    }

    /**
     * Delete whitespaces at the begining and ending of Julis
     */
    public function trim() {
        $this->str = trim($this->str);
        return $this;
    }

    /**
     * Capitalize every char
     */
    public function uppercase() {
        $this->str = strtoupper($this->str);
        return $this;
    }

    public function __toString()
    {
        return $this->str;
    }
}