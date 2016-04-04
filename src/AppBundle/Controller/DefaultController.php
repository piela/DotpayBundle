<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use SymfonyCollection\DotpayBundle\Entity\ErrorCode;
use SymfonyCollection\DotpayBundle\Entity\Payment;
use SymfonyCollection\DotpayBundle\Entity\PaymentHistory;
use SymfonyCollection\DotpayBundle\Form\Type\OperationTypeType;
use SymfonyCollection\DotpayBundle\Form\Type\PaymentType;
use SymfonyCollection\DotpayBundle\Form\Type\PaymentHistoryType;

class DefaultController extends Controller
{

    public function requestAction(Request $request)
    {

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
        $paymentStatus = new PaymentHistory();
        return $this->render('default\payment-request.html.twig', [
            'form' => $this->createForm(PaymentHistoryType::class, $paymentStatus, [
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
