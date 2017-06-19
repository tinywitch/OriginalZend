<?php
/**
 * Created by PhpStorm.
 * User: thuyninh
 * Date: 19/06/2017
 * Time: 10:34
 */

namespace Product\Model;


use Zend\Db\TableGateway\TableGateway;

class ProductTable
{
    protected $tableGateway;

    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function getProduct($id)
    {
        $id = (int)$id;
        $rowset = $this->tableGateway->select(array('id' => $id));
        $row = $rowset->current();
        if (!$row)
        {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }

    public function deleteProduct($id)
    {
        $this->tableGateway->delete(array('id' => $id));
    }

    public function saveProduct(Product $product)
    {
        $data = array(
            'name' => $product->name,
            'price' => $product->price,
            'image' => $product->image,
        );
        $id = (int)$product->id;
        if ($id == 0)
        {
            $this->tableGateway->insert($data);
        }
        else
        {
            if ($this->getProduct($id))
            {
                $this->tableGateway->update($data, array('id' => $id));
            }
            else
            {
                throw new \Exception('Form id does not exist');
            }
        }
    }
}