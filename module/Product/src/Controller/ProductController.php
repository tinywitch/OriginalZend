<?php
/**
 * Created by PhpStorm.
 * User: thuyninh
 * Date: 19/06/2017
 * Time: 10:45
 */

namespace Product\Controller;


use Zend\View\Model\ViewModel;

class ProductController
{
    protected $productTable;

    public function getProductTable()
    {
        if (!$this->productTable)
        {
            $sm = $this->getServiceLocator();
            $this->productTable = $sm->get('Product\Model\ProductTable');
        }
        return $this->productTable;
    }

    public function indexAction()
    {
        return new ViewModel(array(
            'products' => $this->getProductTable()->fetchAll(),
        ));
    }
}