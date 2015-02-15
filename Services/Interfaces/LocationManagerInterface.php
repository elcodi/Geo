<?php

namespace Elcodi\Component\Geo\Services\Interfaces;

use Elcodi\Component\Geo\LocationData\LocationData;

/**
 * Interface LocationManagerInterface
 */
interface LocationManagerInterface
{
    /**
     * Get all the root locations.
     *
     * @return LocationData[]
     */
    public function getRootLocations();

    /**
     * Get the children given a location id.
     *
     * @param string $id The location Id.
     *
     * @return LocationData[]
     */
    public function getChildren($id);

    /**
     * Get the parents given a location id.
     *
     * @param string $id The location Id.
     *
     * @return LocationData[]
     */
    public function getParents($id);

    /**
     * Get the full location info given it's id.
     *
     * @param string $id The location id.
     *
     * @return LocationData
     */
    public function getLocation($id);

    /**
     * Get the hierarchy given a location sorted from root to the given
     * location.
     *
     * @param string $id The location id.
     *
     * @return LocationData
     */
    public function getHierarchy($id);

    /**
     * Checks if the first received id is contained between the rest of ids
     * received as second parameter
     *
     * @param string $id  The location Id
     * @param array  $ids The location Ids
     *
     * @return boolean
     */
    public function in($id, array $ids);
}