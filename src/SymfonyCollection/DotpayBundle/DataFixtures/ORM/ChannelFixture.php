<?php

namespace SymfonyCollection\DotpayBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SymfonyCollection\DotpayBundle\Entity\Channel;
use SymfonyCollection\DotpayBundle\Entity\ChannelCategory;

class ChannelFixture implements FixtureInterface, OrderedFixtureInterface
{
    /**
     * @return int
     */
    public function getOrder()
    {
        return 2;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        foreach($this->channels() as $data) {
            $manager->persist(
                (new Channel())
                    ->setNumber($data[0])
                    ->setChannelCategory(
                        $manager->getRepository(
                            ChannelCategory::class
                        )->findOneByName($data[1])
                    )
                    ->setName($data[2])
                    ->setProvider($data[3])
                    ->setLogotype($this->fileName($data[2]))
            );
        }
        $manager->flush();
    }

    /**
     * @return array
     */
    private function channels()
    {
        return [
            [71, 'CREDIT_CARDS', 'MasterPass', 'First Data Polska S.A.'],
            [246, 'CREDIT_CARDS', 'Karty płatnicze via Payeezy', 'First Data Polska S.A.'],
            [248, 'CREDIT_CARDS', 'Karty płatnicze', ''],
            [1, 'E_TRANSFERS', 'mTransfer', 'Karty mBank S.A.'],
            [2, 'E_TRANSFERS', 'Płacę z Inteligo', 'Inteligo'],
            [4, 'E_TRANSFERS', 'Płacę z iPKO', 'Bank PKO BP'],
            [6, 'E_TRANSFERS', 'Przelew24', 'Bank Zachodni WBK S.A.'],
            [18, 'E_TRANSFERS', 'Przelew z BPH', 'Bank BPH S.A.'],
            [36, 'E_TRANSFERS', 'Pekao24Przelew', 'Bank Pekao S.A.'],
            [38, 'E_TRANSFERS', 'Płać z ING', 'ING Bank Śląski S.A.'],
            [44, 'E_TRANSFERS', 'Millennium - Płatności Internetowe', 'Millennium Bank S.A.'],
            [45, 'E_TRANSFERS', 'Płacę z Alior Bankiem', 'Alior Bank S.A.'],
            [46, 'E_TRANSFERS', 'Płacę z Citi Handlowy', 'Citi Bank Handlowy S.A.'],
            [48, 'E_TRANSFERS', 'R-Przelew', 'Raiffeisen Bank Polska S.A.'],
            [50, 'E_TRANSFERS', 'Pay Way Toyota Bank', 'Toyota Bank Polska'],
            [51, 'E_TRANSFERS', 'Płać z BOŚ', 'BOŚ Bank S.A.'],
            [56, 'E_TRANSFERS', 'eurobank - płatność online', 'Eurobank'],
            [58, 'E_TRANSFERS', 'Szybkie Płatności Internetowe z Deutsche Bank PBC', 'Deutsche Bank PBC S.A.'],
            [60, 'E_TRANSFERS', 'Płacę z T-Mobile Usługi Bankowe', 'Alior Bank S.A. Oddział T-Mobile Usługi Bankowe'],
            [63, 'E_TRANSFERS', 'Płacę z IKO', 'Bank PKO BP'],
            [65, 'E_TRANSFERS', 'Płacę z Idea Bank', 'Idea Bank S.A.'],
            [66, 'E_TRANSFERS', 'Płacę z PBS', 'Podkarpacki Bank Spółdzielczy'],
            [70, 'E_TRANSFERS', 'Pocztowy24', 'Bank Pocztowy S.A.'],
            [72, 'E_TRANSFERS', 'Płacę z Orange', 'mBank S.A.'],
            [73, 'E_TRANSFERS', 'BLIK', 'Polski Standard Płatności Sp. z o.o.'],
            [74, 'E_TRANSFERS', 'Banki Spółdzielcze', 'Krajowa Izba Rozliczeniowa S.A.'],
            [75, 'E_TRANSFERS', 'Płacę z Plus Bank', 'Plus Bank S.A.'],
            [76, 'E_TRANSFERS', 'Getin Bank PBL', 'Getin Noble Bank S.A.'],
            [80, 'E_TRANSFERS', 'Noble Pay', 'Getin Noble Bank S.A.'],
            [81, 'E_TRANSFERS', 'Idea Cloud', 'Idea Bank S.A.'],
            [7, 'ONLINE_TRANSFERS', 'ING Klienci korporacyjni', 'ING Bank Śląski S.A.'],
            [10, 'ONLINE_TRANSFERS', 'Millennium Klienci korporacyjni', 'Millennium Bank S.A.'],
            [16, 'ONLINE_TRANSFERS', 'Credit Agricole', 'Credit Agricole Bank Polska S.A.'],
            [27, 'ONLINE_TRANSFERS', 'BGŻ', 'Bank BGŻ S.A.'],
            [32, 'ONLINE_TRANSFERS', 'BNP Paribas', 'BNP Paribas'],
            [33, 'ONLINE_TRANSFERS', 'Volkswagen Bank', 'Volkswagen Bank Polska'],
            [11, 'CASH_PAYMENTS', 'Przelew/Przekaz', ''],
            [21, 'CASH_PAYMENTS', 'VIA - Moje Rachunki', 'BillBird S.A.'],
            [31, 'CASH_PAYMENTS', 'Zapłać w Żabce i we Freshmarket', 'Żabka Polska sp. z o.o.'],
            [35, 'CASH_PAYMENTS', 'Kantor Polski', 'Kantor Polski S.A.'],
            [82, 'CASH_PAYMENTS', 'Przelew SEPA', ''],
            [24, 'E_WALLET_AND_VOUCHERS', 'mPay', 'mPay S.A.'],
            [52, 'E_WALLET_AND_VOUCHERS', 'SkyCash', 'SkyCash Poland S.A.'],
            [55, 'ONLINE_INSTALLMENTS', 'erata - raty z dotpay', 'Alior Bank S.A.'],
            [82, 'ONLINE_INSTALLMENTS', 'mRaty', 'mBank S.A.'],
            [212, 'OTHERS', 'PayPal', 'PayPal'],
            [77, 'DEFERRED_PAYMENTS', 'FerBuy', 'FerBuy Poland Sp. z.o.o.'],
        ];
    }

    /**
     * @return string
     */
    private function fileName($name)
    {
        return mb_strtolower(
            str_replace([' ', '..'], ['_', '.'], sprintf('%s.png', $name)),
            'UTF-8'
        );
    }

}