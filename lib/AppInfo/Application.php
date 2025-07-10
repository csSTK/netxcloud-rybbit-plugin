<?php
namespace OCA\RybbitTracking\AppInfo;

use OCP\AppFramework\App;
use OCP\Util;

class Application extends App {
    public function __construct(array $urlParams = []) {
        parent::__construct('rybbit_tracking', $urlParams);
        Util::addScript('rybbit_tracking', 'rybbit');
    }
}
