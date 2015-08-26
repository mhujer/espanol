<?php
/**
 * Create this pre-commit hook:
        #!/bin/sh
        php touch-cache-manifest.php
 */

$lines = explode("\n", file_get_contents('cache.manifest'));
$lines[1] = '# index.html hash: ' . md5_file('index.html');
file_put_contents('cache.manifest', implode("\n", $lines));
exec('git add cache.manifest');
