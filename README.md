# Quorum Array Functions

[![Latest Stable Version](https://poser.pugx.org/quorum/array-functions/version)](https://packagist.org/packages/quorum/array-functions)
[![License](https://poser.pugx.org/quorum/array-functions/license)](https://packagist.org/packages/quorum/array-functions)
[![ci.yml](https://github.com/QuorumCollection/ArrayFunctions/actions/workflows/ci.yml/badge.svg)](https://github.com/QuorumCollection/ArrayFunctions/actions/workflows/ci.yml)


A collection of global `array_*` functions appending to the native PHP set.

## Requirements

- **php**: >=7.4.0

## Installing

Install the latest version with:

```bash
composer require 'quorum/array-functions'
```

## Array Functions

### Function: \array_flatten

```php
function array_flatten(array $array, $allow_duplicates = false)
```

##### Parameters

- ***array<array-key,mixed>*** `$array` - The Array to be Flattened
- ***bool*** `$allow_duplicates` - Should the array allow duplicates

##### Return Value

- ***array<array-key,mixed>*** - The resulting array or NULL on failure

Given an array, find all the values recursively.

### Function: \array_blend

```php
function array_blend(array $arrays, ?array $keys = null)
```

##### Parameters

- ***array<array-key,mixed>*** `$arrays` - An array of arrays.
- ***array<array-key,array-key>*** | ***null*** `$keys` - The merged array.

##### Return Value

- ***array<array-key,mixed>*** - The resulting blended array

Given an array of arrays, merges the array's children together.

### Function: \array_key_array

```php
function array_key_array(array $arrays, $key)
```

##### Parameters

- ***array<array-key,array<array-key,mixed>>*** `$arrays` - An array of similarly keyed arrays
- ***array-key*** `$key` - The desired key

##### Return Value

- ***array<array-key,mixed>*** - The flattened array

Given an array of similarly keyed arrays, returns an array of only the values of the key.

### Function: \array_keys_array

```php
function array_keys_array(array $arrays, $keys)
```

##### Parameters

- ***array<array-key,array<array-key,mixed>>*** `$arrays` - An array of similarly keyed arrays
- ***array-key*** | ***array<array-key,array-key>*** `$keys` - The key or array of keys to return

##### Return Value

- ***array<array-key,array<array-key,mixed>>*** - The array of arrays with just the selected keys

Given an array of similarly keyed arrays, returns an array of only the selected keys.

### Function: \array_key_refill

```php
function array_key_refill(array $array, array $keys, $fill = array())
```

##### Parameters

- ***array<array-key,mixed>*** `$array` - A Keyed array
- ***array<array-key,array-key>*** `$keys` - The keys that must exist
- ***mixed*** `$fill` - The desired value to fill with

##### Return Value

- ***array<array-key,mixed>***

Given a keyed array, fills any missing values.