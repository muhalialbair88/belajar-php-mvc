<?php

namespace Alialbair\BelajarPhpMvc\Controller;

class ProductController
{
    function categories(string $productId, string $categoryId)
    {
        echo "PRODUCT $productId, CATEGORY $categoryId";
    }
}
?>