# Quorum Array Functions

[![Build Status](https://travis-ci.org/QuorumCollection/ArrayFunctions.svg?branch=master)](https://travis-ci.org/QuorumCollection/ArrayFunctions)

A collection of global `array_*` functions appending to the native PHP set.

- `array_flatten( array $array, $allow_duplicates = false )` 
	- Given an array, find all the values recursively.
- `array_blend( array $arrays, array $keys = null )` 
	- Given an array of arrays, merges the array's children together.
- `array_key_array( array $arrays, $key )` 
	- Given an array of similarly keyed arrays, returns an array of only the values of the key.
- `array_keys_array( array $arrays, $keys )` 
	- Given an array of similarly keyed arrays, returns an array of only the selected keys.
- `array_key_refill( array $array, $keys, $fill = array() )` 
	- Given a keyed array, fills any missing values.
