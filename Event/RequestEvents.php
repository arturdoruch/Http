<?php

namespace ArturDoruch\Http\Event;

/**
 * Contains events thrown while HTTP request is making.
 * @todo In version 4 move this class to ArturDoruch\Http namespace.
 *
 * @author Artur Doruch <arturdoruch@interia.pl>
 */
final class RequestEvents
{
    /**
     * The event occurs just before send HTTP request.
     *
     * @Event
     */
    const BEFORE = 'request.before';

    /**
     * The event occurs when HTTP request is done.
     *
     * @Event
     */
    const COMPLETE = 'request.complete';
}
 