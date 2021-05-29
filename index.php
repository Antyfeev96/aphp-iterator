<?php
declare(strict_types=1);

use Person\Person;
use PersonList\PersonList;

function autoload(string $className): void
{
  $filename = __DIR__ . '/' . str_replace('\\', '/', $className) . '.php';
  if (is_file($filename)) {
    require_once($filename);
  }
}

spl_autoload_register('autoload');

$person = new Person();
$person->__set('name', 'Дима');
$person->__get('name');
$person->__set('age', '24');
$person->__get('age');
$person->__set('level', 'junior');
$person->__get('level');

$personAsString = serialize($person->arr);
echo $personAsString . PHP_EOL;
$personAsString = str_replace(['Дима', '24'], ['Миша', '25'], $personAsString);
echo $personAsString . PHP_EOL;
$newPerson = unserialize($personAsString, ["allowed_classes" => true]);
var_dump($newPerson);
foreach ($newPerson as $prop => $value) {
  echo $prop . ': ' . $value . PHP_EOL;
}

$person2 = new Person();
$person2->__set('name', 'Саня');
$person2->__set('age', '26');
$person2->__set('level', 'middle');

$person3 = new Person();
$person3->__set('name', 'Андрей');
$person3->__set('age', '28');
$person3->__set('level', 'senior');

$personList = new PersonList($person, $person2, $person3);
//$personList->showPersonList();
$personList->person = $person;
$personList->person2 = $person2;
$personList->person3 = $person3;
$personList->iterate();