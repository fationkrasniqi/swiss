@echo off
REM Database Backup Script for XAMPP MySQL
REM This will backup your database to backups folder

set TIMESTAMP=%date:~-4%%date:~3,2%%date:~0,2%_%time:~0,2%%time:~3,2%%time:~6,2%
set TIMESTAMP=%TIMESTAMP: =0%
set BACKUP_DIR=storage\backups
set DB_NAME=backend
set MYSQL_USER=root
set MYSQL_PORT=3307

echo Creating backup directory...
if not exist "%BACKUP_DIR%" mkdir "%BACKUP_DIR%"

echo Backing up database: %DB_NAME%...
"C:\xampp\mysql\bin\mysqldump.exe" -u %MYSQL_USER% -P %MYSQL_PORT% -h 127.0.0.1 %DB_NAME% > "%BACKUP_DIR%\%DB_NAME%_%TIMESTAMP%.sql"

if %errorlevel% equ 0 (
    echo.
    echo ========================================
    echo Backup completed successfully!
    echo File: %BACKUP_DIR%\%DB_NAME%_%TIMESTAMP%.sql
    echo ========================================
) else (
    echo.
    echo ========================================
    echo ERROR: Backup failed!
    echo ========================================
)

pause
