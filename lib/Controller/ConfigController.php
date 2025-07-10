<?php

namespace OCA\RybbitTracking\Controller;

use OCP\IRequest;
use OCP\IConfig;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\RedirectResponse;
use OCP\AppFramework\Http\JSONResponse;
use OCP\IUserSession;

class SettingsController extends Controller {

    private IConfig $config;
    private IUserSession $userSession;

    public function __construct(
        string $AppName,
        IRequest $request,
        IConfig $config,
        IUserSession $userSession
    ) {
        parent::__construct($AppName, $request);
        $this->config = $config;
        $this->userSession = $userSession;
    }

    /**
     * @NoCSRFRequired
     * @AdminRequired
     */
    public function save($rybbit_url, $site_id, $replay = 'false', $errors = 'false', $vitals = 'false') {
        $this->config->setAppValue('rybbit_tracking', 'url', $rybbit_url);
        $this->config->setAppValue('rybbit_tracking', 'site_id', $site_id);
        $this->config->setAppValue('rybbit_tracking', 'replay', $replay);
        $this->config->setAppValue('rybbit_tracking', 'errors', $errors);
        $this->config->setAppValue('rybbit_tracking', 'vitals', $vitals);

        return new JSONResponse(['status' => 'success']);
    }
}
