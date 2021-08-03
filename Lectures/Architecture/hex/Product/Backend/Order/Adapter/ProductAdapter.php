<?php

declare(strict_types=1);

class ProductAdapter
{
    private ProductInterface $product;

    public function __construct(ProductInterface $product)
    {
        $this->product = $product;
    }

}
