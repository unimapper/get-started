<?php

namespace GetStarted\FrontModule\Presenters;

class OrdersPresenter extends \Nette\Application\UI\Presenter
{

    /**
     * @var \GetStarted\Model\Repository\OrderRepository @inject
     */
    public $orders;

    public function renderDefault()
    {
        $this->template->orders = $this->orders->find([], [], 0, 0, ["customer", "invoice"]);
    }

}