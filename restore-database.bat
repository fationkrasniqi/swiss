@echo off
REM Database Restore Script for XAMPP MySQL

set DB_NAME=backend
set MYSQL_USER=root
set MYSQL_PORT=3307
set BACKUP_DIR=storage\backups

echo ========================================
echo Available Backups:
echo ========================================
dir /b "%BACKUP_DIR%\*.sql"
echo.

set /p BACKUP_FILE="Enter backup filename (e.g., backend_20251218_123456.sql): "

if not exist "%BACKUP_DIR%\%BACKUP_FILE%" (
    echo ERROR: File not found!
    pause
    exit /b 1
)

echo.
echo WARNING: This will replace all data in database '%DB_NAME%'
set /p CONFIRM="Are you sure? (yes/no): "

if /i not "%CONFIRM%"=="yes" (
    echo Restore cancelled.
    pause
    exit /b 0
)

echo.
echo Restoring database from: %BACKUP_FILE%...
"C:\xampp\mysql\bin\mysql.exe" -u %MYSQL_USER% -P %MYSQL_PORT% -h 127.0.0.1 %DB_NAME% < "%BACKUP_DIR%\%BACKUP_FILE%"

if %errorlevel% equ 0 (
    echo.
    echo ========================================
    echo Restore completed successfully!
    echo ========================================
) else (
    echo.
    echo ========================================
    echo ERROR: Restore failed!
    echo ========================================
)

pause
