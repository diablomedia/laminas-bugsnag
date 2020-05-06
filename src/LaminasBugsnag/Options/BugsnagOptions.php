<?php
namespace LaminasBugsnag\Options;

use Laminas\Stdlib\AbstractOptions;

class BugsnagOptions extends AbstractOptions
{
    protected $apiKey;

    protected $isEnabled;

    protected $releaseStage;

    protected $notifyReleaseStages;

    protected $appVersion;

    /**
     * setApiKey
     * @param String $apiKey
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * setEnable
     * @param Boolean $isEnabled
     */
    public function setEnabled($isEnabled)
    {
        $this->isEnabled = $isEnabled;
    }

    /**
     * setReleaseStage
     * @param String $releaseStage
     */
    public function setReleaseStage($releaseStage)
    {
        $this->releaseStage = $releaseStage;
    }

    /**
     * setNotifyReleaseStages
     * @param Array $stages
     */
    public function setNotifyReleaseStages($stages)
    {
        $this->notifyReleaseStages = $stages;
    }

    /**
     * setAppVersion
     * @param String $appVersion
     */
    public function setAppVersion($appVersion)
    {
        $this->appVersion = $appVersion;
    }

    /**
     * getApiKey
     * @return String $apiKey
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * getEnabled
     * @return Boolean $isEnabled
     */
    public function getEnabled()
    {
        return $this->isEnabled;
    }

    /**
     * getReleaseStage
     * @return String $releaseStage
     */
    public function getReleaseStage()
    {
        return $this->releaseStage;
    }

    /**
     * getNotifyReleaseStages
     * @return Array $stages
     */
    public function getNotifyReleaseStages()
    {
        return $this->notifyReleaseStages;
    }

    /**
     * getAppVersion
     * @return String $appVersion
     */
    public function getAppVersion()
    {
        return $this->appVersion;
    }
}
