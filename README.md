# htmx-message - PHP PSR-7 proxy classes with convenience methods for htmx (htmx.org) requests and responses

[![PHP Version Require](http://poser.pugx.org/tomrf/htmx-message/require/php?style=flat-square)](https://packagist.org/packages/tomrf/htmx-message) [![Latest Stable Version](http://poser.pugx.org/tomrf/htmx-message/v?style=flat-square)](https://packagist.org/packages/tomrf/htmx-message) [![License](http://poser.pugx.org/tomrf/htmx-message/license?style=flat-square)](https://packagist.org/packages/tomrf/htmx-message)

PSR-7 `ServerRequestInterface` and `ResponseInterface` proxy classes for `htmx`
with convenience methods for all special htmx headers (`HX-*`) in request and
response objects.

See [the 📔 documentation](#documentation) for quick overview of relevant methods.

📔 [Go to documentation](#documentation)

## Installation
Installation via composer:

```bash
composer require tomrf/htmx-message
```

## Usage example
```php
$request = new HtmxRequest($request);      // object implementing PSR-7 `ServerRequestInterface`

if ($request->isHxRequest() && $request->isHxBoosted()) {
    $layout = 'ajax.layout';
}

[...]

$response = new HtmxResponse($response);   // object implementing PSR-7 `ResponseInterface`

$response = $response->withHxTrigger('aSimpleTrigger')
    ->withAddedHxTrigger('triggerWithParams', ['arg' => true, 'arg2' => 7])
    ->withTriggerAfterSwap('afterSwap', time())
    ->withHxPush($newUrl);

// Emit $response as normal
[...]
```

## Testing
```bash
composer test
```

## License
This project is released under the MIT License (MIT).
See [LICENSE](LICENSE) for more information.

## Documentation
 - [Tomrf\HtmxMessage\HtmxResponse](#-tomrfhtmxmessagehtmxresponseclass)
   - [getHxPush](#gethxpush)
   - [getHxRedirect](#gethxredirect)
   - [getHxRetarget](#gethxretarget)
   - [getHxTrigger](#gethxtrigger)
   - [getHxTriggerAfterSettle](#gethxtriggeraftersettle)
   - [getHxTriggerAfterSwap](#gethxtriggerafterswap)
   - [hasHxPush](#hashxpush)
   - [hasHxRedirect](#hashxredirect)
   - [hasHxRefresh](#hashxrefresh)
   - [hasHxRetarget](#hashxretarget)
   - [hasHxTrigger](#hashxtrigger)
   - [hasHxTriggerAfterSettle](#hashxtriggeraftersettle)
   - [hasHxTriggerAfterSwap](#hashxtriggerafterswap)
   - [withAddedHxTrigger](#withaddedhxtrigger)
   - [withAddedHxTriggerAfterSettle](#withaddedhxtriggeraftersettle)
   - [withAddedHxTriggerAfterSwap](#withaddedhxtriggerafterswap)
   - [withHxPush](#withhxpush)
   - [withHxRedirect](#withhxredirect)
   - [withHxRefresh](#withhxrefresh)
   - [withHxRetarget](#withhxretarget)
   - [withHxTrigger](#withhxtrigger)
   - [withHxTriggerAfterSettle](#withhxtriggeraftersettle)
   - [withHxTriggerAfterSwap](#withhxtriggerafterswap)
   - [withoutHxPush](#withouthxpush)
   - [withoutHxRedirect](#withouthxredirect)
   - [withoutHxRefresh](#withouthxrefresh)
   - [withoutHxRetarget](#withouthxretarget)
   - [withoutHxTrigger](#withouthxtrigger)
   - [withoutHxTriggerAfterSettle](#withouthxtriggeraftersettle)
   - [withoutHxTriggerAfterSwap](#withouthxtriggerafterswap)
 - [Tomrf\HtmxMessage\HtmxServerRequest](#-tomrfhtmxmessagehtmxserverrequestclass)
   - [getHxCurrentUrl](#gethxcurrenturl)
   - [getHxPrompt](#gethxprompt)
   - [getHxTarget](#gethxtarget)
   - [getHxTrigger](#gethxtrigger)
   - [getHxTriggerName](#gethxtriggername)
   - [hasHxPrompt](#hashxprompt)
   - [hasHxTarget](#hashxtarget)
   - [hasHxTrigger](#hashxtrigger)
   - [hasHxTriggerName](#hashxtriggername)
   - [isHxBoosted](#ishxboosted)
   - [isHxHistoryRestoreRequest](#ishxhistoryrestorerequest)
   - [isHxRequest](#ishxrequest)

### 📂 Tomrf\HtmxMessage\HtmxResponse::class

#### getHxPush()

```php
public function getHxPush(): string
```

#### getHxRedirect()

```php
public function getHxRedirect(): string
```

#### getHxRetarget()

```php
public function getHxRetarget(): string
```

#### getHxTrigger()

```php
public function getHxTrigger(): array

@return   array
```

#### getHxTriggerAfterSettle()

```php
public function getHxTriggerAfterSettle(): array

@return   array
```

#### getHxTriggerAfterSwap()

```php
public function getHxTriggerAfterSwap(): array

@return   array
```

#### hasHxPush()

```php
public function hasHxPush(): bool
```

#### hasHxRedirect()

```php
public function hasHxRedirect(): bool
```

#### hasHxRefresh()

```php
public function hasHxRefresh(): bool
```

#### hasHxRetarget()

```php
public function hasHxRetarget(): bool
```

#### hasHxTrigger()

```php
public function hasHxTrigger(): bool
```

#### hasHxTriggerAfterSettle()

```php
public function hasHxTriggerAfterSettle(): bool
```

#### hasHxTriggerAfterSwap()

```php
public function hasHxTriggerAfterSwap(): bool
```

#### withAddedHxTrigger()

```php
public function withAddedHxTrigger(
    string $trigger,
    mixed $argument = null
): static
```

#### withAddedHxTriggerAfterSettle()

```php
public function withAddedHxTriggerAfterSettle(
    string $trigger,
    mixed $argument = null
): static
```

#### withAddedHxTriggerAfterSwap()

```php
public function withAddedHxTriggerAfterSwap(
    string $trigger,
    mixed $argument = null
): static
```

#### withHxPush()

```php
public function withHxPush(
    string|bool $url
): static
```

#### withHxRedirect()

```php
public function withHxRedirect(
    string $url
): static
```

#### withHxRefresh()

```php
public function withHxRefresh(): static
```

#### withHxRetarget()

```php
public function withHxRetarget(
    string $selector
): static
```

#### withHxTrigger()

```php
public function withHxTrigger(
    string $trigger,
    mixed $argument = null
): static
```

#### withHxTriggerAfterSettle()

```php
public function withHxTriggerAfterSettle(
    string $trigger,
    mixed $argument = null
): static
```

#### withHxTriggerAfterSwap()

```php
public function withHxTriggerAfterSwap(
    string $trigger,
    mixed $argument = null
): static
```

#### withoutHxPush()

```php
public function withoutHxPush(): static
```

#### withoutHxRedirect()

```php
public function withoutHxRedirect(): static
```

#### withoutHxRefresh()

```php
public function withoutHxRefresh(): static
```

#### withoutHxRetarget()

```php
public function withoutHxRetarget(): static
```

#### withoutHxTrigger()

```php
public function withoutHxTrigger(): static
```

#### withoutHxTriggerAfterSettle()

```php
public function withoutHxTriggerAfterSettle(): static
```

#### withoutHxTriggerAfterSwap()

```php
public function withoutHxTriggerAfterSwap(): static
```

### 📂 Tomrf\HtmxMessage\HtmxServerRequest::class

#### getHxCurrentUrl()

```php
public function getHxCurrentUrl(): string
```

#### getHxPrompt()

```php
public function getHxPrompt(): string
```

#### getHxTarget()

```php
public function getHxTarget(): string
```

#### getHxTrigger()

```php
public function getHxTrigger(): string
```

#### getHxTriggerName()

```php
public function getHxTriggerName(): string
```

#### hasHxPrompt()

```php
public function hasHxPrompt(): bool
```

#### hasHxTarget()

```php
public function hasHxTarget(): bool
```

#### hasHxTrigger()

```php
public function hasHxTrigger(): bool
```

#### hasHxTriggerName()

```php
public function hasHxTriggerName(): bool
```

#### isHxBoosted()

```php
public function isHxBoosted(): bool
```

#### isHxHistoryRestoreRequest()

```php
public function isHxHistoryRestoreRequest(): bool
```

#### isHxRequest()

```php
public function isHxRequest(): bool
```



***

_Generated 2022-07-10T19:59:50+02:00 using 📚[tomrf/readme-gen](https://packagist.org/packages/tomrf/readme-gen)_
