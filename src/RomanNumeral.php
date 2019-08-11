<?php
namespace PhpNwSykes;

class RomanNumeral
{
    protected $symbols = [
        1000 => 'M',
        500 => 'D',
        100 => 'C',
        50 => 'L',
        10 => 'X',
        5 => 'V',
        1 => 'I',
    ];

    protected $numeral;

    /**
     * Construct a roman numeral
     * 
     * @throws InvalidNumeral when the passed string is an invalid roman numeral
     */
    public function __construct(string $romanNumeral)
    {
        //First check the input string to ensure it is a valid roman numeral
        //It seems much smarter to just not allow the constructing of a RomanNumeral to begin with if the constructor is not passed a valid numeral 
        //Only need to throw an exception once here versus in every single method that could end up being added to the RomanNumeral class

        //Sanitise input (remove all whitespace)
        $romanNumeral = str_replace(' ', '', $romanNumeral);

        //Iterate over each character by splitting the string into an array of characters
        foreach (str_split($romanNumeral) as $char) {
            //Check to see if each char is not in the array values of $symbols
            if (!in_array($char, array_values($this->symbols))) {
                //Throw an exception
                throw new InvalidNumeral;
            }
        }
        
        //Set the numeral
        $this->numeral = $romanNumeral;
    }

    /**
     * Converts a roman numeral such as 'X' to a number, 10
     */
    public function toInt():int
    {
        //The total value
        $total = 0;
        $previousValue = 0;

        //Iterate over the characters in $numeral
        foreach (str_split(strrev($this->numeral)) as $char) {
            //use array search to find the key for the current character
            $currentValue = array_search($char, $this->symbols);

            //If the value in the current position is less than the last one, subtract the value
            if ($currentValue < $previousValue)
                $total -= $currentValue;
            //Otherwise, add the value
            else {
                $total += $currentValue;
            }

            //Finally, update $previousValue
            $previousValue = $currentValue;
        }

        //The total should be the valid numeral
        return $total;
    }
}
