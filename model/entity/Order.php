<?php

namespace GetStarted\Model\Entity;

/**
 * @adapter Dibi(order)
 *
 * @property integer  $id       m:primary
 * @property Customer $customer m:assoc(N:1) m:assoc-by(customer_id)
 * @property DateTime $time
 * @property string   $status   m:enum(self::STATUS_*)
 * @property Invoice  $invoice  m:assoc(N:1) m:assoc-by(invoice_id)
 */
class Order extends \UniMapper\Entity
{

    const STATUS_NEW = 0,
          STATUS_FINISHED = 1;

}