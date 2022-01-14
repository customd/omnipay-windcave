<?php

namespace Omnipay\Windcave\Message;

use Money\Currencies\ISOCurrencies;
use Money\Formatter\DecimalMoneyFormatter;
use Money\Money;
use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\Common\Message\RequestInterface;

/**
 * @link https://px5.docs.apiary.io/#reference/0/sessions/create-session
 */
class CreateSessionRequest extends AbstractRequest implements RequestInterface
{
    /**
     * @return string
     * @throws InvalidRequestException
     */
    public function getData()
    {

        $data = [
            'type'               => $this->getType() ?? 'purchase',
            'currency'           => $this->getCurrency(),
            'merchantReference'  => substr($this->getMerchantReference(), 0, 64),
            'storeCard'          => $this->getStoreCard() ?? 0,
            'storeCardIndicator' => $this->getstoreCardIndicator() ?? 'single',
            'callbackUrls'       => [
                'approved'  => 'http://example.com?status=approved',
                'declined'  => 'http://example.com?status=declined',
                'cancelled' => 'http://example.com?status=cancelled',
            ],
        ];

        // Has the Money class been used to set the amount?
        if ($this->getAmount() instanceof Money) {
            // Ensure principal amount is formatted as decimal string e.g. 50.00
            $data['amount'] = (new DecimalMoneyFormatter(new ISOCurrencies()))->format($this->getAmount());
        } else {
            $data['amount'] = $this->getAmount();
        }

        return json_encode($data);
    }



    public function getType()
    {
        return $this->getParameter('type');
    }

    public function setType($value)
    {
        return $this->setParameter('type', $value);
    }

    public function getStoreCard()
    {
        return $this->getParameter('storeCard');
    }

    public function setStoreCard($value)
    {
        return $this->setParameter('storeCard', $value);
    }

    public function getStoreCardIndicator()
    {
        return $this->getParameter('storeCardIndicator');
    }

    public function setStoreCardIndicator($value)
    {
        return $this->setParameter('storeCardIndicator', $value);
    }

    /**
     * @return mixed
     */
    public function getEndpoint()
    {
        return $this->baseEndpoint() . '/sessions';
    }

    public function getHttpMethod()
    {
        return 'POST';
    }

    public function getContentType()
    {
        return 'application/json';
    }

    public function getResponseClass()
    {
        return CreateSessionResponse::class;
    }
}
