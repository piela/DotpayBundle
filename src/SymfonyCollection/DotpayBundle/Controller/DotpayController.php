<?php

namespace SymfonyCollection\DotpayBundle\Controller;

use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use SymfonyCollection\DotpayBundle\Entity\Payment;
use SymfonyCollection\DotpayBundle\Entity\PaymentHistory;
use SymfonyCollection\DotpayBundle\Form\Type\PaymentType;
use SymfonyCollection\DotpayBundle\Form\Type\PaymentHistoryType;

class DotpayController
{
    /**
     * @var EventDispatcher
     */
    private $dispatcher;

    /**
     * @var FormFactory
     */
    private $formFactory;

    /**
     * @param EventDispatcher $dispatcher
     */
    public function __construct(EventDispatcher $dispatcher, FormFactory $formFactory)
    {
        $this->dispatcher = $dispatcher;
        $this->formFactory = $formFactory;
    }

    /**
     * @param Request $request
     */
    public function requestAction(Request $request)
    {
        $payment = new Payment();
        $form = $this->formFactory->create(PaymentType::class, $payment);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $this->dispatcher->dispatch('dotpay.request');
            return new Response("Request OK");
        }
        return new Response("Request failure");
    }

    /**
     * @param Request $request
     */
    public function responseAction(Request $request)
    {
        $paymentStatus = new PaymentHistory();
        $form = $this->formFactory->create(PaymentHistoryType::class, $paymentStatus);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $this->dispatcher->dispatch('dotpay.response');
            return new Response("OK"); // Must be "OK"
        }
        return new Response("Response failure"); // Temporary line
    }

    /**
     * @param Request $request
     */
    public function requestErrorAction(Request $request)
    {
        $this->dispatcher->dispatch('dotpay.errror');
        return new Response("There was an error during dotpay request");
    }

}