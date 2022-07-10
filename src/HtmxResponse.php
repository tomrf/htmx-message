<?php

declare(strict_types=1);

namespace Tomrf\HtmxMessage;

use Tomrf\HtmxMessage\Proxy\ResponseInterfaceProxy;

/**
 * HtmxResponse is a proxy for PSR-7 response objects implementing
 * \Psr\Http\Message\ResponseInterface.
 *
 * You can safely wrap any ResponseInterface object, also those not
 * responding to a htmx request, without affecting your application.
 *
 * HtmxResponse objects retains immutability in the same fashion as
 * one would expect from a PSR-7 MessageInterface, returning a new object
 * wrapping a new ResponseInterface instance whenever the HtmxResponse
 * is changed.
 *
 * Example:
 *
 *     $response = new HtmxResponse($response);
 *     $response = $response->withHxTrigger('myTrigger')
 *         ->withRedirect('/user/redirected')
 *         ->withHxPush(false);
 *
 *     // ...
 */
class HtmxResponse extends ResponseInterfaceProxy
{
    public function getHxPush(): string
    {
        return $this->getHeaderLine('HX-Push');
    }

    public function getHxRedirect(): string
    {
        return $this->getHeaderLine('HX-Redirect');
    }

    public function getHxRetarget(): string
    {
        return $this->getHeaderLine('HX-Retarget');
    }

    /**
     * @return array<mixed>
     */
    public function getHxTrigger(): array
    {
        return (array) json_decode($this->getHeaderLine('HX-Trigger'), true);
    }

    /**
     * @return array<mixed>
     */
    public function getHxTriggerAfterSettle(): array
    {
        return (array) json_decode($this->getHeaderLine('HX-Trigger-After-Settle'), true);
    }

    /**
     * @return array<mixed>
     */
    public function getHxTriggerAfterSwap(): array
    {
        return (array) json_decode($this->getHeaderLine('HX-Trigger-After-Swap'), true);
    }

    // HX-Push
    public function hasHxPush(): bool
    {
        return 'true' === $this->getHeaderLine('HX-Push');
    }

    // HX-Redirect
    public function hasHxRedirect(): bool
    {
        return $this->hasHeader('HX-Redirect');
    }

    // HX-Refresh

    public function hasHxRefresh(): bool
    {
        return 'true' === $this->getHeaderLine('HX-Refresh');
    }

    // HX-Retarget
    public function hasHxRetarget(): bool
    {
        return 'true' === $this->getHeaderLine('HX-Retarget');
    }

    // HX-Trigger
    public function hasHxTrigger(): bool
    {
        return $this->hasHeader('HX-Trigger');
    }

    // HX-Trigger-After-Settle
    public function hasHxTriggerAfterSettle(): bool
    {
        return $this->hasHeader('HX-Trigger-After-Settle');
    }

    public function hasHxTriggerAfterSwap(): bool
    {
        return $this->hasHeader('HX-Trigger-After-Swap');
    }

    public function withAddedHxTrigger(string $trigger, mixed $argument = null): static
    {
        $value = (array) json_decode($this->getHeaderLine('HX-Trigger'), true);
        $value[$trigger] = $argument;

        return $this->withHeader('HX-Trigger', (string) json_encode($value));
    }

    public function withAddedHxTriggerAfterSettle(string $trigger, mixed $argument = null): static
    {
        $value = (array) json_decode($this->getHeaderLine('HX-Trigger-After-Settle'), true);
        $value[$trigger] = $argument;

        return $this->withHeader('HX-Trigger-After-Settle', (string) json_encode($value));
    }

    public function withAddedHxTriggerAfterSwap(string $trigger, mixed $argument = null): static
    {
        $value = (array) json_decode($this->getHeaderLine('HX-Trigger-After-Settle'), true);
        $value[$trigger] = $argument;

        return $this->withHeader('HX-Trigger-After-Settle', (string) json_encode($value));
    }

    public function withHxPush(string|bool $url): static
    {
        return $this->withHeader('HX-Push', (string) $url);
    }

    public function withHxRedirect(string $url): static
    {
        return $this->withHeader('HX-Redirect', $url);
    }

    public function withHxRefresh(): static
    {
        return $this->withHeader('HX-Refresh', 'true');
    }

    public function withHxRetarget(string $selector): static
    {
        return $this->withHeader('HX-Retarget', $selector);
    }

    public function withHxTrigger(string $trigger, mixed $argument = null): static
    {
        return $this->withHeader('HX-Trigger', (string) json_encode([$trigger => $argument]));
    }

    public function withHxTriggerAfterSettle(string $trigger, mixed $argument = null): static
    {
        return $this->withHeader('HX-Trigger-After-Settle', (string) json_encode([$trigger => $argument]));
    }

    public function withHxTriggerAfterSwap(string $trigger, mixed $argument = null): static
    {
        return $this->withHeader('HX-Trigger-After-Settle', (string) json_encode([$trigger => $argument]));
    }

    public function withoutHxPush(): static
    {
        return $this->withoutHeader('HX-Push');
    }

    public function withoutHxRedirect(): static
    {
        return $this->withoutHeader('HX-Redirect');
    }

    public function withoutHxRefresh(): static
    {
        return $this->withoutHeader('HX-Refresh');
    }

    public function withoutHxRetarget(): static
    {
        return $this->withoutHeader('HX-Retarget');
    }

    public function withoutHxTrigger(): static
    {
        return $this->withoutHeader('HX-Trigger');
    }

    public function withoutHxTriggerAfterSettle(): static
    {
        return $this->withoutHeader('HX-Trigger-After-Settle');
    }

    public function withoutHxTriggerAfterSwap(): static
    {
        return $this->withoutHeader('HX-Trigger-After-Swap');
    }
}
