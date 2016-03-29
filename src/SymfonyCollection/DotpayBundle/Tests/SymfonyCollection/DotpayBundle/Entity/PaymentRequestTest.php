<?php


namespace SymfonyCollection\DotpayBundle\Entity;

use PHPUnit_Framework_TestCase;

/**
 * @coversDefaultClass SymfonyCollection\DotpayBundle\Entity\PaymentRequest
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
            (new PaymentRequest())->setApiVersion('dev')->getApiVersion()
        );
    }

}