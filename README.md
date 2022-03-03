# Console Log

WordPress plugin to allow PHP to write to the browser's console.

## Function Description
```
function console_log( $vars )
@param array $vars - [ 'label' => value ]
```

For each element in the `$vars` array, log the key (label) followed by the
value to the browser's console.

Scalar values are emitted in the format ```key (value type): value```,
i.e. on the same line.

Objects and arrays are emitted in the format

```
key (value type):
json-ified value
```
i.e. on separate lines, to allow easier viewing of the object in the console.
Note that the console always renders the json-ified element as an object.
You can find the actual type of the element in PHP (array or object) after
the label.

## Usage

```PHP
if ( function_exists( '\Stanford\ConsoleLog\console_log()' ) ) {
  \Stanford\ConsoleLog\console_log( [
    '$var1' => $var1,
    '$var2' => $var2,
    'custom label' => $var3
  ] );
}
```