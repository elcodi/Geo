<?php

namespace Elcodi\Component\Geo\Services;

use Doctrine\Common\Persistence\ObjectManager;
use Elcodi\Component\Geo\Entity\Interfaces\AddressInterface;

/**
 * Class AddressManager
 */
class AddressManager
{
    /**
     * @var AddressInterface
     *
     * Address saved
     */
    protected $addressSaved;

    /**
     * @var ObjectManager
     *
     * Address object manager
     */
    protected $addressObjectManager;

    /**
     * Builds an address manager
     *
     * @param ObjectManager $addressObjectManager An address object manager
     */
    public function __construct(
        ObjectManager $addressObjectManager
    ) {
        $this->addressObjectManager = $addressObjectManager;
    }

    /**
     * Saves an address making a copy in case it was already persisted.
     *
     * @param AddressInterface $address The address to save
     *
     * @return $this Self object
     */
    public function saveAddress(AddressInterface $address)
    {
        if ($address->getId()) {
            $addressToSave = clone $address;
            $addressToSave->setId(null);
            $this->addressObjectManager->refresh($address);
        } else {
            $addressToSave = $address;
        }

        $this->addressObjectManager->persist($addressToSave);
        $this->addressObjectManager->flush($addressToSave);

        $this->addressSaved = $addressToSave;

        return $this;
    }

    /**
     * Get the last saved address
     *
     * @return AddressInterface
     */
    public function getSavedAddress()
    {
        return $this->addressSaved;
    }
}
