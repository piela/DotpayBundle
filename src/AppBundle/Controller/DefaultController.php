<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use SymfonyBundles\DotpayBundle\Entity\PaymentRequest;
use SymfonyBundles\DotpayBundle\Form\PaymentRequestType;
use SymfonyBundles\DotpayBundle\Entity\PaymentStatus;
use SymfonyBundles\DotpayBundle\Form\PaymentStatusType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/payment-request")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function requestAction(Request $request)
    {
        $paymentRequest = new PaymentRequest();
        $form = $this->createForm(PaymentRequestType::class, $paymentRequest);
        $form->handleRequest($request);
        if ($form->isValid()) {
            dump($paymentRequest);
            return new Response("Valid");
        }

        return $this->render('default\payment-request.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/payment-status")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function statusAction(Request $request)
    {
        $paymentStatus = new PaymentStatus();
        $form = $this->createForm(PaymentStatusType::class, $paymentStatus);
        $form->handleRequest($request);
        if ($form->isValid()) {
            dump($paymentStatus);
            return new Response("Valid");
        }

        return $this->render('default\payment-status.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
