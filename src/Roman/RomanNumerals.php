<?php

namespace Roman;

class RomanNumerals {

    public $romanNumber;

    public function getNumber(string $romanNumber) {
        $this->romanNumber = $romanNumber;
        return 1;
    }

}