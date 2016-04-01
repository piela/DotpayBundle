DotpayBundle
============

**Not production yet**


### Dotpay credentials
### Transaction request

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

### Transaction response (URLC)

