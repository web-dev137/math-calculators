<?php

declare(strict_types=1);

namespace App\Common\Query;

use App\Common\Query\QueryBusInterface;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Exception\HandlerFailedException;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;

class QueryBus implements QueryBusInterface
{
    use HandleTrait;

    public function __construct(
        private MessageBusInterface $messageBus,
    ) {
    }

    /**
     * @param object|Envelope $query
     *
     * @return mixed The handler returned value
     */
    public function query($query): mixed
    {
        try {
            return $this->handle($query);
        } catch(HandlerFailedException $e) {
            throw $e->getNestedExceptions()[0];
        }
    }
}