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

$firstPerson = new Person();
$firstPerson->name = 'Дима';
$firstPerson->name;
$firstPerson->age = 24;
$firstPerson->age;
$firstPerson->level = 'junior';
$firstPerson->level;

$personAsString = serialize($firstPerson->arr);
echo $personAsString . PHP_EOL;
$personAsString = str_replace(['Дима', '24'], ['Миша', '25'], $personAsString);
echo $personAsString . PHP_EOL;
$newPerson = unserialize($personAsString, ["allowed_classes" => true]);
var_dump($newPerson);
foreach ($newPerson as $prop => $value) {
  echo $prop . ': ' . $value . PHP_EOL;
}

$secondPerson = new Person();
$secondPerson->name = 'Саня';
$secondPerson->age = 26;
$secondPerson->level = 'middle';

$thirdPerson = new Person();
$thirdPerson->name = 'Андрей';
$thirdPerson->age = 28;
$thirdPerson->level = 'senior';

$personList = new PersonList($firstPerson, $secondPerson, $thirdPerson);
$personList->firstPerson = $firstPerson;
$personList->secondPerson = $secondPerson;
$personList->thirdPerson = $thirdPerson;
$personList->iterate();