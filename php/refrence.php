<?php
$p = 0; $k= 0;
for($i = 0; $i< 50 ; $i++){
    $k = $i;
}
$p =& $k;
echo $p;

echo "<hr>";

$myVar = "Hi there";
$anotherVar =& $myVar;
$anotherVar = "See you later";
echo $myVar; // Displays "Hi there"
echo "<br>";
echo $anotherVar; // Displays "See you later"


echo "<hr>";
///////////////////////////////////////////

function myFunc( &$myParam ) {
  $myParam++;
}
$myParam = 1;
myFunc($myParam);
myFunc($myParam);
echo $myParam;

echo "<hr>";
///////////////////////////////////////////

$numWidgets = 10;
 
function &getNumWidgets() {
  global $numWidgets;
  return $numWidgets;
}
 
$numWidgetsRef =& getNumWidgets();
$numWidgetsRef--;
echo "\$numWidgets = $numWidgets<br>";  // Displays "9"
echo "\$numWidgetsRef = $numWidgetsRef<br>";  // Displays "9"

///////////////////////////////////////////
echo "<hr>";

$bands = array( "The Who", "The Beatles", "The Rolling Stones" );
 
foreach ( $bands as &$band ) {
  $band = strtoupper( $band );
}
 
echo "<pre>";
print_r( $bands );
echo "</pre>";

echo "<hr>";
///////////////////////////////////////////
class Foo {

    protected $bar;

    public function __construct() {
        $this->bar = new Bar();

        print "Foo\n";
    }   
   
    public function getBar() {
        return $this->bar;
    }
}

class Bar {

    public function __construct() {
        print "Bar\n";
    }
   
    public function helloWorld() {
        print "Hello World\n";
    }
}

function test() {
    return new Foo();
}

test()->getBar()->helloWorld();


/*
 * I haven't seen anyone note method chaining in PHP5.  When an object is returned by a method in PHP5 it is returned by default as a reference, and the new Zend Engine 2 allows you to chain method calls from those returned objects.  For example consider this code:
 * Notice how we called test() which was not on an object, but returned an instance of Foo, followed by a method on Foo, getBar() which returned an instance of Bar and finally called one of its methods helloWorld().  Those familiar with other interpretive languages (Java to name one) will recognize this functionality.  For whatever reason this change doesn't seem to be documented very well, so hopefully someone will find this helpful.
 */
?>
