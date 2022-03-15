<?php

namespace LaminasBugsnag\Service;

use LaminasBugsnag\Options\BugsnagOptions;
use Bugsnag\Client;
use Bugsnag\Handler;
use Throwable;

class BugsnagService
{
    protected BugsnagOptions $options;

    protected Client $bugsnag;

    /**
     * __construct
     * Send the options of the Bugsnag
     */
    public function __construct(BugsnagOptions $options)
    {
        $this->options = $options;

        if ($this->options->getEnabled()) {
            $this->bugsnag = Client::make($this->options->getApiKey());

            Handler::register($this->bugsnag);

            $this->bugsnag->setReleaseStage($this->options->getReleaseStage());
            $this->bugsnag->setNotifyReleaseStages($this->options->getNotifyReleaseStages());
            $this->bugsnag->setErrorReportingLevel(E_ALL & ~E_NOTICE);
            $this->bugsnag->setAppType('Laminas');
            $this->bugsnag->setNotifier([
                'name'    =>    'LaminasBugsnag',
                'version' =>    \LaminasBugsnag\Version::VERSION,
                'url'     =>    'https://github.com/diablomedia/laminas-bugsnag'
            ]);
            if ($this->options->getAppVersion()) {
                $this->bugsnag->setAppVersion($this->options->getAppVersion());
            }
        }
    }

    /**
     * sendException
     * Send the non-fatal/handled throwable to the Bugsnag Servers
     *
     * @param Throwable $throwable the throwable to notify Bugsnag about
     */
    public function sendException(Throwable $throwable): void
    {
        // Check if we have to send the Exception
        if ($this->options->getEnabled()) {
            // Send it
            $this->bugsnag->notifyException($throwable);
        }
    }

    public function getClient(): ?Client
    {
        if ($this->options->getEnabled()) {
            return $this->bugsnag;
        }

        return null;
    }
}
