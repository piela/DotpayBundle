DotpayBundle
============

E-secure payments in Internet services


## Enviroment

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

## Entity diagram

![Entity diagram](https://github.com/SymfonyCollection/DotpayBundle/blob/master/src/SymfonyCollection/DotpayBundle/Resources/docs/payment.erd.png)



