<?php

declare(strict_types=1);

namespace Tomrf\HtmxMessage;

class HtmxServerRequest extends ServerRequestProxy
{
    public function isHxRequest(): bool
    {
        return $this->hasHeader('HX-Request');
    }

    public function isHxBoosted(): bool
    {
        return $this->request->hasHeader('HX-Boosted');
    }

    public function isHxHistoryRestoreRequest(): bool
    {
        return $this->request->hasHeader('HX-History-Restore-Request');
    }

    public function hasHxTrigger(): bool
    {
        return $this->request->hasHeader('HX-Trigger');
    }

    public function hasHxTriggerName(): bool
    {
        return $this->request->hasHeader('HX-Trigger-Name');
    }

    public function hasHxTarget(): bool
    {
        return $this->request->hasHeader('HX-Target');
    }

    public function hasHxPrompt(): bool
    {
        return $this->request->hasHeader('HX-Prompt');
    }

    public function getHxCurrentUrl(): string
    {
        return $this->request->getHeaderLine('HX-Current-URL');
    }

    public function getHxTrigger(): string
    {
        return $this->request->getHeaderLine('HX-Trigger');
    }

    public function getHxTriggerName(): string
    {
        return $this->request->getHeaderLine('HX-Trigger-Name');
    }

    public function getHxTarget(): string
    {
        return $this->request->getHeaderLine('HX-Target');
    }

    public function getHxPrompt(): string
    {
        return $this->request->getHeaderLine('HX-Prompt');
    }
}
