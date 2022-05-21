<?php
/*** Start: Assign by value ***/
$teehee = "height";
$source = $teehee;
echo $source."<br/>";
$source = "$source is the word.";
echo $source."<br/>";
echo $teehee."<br/>";
// Notes: 
// assign by value does not change original source variable if new one changes
/*** final: Assign by value ***/

/*** Start: Assign by reference ***/
$foo = 'Bob';              // Assign the value 'Bob' to $foo
echo $foo."<br/>";
$bar = &$foo;              // Reference $foo via $bar.
echo $bar."<br/>";
$bar = "My name is $bar";  // Alter $bar...
echo $bar."<br/>";
echo $foo."<br/>";                 // $foo is altered too.

$array = (array) $foo;  // type-casting
var_dump($array);   // returns array(1) { [0]=> string(14) "My name is Bob" }
// Notes: 
// assign by reference changes original source variable if new one changes
/*** Final: Assign by reference ***/

/*** Start: Predefined variables ***/
function passArguments ($argv): bool {
    var_dump($argc);
    echo "<br/>";
    var_dump($argv);
    echo "<br/>";
    return true;
}

$test_array = [1, 2, 3, 4];
passArguments($test_array); // displays array(4) { [0]=> int(1) [1]=> int(2) [2]=> int(3) [3]=> int(4) }
passArguments('a', 'b'); // displays string(1) "a" - wrong

// Notes:
// $argv and $argc are only used with command-line scripting
// $argv returns array of parameters inputted in script and $argv returns count
/*** Final: Predefined variables ***/

/*** Start: Global Variable scope ***/
$a = 1; /* global scope */ 
$b = 2;

function global_test()
{ 
    global $b;
    echo $a."<br/>"; /* reference to local scope variable */ 
    echo $b."<br/>";
} 

global_test(); // returns undefined variable for $a and exact value for $b

$a = 1;
$b = 2;

function Sum()
{
    global $a, $b;

    $b = $a + $b;
} 

Sum();
echo $b."<br/>";
/*** Final: Global Variable scope ***/

/*** Start: Static Variable scope ***/
function static_test()
{
    echo "static_test()<br/>";
    static $aa = 0;
    echo $aa."<br/>";
    $aa++;
    echo $aa."<br/>";
}
static_test();
static_test();
static_test();

function recursive_static()
{
    echo "recusive_static()<br/>";
    static $count = 0;

    $count++;
    echo $count."<br/>";
    if ($count < 10) {
        recursive_static();
    }
    $count--;
}

recursive_static();
/*** Final: Static Variable scope ***/

/*** Start: Variable Variables ***/
$a = 'hello';
$$a = 'world';

echo "$a ${$a}<br/>";
echo "$a $hello<br/>";

$c = "zero-hour";
$c = str_split($c);
$$c = "eleven";
$$c = str_split($$c);

print_r($c);
print_r($$c);

print_r(${$c[0]});  // refers to 'z' from 'zero-hour' but outputs ''; gives undefined variable warning
print_r(${$c}[0]);  // outputs 'e' from 'eleven'; gives array to string conversion warning

$d = 'nice';
$$d = 'apron';

echo ${$d[1]};  // refers to 'i' from 'nice' but outputs ''; gives array to string conversion warning
print_r(${$d}[0]);  // outputs 'a' from 'apron' without any warnings
echo "<br/>";
/*** Final: Variable Variables ***/

/*** Start: Variable Property ***/
class fooo {
    var $barr = 'I am bar.';
    var $arrr = array('I am A.', 'I am B.', 'I am C.');
    var $r   = 'I am r.';
}

$fooo = new fooo();
$barr = 'barr';
$baz = array('foo', 'barr', 'baz', 'quux');
echo $fooo->$barr ."<br/>";
echo $fooo->{$baz[1]} ."<br/>";

$start = 'b';
$end   = 'arr';
echo $fooo->{$start . $end} ."<br/>";

$arrr = 'arr';
echo $fooo->{$arrr[1]} ."<br/>";
/*** Final: Variable Property ***/

/*** Start: Form Variables ***/
if ($_POST) {
    echo '<pre>';
    echo htmlspecialchars(print_r($_POST, true));
    echo '</pre>';
}
?>
<form action="" method="post">
    Name:  <input type="text" name="personal[name]" /><br />
    Email: <input type="text" name="personal[email]" /><br />
    Beer: <br />
    <select multiple name="beer[]">
        <option value="warthog">Warthog</option>
        <option value="guinness">Guinness</option>
        <option value="stuttgarter">Stuttgarter Schwabenbräu</option>
    </select><br />
    <input type="submit" value="submit me!" />
</form>
<?php
/*** Final: Form Variables ***/

/*** Start: Cookies ***/
if (isset($_COOKIE['count'])) {
    $count = $_COOKIE['count'] + 1;
} else {
    $count = 1;
}
setcookie('count', $count, time()+3600);
setcookie("Cart[$count]", 'test', time()+3600);
/*** Final: Cookies ***/

/*** Start: Constants ***/
define('MIN_VALUE', '0.0');
define('__MAX_VALUE', '5.0');

echo __MAX_VALUE;
/*** Start: Constants ***/