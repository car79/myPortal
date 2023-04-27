<?php

namespace Drupal\lavoro;

use Drupal\Core\Field\FieldItemList;
use Drupal\Core\TypedData\ComputedItemListTrait;

class OreLavItemList extends FieldItemList
{
    use ComputedItemListTrait;

    protected function computeValue()
    {
        $this->ensurePopulated();
    }
    protected function ensurePopulated()
    {
        if (!isset($this->list[0])) {
            $this->list[0] = $this->createItem(0);
        }
    }
}
