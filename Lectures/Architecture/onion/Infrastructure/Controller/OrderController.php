<?php

declare(strict_types=1);

class OrderController
{
    private OrderFactory $orderFactory;

    public function __construct(OrderFactory $orderFactory)
    {
        $this->orderFactory = $orderFactory;
    }
}
