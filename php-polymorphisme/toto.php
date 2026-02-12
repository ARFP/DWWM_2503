<?php

// 1. define required exceptions
// 2. implements `people` as a `person_list` in accordance to the interface and tests
// 3. implements `people_builder` in order to have it create and store objects of type
//   person.
// 4. why `people_builder::create` doesn't call new to instanciate a `person` object?

final class person
{
 private function __construct
  ( public string $firstname
  , public string $middlename
  , public string $lastname
  )
 {
 }
}

enum part_name
{
 case first;
 case middle;
 case last;
}

interface person_list
{
 /**
  * Search a person by exact name
  *
  * @throws not_found
  */
 function search_by_name(string $name, part_name $pn = part_name::last): person_list;

 /**
  * Search a person by looking for a element in its name
  *
  * @throws not_found
  */
 function search_in_name(string $name): person_list;

 /*
  * Add a person to the list
  *
  * @throws duplicate_person
  */
 function add(person $p): null;
}

final class people implements person_list
{
}

final class people_builder
{
 private object $lists;

 function __construct()
 {
  $this->lists = (object)
   [ 'accountants' => new people
   , 'employees' => new people
   , 'clients' => new people
   ];
 }

 public function __call(string $func_name, array $args)
 {
  throw new Exception('Not implemented');
 }

 private function create(array $ctor_args): Person
 {
  $cr = new ReflectionClass(Person::class);
  return $cr->newInstanceArgs($ctor_args);
 }
}

function main()
{
 test_people_add_elements();

 test_builder_create_employee();
 test_builder_search_by_name_and_do_not_find();
 test_builder_search_by_name_and_find();
}

function test_people_add_elements()
{
 $l = new people;
 $l->add(new person('georges', 'walker', 'bush'));
 $l->add(new person('georges', 'herbert', 'bush'));
}

function test_people_search_by_name()
{
 $l = new people;
 $l->add(new person('georges', 'walker', 'bush'));
 $l->add(new person('georges', 'herbert', 'bush'));

 $l->search_by_name('bush');
}

function test_builder_create_employee()
{
 $people_builder = new people_builder;
 $employee = $people_builder->create_employee('edgar', 'herbert', 'hoover');

 assert($employee instanceof person);
}

function test_builder_search_by_name_and_do_not_find()
{
 $people_builder = new people_builder;
 $people_builder->create_employee('edgar', 'herbert', 'hoover');

 try
 {
  $employee = $people_builder->search_employee_by_surname('edgar');
  assert(false);
 }
 catch(not_found $e)
 {
  assert(true);
 }
}

function test_builder_search_by_name_and_find()
{
 $people_builder = new people_builder;
 $people_builder->create_employee('edgar', 'herbert', 'hoover');

 try
 {
  $employee = $people_builder->search_employee_by_firstname('edgar');
  assert(true);
 }
 catch(not_found $e)
 {
  assert(false);
 }
}

main();