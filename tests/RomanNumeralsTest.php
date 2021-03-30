<?php

    use PHPUnit\Framework\TestCase;

    class RomanNumeralsTest extends TestCase {

        public $roman;

        public $validRomanNums;

        // Set up a new class for each test
        public function setUp(): void {
            // no need to load class file for Queue due to autoload
            $this->roman = new Roman\RomanNumerals;
        }

        public function testAnIntIsReturned() {
            foreach($this->roman->validRomanNums as $key => $num) {
                $this->assertIsInt($this->roman->convert($key));
            }
        }

        public function testCorrectTranslationForSingleNumIsReturned() {
            foreach($this->roman->validRomanNums as $key => $num) {
                $this->assertEquals($num, $this->roman->convert($key));
            }
        }

        public function testCorrectTranslationForMultipleNumsIsReturned() {
            $this->assertEquals(1005, $this->roman->convert('MV'));
        }

        public function testIncorrectSingleRomanNumberGivenAsArgumentReturnsCero() {
            $this->assertEquals(0, $this->roman->convert('G'));
        }

        public function testIncorrectMultipleRomanNumbersGivenAsArgumentReturnsCero() {
            $this->assertEquals(0, $this->roman->convert('GJ'));
        }

        public function testIncorrectAndCorrectMultipleRomanNumbersGivenAsArgumentReturnsZero() {
            $this->assertEquals(0, $this->roman->convert('XJ'));
        }

        public function testSubstractingRomanNumeralsTranslation() {
            $this->assertEquals(2014, $this->roman->convert('MMXIV'));
            $this->assertEquals(19, $this->roman->convert('XIX'));
            $this->assertEquals(4, $this->roman->convert('IV'));
        }

        public function testNonCapitalRomanNumbersArgumentProvided() {
            $this->assertEquals(2021, $this->roman->convert('mMxXI'));
        }

    }