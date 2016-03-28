<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use SymfonyFolder\DotpayBundle\Entity\PaymentRequest;
use SymfonyFolder\DotpayBundle\Form\PaymentRequestType;
use SymfonyFolder\DotpayBundle\Entity\PaymentStatus;
use SymfonyFolder\DotpayBundle\Form\PaymentStatusType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use SymfonyFolder\DotpayBundle\Service\CheckSumConstraint;

class DefaultController extends Controller
{
    /**
     * @Route("/payment-request")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function requestAction(Request $request)
    {

        $paymentRequest = new PaymentRequest();
        $paymentRequest->setMerchantId(1000000);

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
        $paymentStatus->setOperationDatetime(new \DateTimeImmutable('now'));

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
