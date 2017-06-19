<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Product;

use Product\Model\Product;
use Product\Model\ProductTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module
{
    const VERSION = '3.0.3-dev';

    public function getConfig()
    {
        return array('factories' => array(
            'Product\Model\ProductTable' => function ($sm)
            {
                $tableGateway = $sm->get('ProductTableGateway');
                $table = new ProductTable($tableGateway);
                return $table;
            },
            'ProductTableGateway' => function ($sm)
            {
                $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                $resultSetPrototype = new ResultSet();
                $resultSetPrototype->setArrayObjectPrototype(new Product());
                return new TableGateway('product', $dbAdapter, null,
                    $resultSetPrototype);
            }
        ));
    }
}
