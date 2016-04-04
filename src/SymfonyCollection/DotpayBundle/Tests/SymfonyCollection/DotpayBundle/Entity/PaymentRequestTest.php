<?php


namespace SymfonyCollection\DotpayBundle\Entity;

use PHPUnit_Framework_TestCase;

/**
 * @coversDefaultClass SymfonyCollection\DotpayBundle\Entity\Payment
 */
class PaymentRequestTest extends PHPUnit_Framework_TestCase
{

    /**
     * @covers ::getApiVersion()
     * @covers ::setApiVersion()
     */
    public function testApiVersion()
    {
        $this->assertSame(
            'dev',
            (new Payment())->setApiVersion('dev')->getApiVersion()
        );
    }

}