<form id="rybbit-settings" class="section" method="post" action="<?php print_unescaped(\OC::$server->getURLGenerator()->linkToRoute('rybbit_tracking.settings.save')); ?>"
    <h2>Rybbit Tracking Settings</h2>
    <input type="hidden" name="requesttoken" value="<?php p($_['requesttoken']); ?>" />

    <label for="rybbit_url">Tracking-Script URL:</label>
    <input type="text" name="rybbit_url" id="rybbit_url" value="<?php p($_['rybbit_url']); ?>" />

    <label for="site_id">Site ID:</label>
    <input type="text" name="site_id" id="site_id" value="<?php p($_['site_id']); ?>" />

    <label>
        <input type="checkbox" name="replay" value="true" <?php if ($_['replay'] === 'true') print_unescaped('checked'); ?> />
        Activate Session Replay
    </label>

    <label>
        <input type="checkbox" name="errors" value="true" <?php if ($_['errors'] === 'true') print_unescaped('checked'); ?> />
        Activate Fehler-Tracking
    </label>

    <label>
        <input type="checkbox" name="vitals" value="true" <?php if ($_['vitals'] === 'true') print_unescaped('checked'); ?> />
        Activate Web Vitals
    </label>

    <br><br>
    <input type="submit" value="Save" class="button primary" />
</form>
