#!/usr/bin/env php
<?php
if (!empty($argv[1])) {
    echo array_pop($argv);
} else {
    echo '';
}

