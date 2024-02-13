<?php
/**
 * @param string $configName
 * @return array
 */
function loadConfig(string $configName) : array
{
    return include APP_DIR . "/config/$configName.php" ?: [];
}
