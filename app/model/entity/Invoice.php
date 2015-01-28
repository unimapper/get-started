<?php

namespace Model\Entity;

/**
 * @adapter Mongo(invoice)
 *
 * @property string  $id     m:primary m:map-by(_id)
 * @property Order[] $orders m:assoc(1:N) m:assoc-by(invoice_id)
 */
class Invoice extends \UniMapper\Entity
{

}