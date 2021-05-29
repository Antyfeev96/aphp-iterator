<?php
declare(strict_types=1);
namespace PersonList;
function autoload(string $className): void
{
  $filename = __DIR__ . '/' . str_replace('\\', '/', $className) . '.php';
  if (is_file($filename)) {
    require_once($filename);
  }
}

spl_autoload_register('autoload');
class PersonList
{

  public function iterate() {
    echo "PersonList::iterate:\n";
    foreach ($this as $key => $value) {
      print "$key => $value\n";
    }
  }

}