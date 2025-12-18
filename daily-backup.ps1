# AUTO-BACKUP DAILY
# Put this in Windows Task Scheduler to run daily

$timestamp = Get-Date -Format "yyyyMMdd_HHmmss"
$backupDir = "C:\Users\fatio\Desktop\backend\backend\storage\backups"
$dbName = "backend"

# Create backup
& "C:\xampp\mysql\bin\mysqldump.exe" -u root -P 3307 -h 127.0.0.1 $dbName > "$backupDir\${dbName}_$timestamp.sql"

# Keep only last 7 days of backups (delete older)
Get-ChildItem $backupDir -Filter "*.sql" | 
    Where-Object { $_.LastWriteTime -lt (Get-Date).AddDays(-7) } | 
    Remove-Item

Write-Host "Daily backup completed: ${dbName}_$timestamp.sql"
