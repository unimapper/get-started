<?php

namespace GetStarted\Model\Entity;

/**
 * @adapter Dibi(customer)
 *
 * @property integer  $id       m:primary
 * @property string   $name
 * @property string   $surname
 * @property string   $fullName m:computed
 * @property string   $email
 * @property Order[]  $orders   m:assoc(1:N) m:assoc-by(customer_id)
 */
class Customer extends \UniMapper\Entity
{

    protected function computeFullName()
    {
        return $this->name . " " . $this->surname;
    }

}