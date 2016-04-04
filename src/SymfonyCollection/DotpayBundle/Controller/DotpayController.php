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
use Symfony\Bundle\TwigBundle\TwigEngine;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route(service="dotpay.controller")
 *
 */
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
     * @var TwigRenderer
     */
    private $renderer;
    
    /**
     * @param EventDispatcher $dispatcher
     */
    public function __construct(
        EventDispatcher $dispatcher,
        FormFactory $formFactory,
        TwigEngine $renderer)
    {
        $this->dispatcher = $dispatcher;
        $this->formFactory = $formFactory;
        $this->renderer = $renderer;
    }
    
    /**
     * @param Request $request
     * @Route("/payment", name="dotpay_payment")
     * @return \Symfony\Component\HttpFoundation\Response
     */    
    public function paymentAction(Request $request)
    {
        $payment = new Payment();
        $form = $this->formFactory->create(PaymentType::class, $payment);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $this->dispatcher->dispatch('dotpay.payment');
            return new Response("Request OK");
        }        
        
        return $this->renderer->renderResponse('default\payment-request.html.twig', [
            'form' => $form->createView()
        ]);
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