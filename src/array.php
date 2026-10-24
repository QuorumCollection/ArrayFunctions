<?php

if( !function_exists('array_flatten') ) {
	/**
	 * Given an array, find all the values recursively.
	 *
	 * @param  array<array-key, mixed> $array The Array to be Flattened
	 * @param  bool                     $allow_duplicates Should the array allow duplicates
	 * @return array<array-key, mixed> The resulting array or NULL on failure
	 */
	function array_flatten( array $array, $allow_duplicates = false ) {
		$it    = new RecursiveIteratorIterator(new RecursiveArrayIterator($array));
		$final = array();
		foreach( $it as $v ) {
			if( $allow_duplicates ) {
				$final[] = $v;
			} elseif( is_int($v) || is_string($v) ) {
				$final[$v] = $v;
			} else {
				$final[] = $v;
			}
		}

		return $final;
	}
}

if( !function_exists('array_blend') ) {
	/**
	 * Given an array of arrays, merges the array's children together.
	 *
	 * @param array<array-key, mixed>            $arrays An array of arrays.
	 * @param array<array-key, array-key>|null   $keys The merged array.
	 * @return array<array-key, mixed> The resulting blended array
	 */
	function array_blend( array $arrays, ?array $keys = null ) {
		$out = array();

		foreach( $arrays as $key => $array ) {
			if( is_array($array) && (is_null($keys) || (in_array($key, $keys))) ) {
				foreach( $array as $value ) {
					$out[] = $value;
				}
			}
		}

		return $out;
	}
}

if( !function_exists('array_key_array') ) {
	/**
	 * Given an array of similarly keyed arrays, returns an array of only the values of the key.
	 *
	 * @param array<array-key, array<array-key, mixed>> $arrays An array of similarly keyed arrays
	 * @param array-key                                  $key The desired key
	 * @return array<array-key, mixed> The flattened array
	 */
	function array_key_array( array $arrays, $key ) {
		$out = array();
		foreach( $arrays as $i => $array ) {
			$out[$i] = $array[$key];
		}

		return $out;
	}
}

if( !function_exists('array_keys_array') ) {
	/**
	 * Given an array of similarly keyed arrays, returns an array of only the selected keys.
	 *
	 * @param array<array-key, array<array-key, mixed>> $arrays An array of similarly keyed arrays
	 * @param array-key|array<array-key, array-key>     $keys The key or array of keys to return
	 * @return array<array-key, array<array-key, mixed>> The array of arrays with just the selected keys
	 */
	function array_keys_array( array $arrays, $keys ) {
		$keys = (array)$keys;

		$out = array();
		foreach( $arrays as $i => $array ) {
			foreach( $keys as $index ) {
				$out[$i][$index] = $array[$index];
			}
		}

		return $out;
	}
}

if( !function_exists('array_key_refill') ) {
	/**
	 * Given a keyed array, fills any missing values.
	 *
	 * @param  array<array-key, mixed> $array A Keyed array
	 * @param  array<array-key, array-key> $keys The keys that must exist
	 * @param  mixed $fill The desired value to fill with
	 * @return array<array-key, mixed>
	 */
	function array_key_refill( array $array, array $keys, $fill = array() ) {
		foreach( $keys as $key ) {
			if( !isset($array[$key]) ) {
				$array[$key] = $fill;
			}
		}

		return $array;
	}
}
