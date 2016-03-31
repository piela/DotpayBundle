<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use SymfonyCollection\DotpayBundle\Entity\OperationType;
use SymfonyCollection\DotpayBundle\Entity\PaymentRequest;
use SymfonyCollection\DotpayBundle\Entity\PaymentStatus;
use SymfonyCollection\DotpayBundle\Form\Type\OperationTypeType;
use SymfonyCollection\DotpayBundle\Form\Type\PaymentRequestType;
use SymfonyCollection\DotpayBundle\Form\Type\PaymentStatusType;

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
        $paymentStatus = $this->get('doctrine')
            ->getManager()
            ->getRepository('SymfonyCollectionDotpayBundle:PaymentStatus')
            ->findOneById(1);

        $form = $this->createForm(PaymentStatusType::class, $paymentStatus);

        $form->handleRequest($request);
        if ($form->isValid()) {
            $this->get('doctrine')->getManager()->persist($paymentStatus);
            $this->get('doctrine')->getManager()->flush();
        }

        return $this->render('default\payment-status.html.twig', [
            'form' => $form->createView()
        ]);
    }

}
