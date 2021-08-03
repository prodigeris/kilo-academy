<?php

declare(strict_types=1);

class CreateOrderController
{
    private OrderFactory $factory;
    private CreateOrderPort $createOrderPort;

    public function __construct(CreateOrderPort $createOrderPort)
    {
        $this->createOrderPort = $createOrderPort;
    }

    public function __invoke(\http\Client\Request $request): JsonResponse
    {

    }
}
