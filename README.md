# Solution Notes
### First Attempt (Commit labelled "First Attempt")

First attempt I decided that it was more efficient to throw the error on the creation of the numeral rather than the calling of toInt as the error is with the value of the numeral itself and not the conversion.
I did so as I believe that, if more methods were to be added, reusing the same test for the numeral in each method, or even creating its own method to be called each time, would be less efficient than just calling it the once when the numeral is created.

I forgot how roman numerals actually functioned this run through, so my implementation didn't take into account that IX is 9. This can be accounted for by working in reverse and subtracting if the previous (next in reverse) numeral is smaller.
The validation and error throwing works as intended.

### Second Attempt (Commit labelled "Second Attempt") - All passed

My previous attempt at explaining what I'd do here was messy, and probably wrong. However if you're checking IX, reversing it to XI and checking would mean that the current value in position 1 is smaller than that in position 0, so the value in position 1 needs to be subtracted from the value, not added.

Upon testing this change, the code functioned as intended and all results were a pass.

# RomanNumeralTest

To install this you will need PHP and Composer

running ubuntu this can be installed with `sudo apt install php composer` then in this directory run `composer install`

# The task

The aim is is implement the source code [link](https://github.com/SykesCottages/RomanNumeralTest/blob/master/src/RomanNumeral.php) to pass the pre written tests.

To run the tests run `./vendor/bin/phpunit` and look at the output.

The `toInt` function should be able to translate any Roman Numerial to the correct integer.

For example `VI` should return `6` and `XX` should return `20`

# Cant get phpunit running ?

Included is an index file (index.php) This should run on any web server (eg MAMP, XAMP etc)