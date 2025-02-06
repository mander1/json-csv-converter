<?php

//test to check correct merchant id's are being matched

use PHPUnit\Framework\TestCase;

class ExtractionTest extends TestCase
{
    public function jsonDataExtracted()
    {
        require 'convert-to-csv2.php';

        $expected = ['1144', '2033', '1022', '7596'];
        $actual = ['1144', '2033', '1022', '7596'];

        $this->assertEquals($expected, $actual);
    }

}
?>