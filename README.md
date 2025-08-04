# Quorum Array Functions

[![Latest Stable Version](https://poser.pugx.org/quorum/array-functions/version)](https://packagist.org/packages/quorum/array-functions)
[![License](https://poser.pugx.org/quorum/array-functions/license)](https://packagist.org/packages/quorum/array-functions)
[![ci.yml](https://github.com/QuorumCollection/ArrayFunctions/actions/workflows/ci.yml/badge.svg)](https://github.com/QuorumCollection/ArrayFunctions/actions/workflows/ci.yml)


A collection of global `array_*` functions appending to the native PHP set.

## Requirements

- **php**: >=5.3.0

## Installing

Install the latest version with:

```bash
composer require 'quorum/array-functions'
```

## Array Functions

### Function: \array_flatten

```php
function array_flatten(array $array [, $allow_duplicates = false])
```

##### Parameters:

- ***array*** `$array` - The Array to be Flattened
- ***bool*** `$allow_duplicates` - Should the array allow duplicates

##### Returns:

- ***array*** - The resulting array or NULL on failure

Given an array, find all the values recursively.

### Function: \array_blend

```php
function array_blend(array $arrays [, array $keys = null])
```

##### Parameters:

- ***array*** `$arrays` - An array of arrays.
- ***array*** | ***null*** `$keys` - The merged array.

##### Returns:

- ***array*** - The resulting blended array

Given an array of arrays, merges the array's children together.

### Function: \array_key_array

```php
function array_key_array(array $arrays, $key)
```

##### Parameters:

- ***array*** `$arrays` - An array of similarly keyed arrays
- ***int*** | ***string*** `$key` - The desired key

##### Returns:

- ***array*** - The flattened array

Given an array of similarly keyed arrays, returns an array of only the values of the key.

### Function: \array_keys_array

```php
function array_keys_array(array $arrays, $keys)
```

##### Parameters:

- ***array*** `$arrays` - An array of similarly keyed arrays
- ***array*** | ***int*** | ***string*** `$keys` - The key or array of keys to return

##### Returns:

- ***array*** - The array of arrays with just the selected keys

Given an array of similarly keyed arrays, returns an array of only the selected keys.

### Function: \array_key_refill

```php
function array_key_refill(array $array, array $keys [, $fill = array()])
```

##### Parameters:

- ***array*** `$array` - A Keyed array
- ***array*** `$keys` - The keys that must exist
- ***mixed*** `$fill` - The desired value to fill with

##### Returns:

- ***array***

Given a keyed array, fills any missing values.