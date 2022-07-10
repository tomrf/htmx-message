<?php

declare(strict_types=1);

namespace Tomrf\HtmxMessage;

use Tomrf\HtmxMessage\Proxy\ServerRequestInterfaceProxy;

/**
 * HtmxServerRequest is a proxy for PSR-7 server request objects implementing
 * \Psr\Http\Message\ServerRequestInterface.
 *
 * You can safely wrap any ServerRequestInterface object, also those not
 * originating from htmx, without affecting your application.
 *
 * Check if the request originated from htmx using the isHxRequest() method.
 *
 * HtmxServerRequest objects retains immutability in the same fashion as
 * one would expect from a PSR-7 MessageInterface, returning a new object
 * wrapping a new ServerRequestInterface instance whenever the HtmxServerRequest
 * is changed.
 *
 * Example:
 *
 *     $request = new HtmxServerRequest($request);
 *     if ($request->isHxRequest() && $request->isHxBoosted()) {
 *         // htmx request from boosted client, respond accordingly
 *     }
 *
 *     $userPrompt = $request->getHxPrompt();
 *     // ...
 */
class HtmxServerRequest extends ServerRequestInterfaceProxy
{
    public function getHxCurrentUrl(): string
    {
        return $this->message->getHeaderLine('HX-Current-URL');
    }

    public function getHxPrompt(): string
    {
        return $this->message->getHeaderLine('HX-Prompt');
    }

    public function getHxTarget(): string
    {
        return $this->message->getHeaderLine('HX-Target');
    }

    public function getHxTrigger(): string
    {
        return $this->message->getHeaderLine('HX-Trigger');
    }

    public function getHxTriggerName(): string
    {
        return $this->message->getHeaderLine('HX-Trigger-Name');
    }

    public function hasHxPrompt(): bool
    {
        return $this->message->hasHeader('HX-Prompt');
    }

    public function hasHxTarget(): bool
    {
        return $this->message->hasHeader('HX-Target');
    }

    public function hasHxTrigger(): bool
    {
        return $this->message->hasHeader('HX-Trigger');
    }

    public function hasHxTriggerName(): bool
    {
        return $this->message->hasHeader('HX-Trigger-Name');
    }

    public function isHxBoosted(): bool
    {
        return $this->message->hasHeader('HX-Boosted');
    }

    public function isHxHistoryRestoreRequest(): bool
    {
        return $this->message->hasHeader('HX-History-Restore-Request');
    }

    public function isHxRequest(): bool
    {
        return $this->message->hasHeader('HX-Request');
    }
}
