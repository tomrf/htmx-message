<?php

declare(strict_types=1);

namespace Tomrf\HtmxMessage;

class HtmxResponse extends ResponseProxy
{
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

    /**
     * @return array<mixed>
     */
    public function getHxTrigger(): array
    {
        return (array) json_decode($this->getHeaderLine('HX-Trigger'), true);
    }

    public function withHxTrigger(string $trigger, mixed $argument = null): static
    {
        return $this->withHeader('HX-Trigger', (string) json_encode([$trigger => $argument]));
    }

    public function withAddedHxTrigger(string $trigger, mixed $argument = null): static
    {
        $value = (array) json_decode($this->getHeaderLine('HX-Trigger'), true);
        $value[$trigger] = $argument;

        return $this->withHeader('HX-Trigger', (string) json_encode($value));
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

    /**
     * @return array<mixed>
     */
    public function getHxTriggerAfterSettle(): array
    {
        return (array) json_decode($this->getHeaderLine('HX-Trigger-After-Settle'), true);
    }

    public function withHxTriggerAfterSettle(string $trigger, mixed $argument = null): static
    {
        return $this->withHeader('HX-Trigger-After-Settle', (string) json_encode([$trigger => $argument]));
    }

    public function withAddedHxTriggerAfterSettle(string $trigger, mixed $argument = null): static
    {
        $value = (array) json_decode($this->getHeaderLine('HX-Trigger-After-Settle'), true);
        $value[$trigger] = $argument;

        return $this->withHeader('HX-Trigger-After-Settle', (string) json_encode($value));
    }

    public function withoutHxTriggerAfterSettle(): static
    {
        return $this->withoutHeader('HX-Trigger-After-Settle');
    }

    public function hasHxTriggerAfterSwap(): bool
    {
        return $this->hasHeader('HX-Trigger-After-Swap');
    }

    /**
     * @return array<mixed>
     */
    public function getHxTriggerAfterSwap(): array
    {
        return (array) json_decode($this->getHeaderLine('HX-Trigger-After-Swap'), true);
    }

    public function withHxTriggerAfterSwap(string $trigger, mixed $argument = null): static
    {
        return $this->withHeader('HX-Trigger-After-Settle', (string) json_encode([$trigger => $argument]));
    }

    public function withAddedHxTriggerAfterSwap(string $trigger, mixed $argument = null): static
    {
        $value = (array) json_decode($this->getHeaderLine('HX-Trigger-After-Settle'), true);
        $value[$trigger] = $argument;

        return $this->withHeader('HX-Trigger-After-Settle', (string) json_encode($value));
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
        return $this->withHeader('HX-Push', (string) $url);
    }

    public function withoutHxPush(): static
    {
        return $this->withoutHeader('HX-Push');
    }
}
