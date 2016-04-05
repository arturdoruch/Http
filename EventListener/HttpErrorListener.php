<?php

namespace ArturDoruch\Http\EventListener;

use ArturDoruch\Http\Event\CompleteEvent;
use ArturDoruch\Http\Exception\RequestException;

/**
 * Throws exceptions when response status code is 4xx, 5xx or 0
 *
 * @author Artur Doruch <arturdoruch@interia.pl>
 */
class HttpErrorListener
{
    /**
     * Throw a RequestException on an HTTP protocol error
     *
     * @param CompleteEvent $event Emitted event
     * @throws RequestException
     */
    public function onComplete(CompleteEvent $event)
    {
        if ($event->isMultiRequest()) {
            return;
        }

        $code = (string) $event->getResponse()->getStatusCode();
        // Throw an exception for an unsuccessful response
        if ($code[0] >= 4 || $code[0] == 0) {
            throw RequestException::create($event->getResponse(), null, $event->getRequest());
        }
    }
}