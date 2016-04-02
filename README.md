DotpayBundle
============

**Not production yet**


## 1. Configuration

#### Parameters strategy
```yml
# app/config/config.yml

parameters:
    dotpay:
        credentials:
            id: xxxxx
            pin: xxxxxxxxxxx
```

#### Extension strategy
```yml
# app/config/config.yml

symfony_collection_dotpay:
    credentials:
        id: xxxxx
        pin: xxxxxxxxxxx
```

#### Custom strategy


## Transaction request

```php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use SymfonyCollection\DotpayBundle\Entity\PaymentRequest;
use SymfonyCollection\DotpayBundle\Form\Type\PaymentRequestType;

class DefaultController extends Controller
{
    /**
     * @Route("/transaction-request")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function requestAction(Request $request)
    {
        $paymentRequest = new PaymentRequest();
        $form = $this->createForm(PaymentRequestType::class, $paymentRequest);
        $form->handleRequest($request);
        if ($form->isValid()) {
          $manager = $this->get('doctrine')->getManager();
          $manager->persist($paymentRequest);
          $manager->flush();
          // Redirect to dotpay service
        }
        return $this->render('default\transaction-request.html.twig', [
            'form' => $form->createView()
        ]);
    }
```

## 

```php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use SymfonyCollection\DotpayBundle\Entity\PaymentStatus;
use SymfonyCollection\DotpayBundle\Form\Type\PaymentStatusType;

class DefaultController extends Controller
{
    /**
     * @Route("/transaction-response")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function statusAction(Request $request)
    {
        $paymentStatus = new PaymentStatus();
        $form = $this->createForm(PaymentStatusType::class, $paymentStatus);
        $form->handleRequest($request);
        if ($form->isValid()) {
          // Update transaction status
          // Update UI
          return new Response("OK");
        }
        // Log validation errors
    }
```

