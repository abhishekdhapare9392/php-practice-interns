<?php 

// OOP's Concepts

// Class
// Object
// Inheritance
// Polymorphism
// Abstraction
// Encapsulation


// Class
// class User{
//     public $name;
//     public function __construct($name){
//         $this->name = $name;
//     }

//     public function getName(){
//         return $this->name;
//     }

//     public function setName($name){
//         $this->name = $name;
//     }

// }

// Object
// $user = new User();
// echo $user->getName();
// echo "<br>";
// $user->setName("Smith Johns");
// // echo $user->getName();
// $user = new User("John Doe");
// echo $user->getName();
// echo $user->setName("Smith Johns");
// echo $user->getName();
// $user1 = new User("Bishop Doe");
// echo $user->getName();
// echo $user1->getName();

// class Operations
// {
//     public $a;
//     public $b;
//     public function __construct($a, $b)
//     {
//         $this->a = $a;
//         $this->b = $b;
//     }

//     public function add()
//     {
//         return $this->a + $this->b;
//     }

//     public function sub()
//     {
//         return $this->a - $this->b;
//     }

//     public function mul()
//     {
//         return $this->a * $this->b;
//     }

//     public function div()
//     {
//         return $this->a / $this->b;
//     }
// }

// $op = new Operations(10, 5);
// echo "\nAddition: " . $op->add();
// echo "\nSubstraction: " . $op->sub();
// echo "\nMultiplication: " . $op->mul();
// echo "\nDivision: " . $op->div();
// echo "\n";

class Operations
{
    public $a;
    public $b;
    public $c;
    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    public function add($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $a + $b;
        return $this->c;
    }

    public function sub($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $a - $b;
        return $this->c;
    }

    public function mul($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $this->a * $this->b;
        return $this->c;
    }

    public function div($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
        $this->c = $this->a / $this->b;
        return $this->c;
    }
}

$op = new Operations(10, 5);
echo "\nAddition: " . $op->add(5, 15);
echo "\nSubstraction: " . $op->sub(20, 5);
echo "\nMultiplication: " . $op->mul(4, 5);
echo "\nDivision: " . $op->div(15, 5);
echo "\n";

class Others extends Operations
{
    public $a;
    public $b;
    public $c;
    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    public function show()
    {
        echo "\nAddition: " . $this->add(5, 15);
        echo "\nSubstraction: " . $this->sub(20, 5);
        echo "\nMultiplication: " . $this->mul(4, 5);
        echo "\nDivision: " . $this->div(15, 5);
    }
}

$op = new Others(10, 5);
$op->show();