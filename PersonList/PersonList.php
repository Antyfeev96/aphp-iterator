<?php
declare(strict_types=1);
namespace PersonList;
class PersonList
{

  public function iterate() {
    echo "PersonList::iterate:\n";
    foreach ($this as $key => $value) {
      print "$key => $value\n";
    }
  }

}