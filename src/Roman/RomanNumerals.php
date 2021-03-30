<?php

namespace Roman;

class RomanNumerals {

    public $validRomanNums = ['I' => 1,
                              'V' => 5,
                              'X' => 10,
                              'L' => 50,
                              'C' => 100,
                              'D' => 500,
                              'M' => 1000];

    public function convert(string $romanNum) {
        // Ensure non capitals are valid
        $romanNum = str_split(strtoupper($romanNum));

        $finalNum = 0;
        // go through the string given
        foreach($romanNum as $key => $num) {
            // IE. $num = X
            // Ensures each Roman Number given is valid
            if (array_key_exists($num, $this->validRomanNums)) {
                // First letter will always need to be added
                if ($key === 0) {
                    $finalNum += $this->validRomanNums[$num];
                } else {
                    // If the Roman Number needs to be added
                    if ($this->validRomanNums[$num] <= $this->validRomanNums[$romanNum[$key-1]]) {
                        $finalNum += $this->validRomanNums[$num];
                    // If the Roman Number needs to be substracted
                    } else {
                        // Make the Current number as it needs to be subtracted from previous number
                        $current = $this->validRomanNums[$num] - $this->validRomanNums[$romanNum[$key-1]];
                        // Subtract the previous number from the final number which was added when looking
                        // into the prious number turn as it is now needed in current number
                        $finalNum -= $this->validRomanNums[$romanNum[$key-1]];
                        // Finally add current number to final count
                        $finalNum += $current;
                    }
                }
                // If Roman Number not valid return wrong input given
            } else {
                return 0;
            }
        }
        return $finalNum;
    }

}