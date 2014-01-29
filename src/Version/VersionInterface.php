<?php

namespace ThinFrame\Foundation\Version;

/**
 * Interface VersionInterface
 *
 * @package ThinFrame\Foundation\Version
 * @since   0.2
 */
interface VersionInterface
{
    /**
     * Get major version
     *
     * @return int
     */
    public function getMajorVersion();

    /**
     * Get minor version
     *
     * @return int
     */
    public function getMinorVersion();

    /**
     * Get release version
     *
     * @return int
     */
    public function getReleaseVersion();

    /**
     * Get version sufix
     *
     * @return string
     */
    public function getSufix();

    /**
     * Compare with another version
     *
     * @param VersionInterface $version
     *
     * @return int (-1,0,1)
     */
    public function compare(VersionInterface $version);

    /**
     * Outputs the original version
     *
     * @return string
     */
    public function __toString();
}