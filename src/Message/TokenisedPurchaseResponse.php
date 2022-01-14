<?php

namespace Omnipay\Windcave\Message;

class TokenisedPurchaseResponse extends AbstractResponse
{
    public function isSuccessful()
    {
        $code = $this->getHttpResponseCode();

        return $code === 200 || $code === 201 && $this->getStatus() === 'APPROVED';
    }

    public function getStatus()
    {
        return $this->getData('responseText');
    }

    public function getTransactionId()
    {
        return $this->getData('id');
    }

    public function getMessage()
    {
        return $this->getStatus();
    }
}
