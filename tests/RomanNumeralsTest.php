<?php

    use PHPUnit\Framework\TestCase;

    class RomanNumeralsTest extends TestCase {

        protected static $roman;

        protected static $validRomanNums;

        protected static $validNormalNums;

        // Set up a new class for each test
        public function setUp(): void {
            // no need to load class file for Queue due to autoload
            static::$roman = new Roman\RomanNumerals;
            static::$validRomanNums = ['I', 'V', 'X', 'L', 'C', 'D', 'M'];
            static::$validNormalNums = [1, 5, 10, 50, 100, 500, 1000];
        }

        public function testIntegerIsReturned() {
            $this->assertIsInt(static::$roman->getNumber(1));
        }

        public function testValidRomanNumsArePassedAsArguments() {
            $input = static::$roman->getNumber('xyI');
            $inputToArray = str_split($input);
            foreach($inputToArray as $num) {
            $this->assertStringContainsStringIgnoringCase($num, implode(static::$validRomanNums));
            }
        }
    }