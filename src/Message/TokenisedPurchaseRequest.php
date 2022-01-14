<?php

namespace Omnipay\Windcave\Message;

use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\Common\Message\RequestInterface;

class TokenisedPurchaseRequest extends AbstractRequest implements RequestInterface
{
    public function getData()
    {
        if (! $this->getParameter('token')) {
            throw new InvalidRequestException('You must pass a "token" parameter.');
        }

        return json_encode([
            "type"               => "purchase",
            "method"             => "card",
            "mode"               => "internet",
            "merchantReference"  => substr($this->getDescription(), 0, 64),
            "storeCardIndicator" => "credentialonfile",
            "amount"             => $this->getAmount(),
            "currency"           => $this->getCurrency(),
            "cardId"             => $this->getToken(),
        ]);
    }



    public function getEndpoint()
    {
        return $this->baseEndpoint() . '/transactions';
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
        return TokenisedPurchaseResponse::class;
    }
}
