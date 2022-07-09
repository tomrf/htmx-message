<?php

declare(strict_types=1);

namespace Tomrf\HtmxMessage;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

class HtmxResponse extends ResponseProxy
{
    protected array $triggers = [];

    final public function __construct(
        protected ResponseInterface $response,
    ) {
    }

    // HtmxResponse
    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }

    // HX-Redirect
    public function hasHxRedirect(): bool
    {
        return $this->hasHeader('HX-Redirect');
    }

    public function getHxRedirect(): string
    {
        return $this->getHeaderLine('HX-Redirect');
    }

    public function withHxRedirect(string $url): static
    {
        return $this->withHeader('HX-Redirect', $url);
    }

    public function withoutHxRedirect(): static
    {
        return $this->withoutHeader('HX-Redirect');
    }

    // HX-Trigger
    public function hasHxTrigger(): bool
    {
        return $this->hasHeader('HX-Trigger');
    }

    public function getHxTrigger(): array
    {
        return json_decode($this->getHeaderLine('HX-Trigger'), true);
    }

    public function withHxTrigger(string $trigger, mixed $argument = null): static
    {
        return $this->withHeader('HX-Trigger', json_encode([$trigger => $argument]));
    }

    public function withAddedHxTrigger(string $trigger, mixed $argument = null): static
    {
        $value = json_decode($this->getHeaderLine('HX-Trigger'), true);
        $value[$trigger] = $argument;

        return $this->withHeader('HX-Trigger', json_encode($value));
    }

    public function withoutHxTrigger(): static
    {
        return $this->withoutHeader('HX-Trigger');
    }

    // HX-Trigger-After-Settle
    public function hasHxTriggerAfterSettle(): bool
    {
        return $this->hasHeader('HX-Trigger-After-Settle');
    }

    public function getHxTriggerAfterSettle(): array
    {
        return json_decode($this->getHeaderLine('HX-Trigger-After-Settle'), true);
    }

    public function withHxTriggerAfterSettle(string $trigger, mixed $argument = null): static
    {
        return $this->withHeader('HX-Trigger-After-Settle', json_encode([$trigger => $argument]));
    }

    public function withAddedHxTriggerAfterSettle(string $trigger, mixed $argument = null): static
    {
        $value = json_decode($this->getHeaderLine('HX-Trigger-After-Settle'), true);
        $value[$trigger] = $argument;

        return $this->withHeader('HX-Trigger-After-Settle', json_encode($value));
    }

    public function withoutHxTriggerAfterSettle(): static
    {
        return $this->withoutHeader('HX-Trigger-After-Settle');
    }

    // HX-Trigger-After-Swap
    public function hasHxTriggerAfterSwap(): bool
    {
        return $this->hasHeader('HX-Trigger-After-Swap');
    }

    public function getHxTriggerAfterSwap(): array
    {
        return json_decode($this->getHeaderLine('HX-Trigger-After-Swap'), true);
    }

    public function withHxTriggerAfterSwap(string $trigger, mixed $argument = null): static
    {
        return $this->withHeader('HX-Trigger-After-Settle', json_encode([$trigger => $argument]));
    }

    public function withAddedHxTriggerAfterSwap(string $trigger, mixed $argument = null): static
    {
        $value = json_decode($this->getHeaderLine('HX-Trigger-After-Settle'), true);
        $value[$trigger] = $argument;

        return $this->withHeader('HX-Trigger-After-Settle', json_encode($value));
    }

    public function withoutHxTriggerAfterSwap(): static
    {
        return $this->withoutHeader('HX-Trigger-After-Swap');
    }

    // HX-Refresh

    public function hasHxRefresh(): bool
    {
        return 'true' === $this->getHeaderLine('HX-Refresh');
    }

    public function withHxRefresh(): static
    {
        return $this->withHeader('HX-Refresh', 'true');
    }

    public function withoutHxRefresh(): static
    {
        return $this->withoutHeader('HX-Refresh');
    }

    // HX-Retarget
    public function hasHxRetarget(): bool
    {
        return 'true' === $this->getHeaderLine('HX-Retarget');
    }

    public function getHxRetarget(): string
    {
        return $this->getHeaderLine('HX-Retarget');
    }

    public function withHxRetarget(string $selector): static
    {
        return $this->withHeader('HX-Retarget', $selector);
    }

    public function withoutHxRetarget(): static
    {
        return $this->withoutHeader('HX-Retarget');
    }

    // HX-Push
    public function hasHxPush(): bool
    {
        return 'true' === $this->getHeaderLine('HX-Push');
    }

    public function getHxPush(): string
    {
        return $this->getHeaderLine('HX-Push');
    }

    public function withHxPush(string|bool $url): static
    {
        return $this->withHeader('HX-Push', $url);
    }

    public function withoutHxPush(): static
    {
        return $this->withoutHeader('HX-Push');
    }

    // PSR-7 ResponseInterface
    public function getStatusCode()
    {
        return $this->response->getStatusCode();
    }

    public function getReasonPhrase()
    {
        return $this->response->getReasonPhrase();
    }

    public function withStatus($code, $reasonPhrase = '')
    {
        return new static($this->response->withStatus($code, $reasonPhrase));
    }

}
