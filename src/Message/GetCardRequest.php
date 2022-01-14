<?php

namespace Omnipay\Windcave\Message;

use Omnipay\Common\Message\RequestInterface;

/**
 * @link https://px5.docs.apiary.io/#reference/0/cards/query-card
 */
class GetCardRequest extends AbstractRequest implements RequestInterface
{
    public function getCardId()
    {
        return $this->getParameter('cardId');
    }

    public function setCardId($value)
    {
        return $this->setParameter('cardId', $value);
    }

    /**
     * @return array|mixed
     */
    public function getData()
    {
        return null;
    }

    /**
     * @return mixed
     */
    public function getEndpoint()
    {
        return $this->baseEndpoint() . '/cards/' . $this->getCardId();
    }

    public function getHttpMethod()
    {
        return 'GET';
    }

    public function getContentType()
    {
        return 'application/json';
    }

    public function getResponseClass()
    {
        return GetCardResponse::class;
    }
}
