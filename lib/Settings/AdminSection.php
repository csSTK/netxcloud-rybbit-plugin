<?php

namespace OCA\RybbitTracking\Settings;

use OCP\Settings\IIconSection;

class AdminSection implements IIconSection {

    public function getID(): string {
        return 'rybbit_tracking';
    }

    public function getName(): string {
        return 'Rybbit Tracking';
    }

    public function getPriority(): int {
        return 75;
    }

    public function getIcon(): string {
        return '';
    }
}
