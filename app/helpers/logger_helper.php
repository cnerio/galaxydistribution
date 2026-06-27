<?php
/**
 * Helper to write logs to the app_logs directory
 */

function write_log($filename, $content, $append = true) {
    if (!defined('LOGS_DIR')) {
        // Fallback resolution
        $documentRoot = isset($_SERVER['DOCUMENT_ROOT']) ? rtrim($_SERVER['DOCUMENT_ROOT'], DIRECTORY_SEPARATOR) : '';
        if ($documentRoot !== '') {
            $logsDir = dirname($documentRoot) . DIRECTORY_SEPARATOR . 'app_logs';
        } else {
            $logsDir = dirname(dirname(dirname(dirname(__FILE__)))) . DIRECTORY_SEPARATOR . 'app_logs';
        }
    } else {
        $logsDir = LOGS_DIR;
    }

    // Create the logs directory if it doesn't exist
    if (!is_dir($logsDir)) {
        if (!mkdir($logsDir, 0777, true) && !is_dir($logsDir)) {
            error_log("Failed to create log directory: " . $logsDir);
            return false;
        }
    }

    $filepath = $logsDir . DIRECTORY_SEPARATOR . $filename;
    
    // Ensure content is formatted as string
    if (is_array($content) || is_object($content)) {
        $content = json_encode($content, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n";
    }
    
    $flags = $append ? FILE_APPEND : 0;
    
    return file_put_contents($filepath, $content, $flags);
}
