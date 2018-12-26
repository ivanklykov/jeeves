<?php

namespace Mygento\SampleModule\Model;

use Magento\Framework\Model\AbstractModel;

class CustomerAddress extends AbstractModel implements \Mygento\SampleModule\Api\Data\CustomerAddressInterface
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Mygento\SampleModule\Model\ResourceModel\CustomerAddress::class);
    }

    /**
     * Get id
     * @return int|null
     */
    public function getId()
    {
        return $this->getData(self::ID);
    }

    /**
     * Set id
     * @param int $id
     * @return \Mygento\SampleModule\Api\Data\CustomerAddressInterface
     */
    public function setId($id)
    {
        return $this->setData(self::ID, $id);
    }

    /**
     * Get city
     * @return string|null
     */
    public function getCity()
    {
        return $this->getData(self::CITY);
    }

    /**
     * Set city
     * @param string $city
     * @return \Mygento\SampleModule\Api\Data\CustomerAddressInterface
     */
    public function setCity($city)
    {
        return $this->setData(self::CITY, $city);
    }

    /**
     * Get created at
     * @return string|null
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Set created at
     * @param string $createdAt
     * @return \Mygento\SampleModule\Api\Data\CustomerAddressInterface
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * Get updated at
     * @return string|null
     */
    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }

    /**
     * Set updated at
     * @param string $updatedAt
     * @return \Mygento\SampleModule\Api\Data\CustomerAddressInterface
     */
    public function setUpdatedAt($updatedAt)
    {
        return $this->setData(self::UPDATED_AT, $updatedAt);
    }

    /**
     * Get price
     * @return float|null
     */
    public function getPrice()
    {
        return $this->getData(self::PRICE);
    }

    /**
     * Set price
     * @param float $price
     * @return \Mygento\SampleModule\Api\Data\CustomerAddressInterface
     */
    public function setPrice($price)
    {
        return $this->setData(self::PRICE, $price);
    }
}