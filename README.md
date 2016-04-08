DotpayBundle
============

E-secure payments in Internet services


>Dotpay, has been on the market since 2001 (up till 2008 has been run under the name of AllPay) and is an indisputable leader on the European market among companies dealing with financial services (financial services agency) within e-transfers between a merchant and a customer in the Internet.

## Configuration


```yml
# app/config/config.yml

symfony_collection_dotpay:
    ip: 195.150.9.37
    api: dev
    credentials:
        id: xxxxx
        pin: xxxxxxxxxxx
```

## Entity diagram

![Entity diagram](https://github.com/SymfonyCollection/DotpayBundle/blob/master/src/SymfonyCollection/DotpayBundle/Resources/docs/payment.erd.png)



