<?php

class Mother
{
 private $private = 1;
 protected $protected = 2;
 public $public = 3;

 public function display_from_mother()
 {
  echo implode
   ( "\t"
   , array_map(fn($v) => "($v:{$this->$v})", ['private', 'protected', 'public'])
   ), "\n";

 }
}

class Daughter
 extends Mother
{
 public function display_from_daughter()
 {
  echo implode
   ( "\t"
   , array_map(fn($v) => "($v:{$this->$v})", ['private', 'protected', 'public'])
   ), "\n";
 }
}

class GrandDaughter
 extends Daughter
{
 public function display_from_granddaughter()
 {
  echo implode
   ( "\t"
   , array_map(fn($v) => "($v:{$this->$v})", ['private', 'protected', 'public'])
   ), "\n";
 }
}

function mother()
{
 $mother = new Mother;
 $mother->display_from_mother();
 echo implode
  ( "\t"
  , array_map(fn($v) => "($v:{$mother->$v})", ['private', 'protected', 'public'])
  ), "\n";
}

function daughter()
{
 $daughter = new Daughter;

 echo "Using Mother::display_from_mother\n";
 $daughter->display_from_mother();

 echo "Using Daughter::display_from_daughter\n";
 $daughter->display_from_daughter();

 echo "Display from outside the class\n";
 echo implode
  ( "\t"
  , array_map(fn($v) => "($v:{$daughter->$v})", ['private', 'protected', 'public'])
  ), "\n";
}

function granddaughter()
{
 $granddaughter = new GrandDaughter;

 echo "Using Mother::display_from_mother\n";
 $granddaughter->display_from_mother();

 echo "Using Daughter::display_from_daughter\n";
 $granddaughter->display_from_daughter();

 echo "Using GrandDaughter::display_from_granddaughter\n";
 $granddaughter->display_from_granddaughter();

 echo "Display from outside the class\n";
 echo implode
  ( "\t"
  , array_map(fn($v) => "($v:{$granddaughter->$v})", ['private', 'protected', 'public'])
  ), "\n";
}

function usage($script)
{
 printf("php %s [ mother | daughter | granddaughter ]\n", $script);
}

function main(array $args)
{
 if(count($args) < 2)
 {
  usage($args[0]);
  exit(42);
 }

 switch($args[1])
 {
  default:
   usage($args[0]);
   exit(67);
  case 'mother':
  case 'daughter':
  case 'granddaughter':
   $args[1]();
 }
}

main($argv);