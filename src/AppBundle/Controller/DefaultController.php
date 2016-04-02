<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use SymfonyCollection\DotpayBundle\Entity\ErrorCode;
use SymfonyCollection\DotpayBundle\Entity\PaymentRequest;
use SymfonyCollection\DotpayBundle\Entity\PaymentStatus;
use SymfonyCollection\DotpayBundle\Form\Type\OperationTypeType;
use SymfonyCollection\DotpayBundle\Form\Type\PaymentRequestType;
use SymfonyCollection\DotpayBundle\Form\Type\PaymentStatusType;

class DefaultController extends Controller
{
    /**
     * @Route("/transaction-request", name="dotpay_request_form")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function requestAction(Request $request)
    {
        $paymentRequest = new PaymentRequest();
        $form = $this->createForm(PaymentRequestType::class, $paymentRequest, [
            'action' => $this->generateUrl('dotpay_request')
        ]);
        return $this->render('default\payment-request.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/transaction-send-request", name="dotpay_request")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function sendRequestAction(Request $request)
    {
        return $this->forward('dotpay.controller:requestAction');

        return $this->render('default\payment-request.html.twig', [
            'form' => $form->createView()
        ]);
    }


    /**
     * @Route("/transaction-response", name="dotpay_urlc")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function statusAction(Request $request)
    {
        $paymentStatus = new PaymentStatus();
        return $this->render('default\payment-request.html.twig', [
            'form' => $this->createForm(PaymentStatusType::class, $paymentStatus, [
                'action' => $this->generateUrl('dotpay_send_url')
            ])->createView()
        ]);
    }

    /**
     * @Route("/transaction-send-response", name="dotpay_send_url")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function sendStatusAction(Request $request)
    {
        return $this->forward('dotpay.controller:responseAction');

    }



}
