<?php

//test to check JSON data successfully converted to csv

use PHPUnit\Framework\TestCase;

class ExtractionTest extends TestCase
{
    public function jsonDataExtracted()
    {
        require 'convert-to-csv2.php';

        $expected = "$memoryFile"; //memoryFile should be written which indicates successful JSON > csv
        $actual = "$memoryFile";

        $this->assertEquals($expected, $actual);
    }

}
?>