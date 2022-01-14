<?php

namespace Omnipay\Windcave\Message;

class GetCardResponse extends AbstractResponse
{
    public function getCardId()
    {
        return $this->getData('id');
    }

    public function getCardHolderName()
    {
        return $this->getData('cardHolderName');
    }

    public function getCardNumber()
    {
        return $this->getData('cardNumber');
    }

    public function getCardExpiry()
    {
        return $this->getCardExpiryMonth() . '/' . $this->getCardExpiryYear();
    }

    public function getCardExpiryMonth()
    {
        return $this->getData('dateExpiryMonth');
    }
    public function getCardExpiryYear()
    {
        return $this->getData('dateExpiryYear');
    }

    public function getCardType()
    {
        return $this->getData('cardType');
    }

    public function getIssuerCountryCode()
    {
        return $this->getData('issuerCountryCode');
    }

    public function getMac()
    {
        return $this->getData('mac');
    }

    public function getCustomerId()
    {
        return $this->getData('customerId');
    }
}
