<?php

namespace OCA\RybbitTracking\Settings;

use OCP\AppFramework\Http\TemplateResponse;
use OCP\Settings\ISettings;
use OCP\Security\CSP\ContentSecurityPolicy;

class Admin implements ISettings {

    public function getForm() {
        $config = \OC::$server->getConfig();

        // $policy = new ContentSecurityPolicy();
        // $policy->addAllowedScriptDomain('https://your.rybbit.url');

        $response = new TemplateResponse('rybbit_tracking', 'settings-admin', [
            'rybbit_url' => $config->getAppValue('rybbit_tracking', 'url', ''),
            'site_id' => $config->getAppValue('rybbit_tracking', 'site_id', ''),
            'replay' => $config->getAppValue('rybbit_tracking', 'replay', 'true'),
            'errors' => $config->getAppValue('rybbit_tracking', 'errors', 'true'),
            'vitals' => $config->getAppValue('rybbit_tracking', 'vitals', 'true'),
        ]);

        // $response->setContentSecurityPolicy($policy);
        return $response;
    }

    public function getSection() {
        return 'additional';
    }

    public function getPriority() {
        return 10;
    }
}
