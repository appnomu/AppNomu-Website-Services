#!/bin/bash

# AppNomu Admin Files Restore Script
# This script checks if critical admin files exist and restores them from backup if missing

# Color codes for output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Get script directory
SCRIPT_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
ADMIN_DIR="$SCRIPT_DIR/admin"
BACKUP_DIR="$SCRIPT_DIR/backups/admin"

# Create backup directory if it doesn't exist
mkdir -p "$BACKUP_DIR"

# Log file
LOG_FILE="$SCRIPT_DIR/logs/admin-restore.log"
mkdir -p "$SCRIPT_DIR/logs"

# Function to log messages
log_message() {
    echo "[$(date '+%Y-%m-%d %H:%M:%S')] $1" >> "$LOG_FILE"
}

# Function to restore file
restore_file() {
    local filename=$1
    local admin_file="$ADMIN_DIR/$filename"
    local backup_file="$BACKUP_DIR/$filename"
    
    if [ ! -f "$admin_file" ]; then
        if [ -f "$backup_file" ]; then
            cp "$backup_file" "$admin_file"
            chmod 644 "$admin_file"
            echo -e "${GREEN}✓${NC} Restored: $filename"
            log_message "RESTORED: $filename"
            return 0
        else
            echo -e "${RED}✗${NC} Missing backup for: $filename"
            log_message "ERROR: No backup found for $filename"
            return 1
        fi
    else
        echo -e "${GREEN}✓${NC} OK: $filename"
        return 0
    fi
}

# Function to create backup
create_backup() {
    local filename=$1
    local admin_file="$ADMIN_DIR/$filename"
    local backup_file="$BACKUP_DIR/$filename"
    
    if [ -f "$admin_file" ]; then
        cp "$admin_file" "$backup_file"
        echo -e "${GREEN}✓${NC} Backed up: $filename"
        log_message "BACKUP: $filename"
        return 0
    else
        echo -e "${YELLOW}⚠${NC} File not found for backup: $filename"
        log_message "WARNING: File not found for backup: $filename"
        return 1
    fi
}

# Main script
echo "=========================================="
echo "AppNomu Admin Files Restore Script"
echo "=========================================="
echo ""

# Check if backup mode or restore mode
if [ "$1" == "backup" ]; then
    echo "Creating backups of admin files..."
    echo ""
    
    create_backup "add-project.php"
    create_backup "edit-project.php"
    create_backup "view-project.php"
    create_backup "projects.php"
    
    echo ""
    echo "Backup completed!"
    echo "Backups stored in: $BACKUP_DIR"
    
elif [ "$1" == "check" ]; then
    echo "Checking admin files status..."
    echo ""
    
    files_ok=true
    
    if [ ! -f "$ADMIN_DIR/add-project.php" ]; then
        echo -e "${RED}✗${NC} MISSING: add-project.php"
        files_ok=false
    else
        echo -e "${GREEN}✓${NC} OK: add-project.php"
    fi
    
    if [ ! -f "$ADMIN_DIR/edit-project.php" ]; then
        echo -e "${RED}✗${NC} MISSING: edit-project.php"
        files_ok=false
    else
        echo -e "${GREEN}✓${NC} OK: edit-project.php"
    fi
    
    if [ ! -f "$ADMIN_DIR/view-project.php" ]; then
        echo -e "${RED}✗${NC} MISSING: view-project.php"
        files_ok=false
    else
        echo -e "${GREEN}✓${NC} OK: view-project.php"
    fi
    
    if [ ! -f "$ADMIN_DIR/projects.php" ]; then
        echo -e "${RED}✗${NC} MISSING: projects.php"
        files_ok=false
    else
        echo -e "${GREEN}✓${NC} OK: projects.php"
    fi
    
    echo ""
    if [ "$files_ok" = true ]; then
        echo -e "${GREEN}All admin files are present!${NC}"
    else
        echo -e "${RED}Some admin files are missing! Run './restore-admin-files.sh restore' to fix.${NC}"
    fi
    
else
    echo "Checking and restoring missing admin files..."
    echo ""
    
    restore_file "add-project.php"
    restore_file "edit-project.php"
    restore_file "view-project.php"
    restore_file "projects.php"
    
    echo ""
    echo "Restore check completed!"
fi

echo ""
echo "Log file: $LOG_FILE"
echo "=========================================="

log_message "Script completed: $1"
