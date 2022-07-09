# htmx-message - tomrf/htmx-message

[![PHP Version Require](http://poser.pugx.org/tomrf/htmx-message/require/php?style=flat-square)](https://packagist.org/packages/tomrf/htmx-message) [![Latest Stable Version](http://poser.pugx.org/tomrf/htmx-message/v?style=flat-square)](https://packagist.org/packages/tomrf/htmx-message) [![License](http://poser.pugx.org/tomrf/htmx-message/license?style=flat-square)](https://packagist.org/packages/tomrf/htmx-message)

:package_extra_intro

📔 [Go to documentation](#documentation)

## Installation
Installation via composer:

```bash
composer require tomrf/htmx-message
```

## Usage
```php
:package_extra_example
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
   - [hasHxRedirect](#hashxredirect)
   - [getHxRedirect](#gethxredirect)
   - [withHxRedirect](#withhxredirect)
   - [withoutHxRedirect](#withouthxredirect)
   - [hasHxTrigger](#hashxtrigger)
   - [getHxTrigger](#gethxtrigger)
   - [withHxTrigger](#withhxtrigger)
   - [withAddedHxTrigger](#withaddedhxtrigger)
   - [withoutHxTrigger](#withouthxtrigger)
   - [hasHxTriggerAfterSettle](#hashxtriggeraftersettle)
   - [getHxTriggerAfterSettle](#gethxtriggeraftersettle)
   - [withHxTriggerAfterSettle](#withhxtriggeraftersettle)
   - [withAddedHxTriggerAfterSettle](#withaddedhxtriggeraftersettle)
   - [withoutHxTriggerAfterSettle](#withouthxtriggeraftersettle)
   - [hasHxTriggerAfterSwap](#hashxtriggerafterswap)
   - [getHxTriggerAfterSwap](#gethxtriggerafterswap)
   - [withHxTriggerAfterSwap](#withhxtriggerafterswap)
   - [withAddedHxTriggerAfterSwap](#withaddedhxtriggerafterswap)
   - [withoutHxTriggerAfterSwap](#withouthxtriggerafterswap)
   - [hasHxRefresh](#hashxrefresh)
   - [withHxRefresh](#withhxrefresh)
   - [withoutHxRefresh](#withouthxrefresh)
   - [hasHxRetarget](#hashxretarget)
   - [getHxRetarget](#gethxretarget)
   - [withHxRetarget](#withhxretarget)
   - [withoutHxRetarget](#withouthxretarget)
   - [hasHxPush](#hashxpush)
   - [getHxPush](#gethxpush)
   - [withHxPush](#withhxpush)
   - [withoutHxPush](#withouthxpush)
 - [Tomrf\HtmxMessage\HtmxServerRequest](#-tomrfhtmxmessagehtmxserverrequestclass)
   - [isHxRequest](#ishxrequest)
   - [isHxBoosted](#ishxboosted)
   - [isHxHistoryRestoreRequest](#ishxhistoryrestorerequest)
   - [hasHxTrigger](#hashxtrigger)
   - [hasHxTriggerName](#hashxtriggername)
   - [hasHxTarget](#hashxtarget)
   - [hasHxPrompt](#hashxprompt)
   - [getHxCurrentUrl](#gethxcurrenturl)
   - [getHxTrigger](#gethxtrigger)
   - [getHxTriggerName](#gethxtriggername)
   - [getHxTarget](#gethxtarget)
   - [getHxPrompt](#gethxprompt)
   - [getBody](#getbody)
   - [getRequestTarget](#getrequesttarget)

### 📂 Tomrf\HtmxMessage\HtmxResponse::class

#### hasHxRedirect()

```php
public function hasHxRedirect(

): bool
```

#### getHxRedirect()

```php
public function getHxRedirect(

): string
```

#### withHxRedirect()

```php
public function withHxRedirect(
    string $url
): static
```

#### withoutHxRedirect()

```php
public function withoutHxRedirect(

): static
```

#### hasHxTrigger()

```php
public function hasHxTrigger(

): bool
```

#### getHxTrigger()

```php
public function getHxTrigger(

): array
```

#### withHxTrigger()

```php
public function withHxTrigger(
    string $trigger,
    mixed $argument = 
): static
```

#### withAddedHxTrigger()

```php
public function withAddedHxTrigger(
    string $trigger,
    mixed $argument = 
): static
```

#### withoutHxTrigger()

```php
public function withoutHxTrigger(

): static
```

#### hasHxTriggerAfterSettle()

```php
public function hasHxTriggerAfterSettle(

): bool
```

#### getHxTriggerAfterSettle()

```php
public function getHxTriggerAfterSettle(

): array
```

#### withHxTriggerAfterSettle()

```php
public function withHxTriggerAfterSettle(
    string $trigger,
    mixed $argument = 
): static
```

#### withAddedHxTriggerAfterSettle()

```php
public function withAddedHxTriggerAfterSettle(
    string $trigger,
    mixed $argument = 
): static
```

#### withoutHxTriggerAfterSettle()

```php
public function withoutHxTriggerAfterSettle(

): static
```

#### hasHxTriggerAfterSwap()

```php
public function hasHxTriggerAfterSwap(

): bool
```

#### getHxTriggerAfterSwap()

```php
public function getHxTriggerAfterSwap(

): array
```

#### withHxTriggerAfterSwap()

```php
public function withHxTriggerAfterSwap(
    string $trigger,
    mixed $argument = 
): static
```

#### withAddedHxTriggerAfterSwap()

```php
public function withAddedHxTriggerAfterSwap(
    string $trigger,
    mixed $argument = 
): static
```

#### withoutHxTriggerAfterSwap()

```php
public function withoutHxTriggerAfterSwap(

): static
```

#### hasHxRefresh()

```php
public function hasHxRefresh(

): bool
```

#### withHxRefresh()

```php
public function withHxRefresh(

): static
```

#### withoutHxRefresh()

```php
public function withoutHxRefresh(

): static
```

#### hasHxRetarget()

```php
public function hasHxRetarget(

): bool
```

#### getHxRetarget()

```php
public function getHxRetarget(

): string
```

#### withHxRetarget()

```php
public function withHxRetarget(
    string $selector
): static
```

#### withoutHxRetarget()

```php
public function withoutHxRetarget(

): static
```

#### hasHxPush()

```php
public function hasHxPush(

): bool
```

#### getHxPush()

```php
public function getHxPush(

): string
```

#### withHxPush()

```php
public function withHxPush(
    string|bool $url
): static
```

#### withoutHxPush()

```php
public function withoutHxPush(

): static
```

### 📂 Tomrf\HtmxMessage\HtmxServerRequest::class

#### isHxRequest()

```php
public function isHxRequest(

): bool
```

#### isHxBoosted()

```php
public function isHxBoosted(

): bool
```

#### isHxHistoryRestoreRequest()

```php
public function isHxHistoryRestoreRequest(

): bool
```

#### hasHxTrigger()

```php
public function hasHxTrigger(

): bool
```

#### hasHxTriggerName()

```php
public function hasHxTriggerName(

): bool
```

#### hasHxTarget()

```php
public function hasHxTarget(

): bool
```

#### hasHxPrompt()

```php
public function hasHxPrompt(

): bool
```

#### getHxCurrentUrl()

```php
public function getHxCurrentUrl(

): string
```

#### getHxTrigger()

```php
public function getHxTrigger(

): string
```

#### getHxTriggerName()

```php
public function getHxTriggerName(

): string
```

#### getHxTarget()

```php
public function getHxTarget(

): string
```

#### getHxPrompt()

```php
public function getHxPrompt(

): string
```

#### getBody()

```php
public function getBody(

): void
```

#### getRequestTarget()

```php
public function getRequestTarget(

): void
```



***

_Generated 2022-07-09T18:54:04+02:00 using 📚[tomrf/readme-gen](https://packagist.org/packages/tomrf/readme-gen)_
