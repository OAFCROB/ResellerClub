<?php

namespace Tests\Unit\Orders\EmailForwarders\Requests;

use PHPUnit\Framework\TestCase;
use ResellerClub\EmailAddress;
use ResellerClub\Orders\EmailForwarders\Requests\AddRequest;
use ResellerClub\Orders\Order;

class AddRequestTest extends TestCase
{
    protected function setUp()
    {
        parent::setUp();

        $order = new Order(123);
        $email = new EmailAddress('team@example.com');

        $this->request = new AddRequest($order, $email);
        $this->request->setForwarders([
            new EmailAddress('john.doe@example.com'),
            new EmailAddress('jane.doe@example.com'),
        ]);
    }

    public function testItCanGetOrderId()
    {
        $this->assertInternalType('integer', $this->request->orderId());
        $this->assertEquals(123, $this->request->orderId());
    }

    public function testItCanGetEmail()
    {
        $this->assertInternalType('string', $this->request->email());
        $this->assertEquals('team@example.com', $this->request->email());
    }

    public function testItCanGetForwarders()
    {
        $this->assertInternalType('string', $this->request->forwarders());
        $this->assertEquals(
            'john.doe@example.com,jane.doe@example.com',
            $this->request->forwarders()
        );
    }
}