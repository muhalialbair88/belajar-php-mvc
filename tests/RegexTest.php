<?php

namespace Alialbair\BelajarPhpMvc\Controller;

use PHPUnit\Framework\TestCase;

class RegexTest extends TestCase
{
    public function testName(){
        $path = "/products/12345/categories/abcde";
        
        // ^awal, $akhir, *lebih dari 1 karakter
        $pattern = "#^/products/([0-9a-zA-Z]*)/categories/([0-9a-zA-Z]*)$#";

        // variables adalah refrence
        $result = preg_match($pattern, $path, $variables);

        self::assertEquals(1, $result);
        var_dump($variables);

        //untuk menghilangkan data pertama
        array_shift($variables);
        var_dump($variables);

    }

}
?>