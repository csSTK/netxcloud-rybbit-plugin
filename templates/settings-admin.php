<form id="rybbit-settings" class="section" method="post" action="<?php print_unescaped(\OC::$server->getURLGenerator()->linkToRoute('rybbit_tracking.settings.save')); ?>">
    <h2>Rybbit Tracking Settings</h2>
    <input type="hidden" name="requesttoken" value="<?php p($_['requesttoken']); ?>" />

    <p>
        <label for="rybbit_url">Tracking-Script URL:</label><br>
        <input type="text" name="rybbit_url" id="rybbit_url" value="<?php p($_['rybbit_url']); ?>" style="width: 400px;" placeholder="https://example.com/tracking.js" />
    </p>

    <p>
        <label for="site_id">Site ID:</label><br>
        <input type="text" name="site_id" id="site_id" value="<?php p($_['site_id']); ?>" style="width: 200px;" placeholder="your-site-id" />
    </p>

    <p>
        <label>
            <input type="checkbox" name="replay" value="true" <?php if ($_['replay'] === 'true') print_unescaped('checked'); ?> />
            Activate Session Replay
        </label>
    </p>

    <p>
        <label>
            <input type="checkbox" name="errors" value="true" <?php if ($_['errors'] === 'true') print_unescaped('checked'); ?> />
            Activate Error Tracking
        </label>
    </p>

    <p>
        <label>
            <input type="checkbox" name="vitals" value="true" <?php if ($_['vitals'] === 'true') print_unescaped('checked'); ?> />
            Activate Web Vitals
        </label>
    </p>

    <p>
        <input type="submit" value="Save Settings" class="button primary" />
    </p>
</form>
