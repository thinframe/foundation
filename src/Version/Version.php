<?php

namespace ThinFrame\Foundation\Version;

use ThinFrame\Foundation\Exceptions\InvalidArgumentException;

/**
 * Class Version
 *
 * @package ThinFrame\Foundation\Version
 * @since   0.2
 */
class Version implements VersionInterface
{
    /**
     * @var string
     */
    protected $versionString;
    /**
     * @var int
     */
    protected $major = 0;
    /**
     * @var int
     */
    protected $minor = 0;
    /**
     * @var int
     */
    protected $release = 0;
    /**
     * @var string
     */
    protected $sufix = '';

    /**
     * @param string $versionString
     */
    public function __construct($versionString)
    {
        $this->versionString = $versionString;
        $this->parseVersion();
    }

    /**
     * Parse version string
     *
     * @throws \ThinFrame\Foundation\Exceptions\InvalidArgumentException
     */
    private function parseVersion()
    {
        if (strstr($this->versionString, '-')) {
            if (sscanf(
                    $this->versionString,
                    '%d.%d.%d-%s',
                    $this->major,
                    $this->minor,
                    $this->release,
                    $this->sufix
                ) != 4
            ) {
                throw new InvalidArgumentException('Invalid version format ' . $this->versionString);
            }
        } else {
            if (sscanf($this->versionString, '%d.%d.%d', $this->major, $this->minor, $this->release) != 3) {
                throw new InvalidArgumentException('Invalid version format ' . $this->versionString);
            }
        }
    }

    /**
     * Get major version
     *
     * @return int
     */
    public function getMajorVersion()
    {
        return $this->major;
    }

    /**
     * Get minor version
     *
     * @return int
     */
    public function getMinorVersion()
    {
        return $this->minor;
    }

    /**
     * Get release version
     *
     * @return int
     */
    public function getReleaseVersion()
    {
        return $this->release;
    }

    /**
     * Get version sufix
     *
     * @return string
     */
    public function getSufix()
    {
        return $this->sufix;
    }

    /**
     * Compare with another version
     *
     * @param VersionInterface $version
     *
     * @return int (-1,0,1)
     */
    public function compare(VersionInterface $version)
    {
        if ($this->getMajorVersion() < $version->getMajorVersion()) {
            return -1;
        } elseif ($this->getMajorVersion() > $version->getMajorVersion()) {
            return 1;
        } else {
            if ($this->getMinorVersion() < $version->getMinorVersion()) {
                return -1;
            } elseif ($this->getMinorVersion() > $version->getMinorVersion()) {
                return 1;
            } else {
                if ($this->getReleaseVersion() < $version->getReleaseVersion()) {
                    return -1;
                } elseif ($this->getReleaseVersion() > $version->getReleaseVersion()) {
                    return 1;
                } else {
                    return 0;
                }
            }
        }
    }

    /**
     * Outputs the original version
     *
     * @return string
     */
    public function __toString()
    {
        return $this->versionString;
    }
}
