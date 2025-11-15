<?php
/**
 * Simple Error Logger - Safe Implementation
 * Only logs errors, doesn't change website behavior
 */

class SimpleLogger {
    private static $logFile = null;
    
    public static function init() {
        // Set log file path
        self::$logFile = dirname(__DIR__) . '/logs/simple-errors.log';
        
        // Create logs directory if it doesn't exist
        $logDir = dirname(self::$logFile);
        if (!is_dir($logDir)) {
            @mkdir($logDir, 0755, true);
        }
    }
    
    /**
     * Log an error message (safe - won't break site if it fails)
     */
    public static function logError($message, $context = []) {
        try {
            if (self::$logFile === null) {
                self::init();
            }
            
            $timestamp = date('Y-m-d H:i:s');
            $contextStr = !empty($context) ? ' | Context: ' . json_encode($context) : '';
            $logEntry = "[{$timestamp}] ERROR: {$message}{$contextStr}" . PHP_EOL;
            
            // Use error_log as fallback if file writing fails
            if (!@file_put_contents(self::$logFile, $logEntry, FILE_APPEND | LOCK_EX)) {
                error_log($logEntry);
            }
        } catch (Exception $e) {
            // Silently fail - don't break the website
            error_log("SimpleLogger failed: " . $e->getMessage());
        }
    }
    
    /**
     * Log an info message
     */
    public static function logInfo($message) {
        try {
            if (self::$logFile === null) {
                self::init();
            }
            
            $timestamp = date('Y-m-d H:i:s');
            $logEntry = "[{$timestamp}] INFO: {$message}" . PHP_EOL;
            
            @file_put_contents(self::$logFile, $logEntry, FILE_APPEND | LOCK_EX);
        } catch (Exception $e) {
            // Silently fail
        }
    }
}

// Initialize the logger (safe - won't break if it fails)
SimpleLogger::init();
?>
