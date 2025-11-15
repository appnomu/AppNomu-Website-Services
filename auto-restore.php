<?php
/**
 * Auto-Restore Deleted Admin Files
 * 
 * This script automatically restores admin files that have been deleted
 * by the hosting provider's security system.
 * 
 * Setup: Add to cron job (every 30 minutes)
 * Cron: */30 * * * * php /home/username/public_html/auto-restore.php
 */

// Configuration
$baseDir = __DIR__;
$backupDir = $baseDir . '/backups/admin';
$logFile = $baseDir . '/logs/auto-restore.log';
$alertEmail = 'info@appnomu.com';

// Files to monitor and restore
$files = [
    'admin/add-project.php' => 'add-project.php',
    'admin/edit-project.php' => 'edit-project.php',
    'admin/view-project.php' => 'view-project.php',
    'admin/projects.php' => 'projects.php'
];

// Create directories if they don't exist
if (!is_dir($backupDir)) {
    mkdir($backupDir, 0755, true);
}

if (!is_dir(dirname($logFile))) {
    mkdir(dirname($logFile), 0755, true);
}

// Function to log messages
function logMessage($message) {
    global $logFile;
    $timestamp = date('Y-m-d H:i:s');
    $logEntry = "[$timestamp] $message\n";
    file_put_contents($logFile, $logEntry, FILE_APPEND);
}

// Function to send email alert
function sendAlert($subject, $message) {
    global $alertEmail;
    
    $headers = "From: AppNomu Auto-Restore <noreply@appnomu.com>\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    
    mail($alertEmail, $subject, $message, $headers);
}

// Arrays to track actions
$restored = [];
$missing = [];
$backupCreated = [];

// Check and restore files
foreach ($files as $targetPath => $backupName) {
    $fullTargetPath = $baseDir . '/' . $targetPath;
    $fullBackupPath = $backupDir . '/' . $backupName;
    
    // If target file exists, create/update backup
    if (file_exists($fullTargetPath)) {
        if (!file_exists($fullBackupPath) || filemtime($fullTargetPath) > filemtime($fullBackupPath)) {
            if (copy($fullTargetPath, $fullBackupPath)) {
                $backupCreated[] = $targetPath;
                logMessage("Backup created: $targetPath");
            }
        }
    }
    // If target file is missing but backup exists, restore it
    elseif (file_exists($fullBackupPath)) {
        if (copy($fullBackupPath, $fullTargetPath)) {
            chmod($fullTargetPath, 0644);
            $restored[] = $targetPath;
            logMessage("RESTORED: $targetPath (file was deleted by security system)");
        } else {
            logMessage("ERROR: Failed to restore $targetPath");
        }
    }
    // Both target and backup are missing
    else {
        $missing[] = $targetPath;
        logMessage("WARNING: Both target and backup missing for $targetPath");
    }
}

// Send email alert if files were restored
if (!empty($restored)) {
    $subject = "⚠️ AppNomu Alert: Admin Files Auto-Restored";
    
    $message = "SECURITY ALERT: Admin files were automatically restored\n\n";
    $message .= "The following files were deleted and have been restored:\n\n";
    $message .= implode("\n", $restored);
    $message .= "\n\n";
    $message .= "This indicates your hosting provider's security system is deleting these files.\n";
    $message .= "IMMEDIATE ACTION REQUIRED:\n";
    $message .= "1. Contact your hosting provider\n";
    $message .= "2. Request whitelisting of these files\n";
    $message .= "3. Check SERVER_SECURITY_FIX.md for detailed instructions\n\n";
    $message .= "Time: " . date('Y-m-d H:i:s') . "\n";
    $message .= "Server: " . $_SERVER['SERVER_NAME'] ?? 'Unknown';
    
    sendAlert($subject, $message);
}

// Send critical alert if backups are missing
if (!empty($missing)) {
    $subject = "🚨 CRITICAL: AppNomu Admin Files Missing";
    
    $message = "CRITICAL ALERT: Admin files and their backups are missing!\n\n";
    $message .= "Missing files:\n\n";
    $message .= implode("\n", $missing);
    $message .= "\n\n";
    $message .= "ACTION REQUIRED:\n";
    $message .= "1. Re-upload these files from your local development environment\n";
    $message .= "2. Contact hosting provider immediately\n";
    $message .= "3. Set up file monitoring\n\n";
    $message .= "Time: " . date('Y-m-d H:i:s');
    
    sendAlert($subject, $message);
}

// Output JSON response (useful for manual testing)
$response = [
    'status' => 'completed',
    'timestamp' => date('Y-m-d H:i:s'),
    'restored' => $restored,
    'missing' => $missing,
    'backups_created' => $backupCreated,
    'message' => count($restored) > 0 
        ? 'Files were restored! Check email for details.' 
        : 'All files are present.'
];

// If running from command line, output to console
if (php_sapi_name() === 'cli') {
    echo "\n========================================\n";
    echo "AppNomu Auto-Restore Script\n";
    echo "========================================\n\n";
    
    if (!empty($restored)) {
        echo "✓ Restored " . count($restored) . " file(s):\n";
        foreach ($restored as $file) {
            echo "  - $file\n";
        }
        echo "\n";
    }
    
    if (!empty($missing)) {
        echo "✗ Missing " . count($missing) . " file(s):\n";
        foreach ($missing as $file) {
            echo "  - $file\n";
        }
        echo "\n";
    }
    
    if (!empty($backupCreated)) {
        echo "✓ Created " . count($backupCreated) . " backup(s)\n\n";
    }
    
    if (empty($restored) && empty($missing)) {
        echo "✓ All files are present and backed up\n\n";
    }
    
    echo "Log file: $logFile\n";
    echo "========================================\n\n";
} else {
    // If running from web, output JSON
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
}

logMessage("Auto-restore script completed: " . count($restored) . " restored, " . count($missing) . " missing");
?>
