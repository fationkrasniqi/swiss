# 🚨 EMERGENCY DATABASE RECOVERY GUIDE

## Problem: MySQL të dhënat u fshinë ose janë korruptuar

### ✅ ZGJIDHJA E SHPEJTË:

1. **Stop XAMPP MySQL**
   - Hap XAMPP Control Panel
   - Kliko "Stop" në MySQL

2. **Restore nga Backup**
   - Dyklikoje: `restore-database.bat`
   - Zgjidh backup file më të fundit
   - Type "yes" dhe prit

3. **Start MySQL përsëri**
   - XAMPP Control Panel → Start MySQL

---

## 📋 RREGULLAT E ARTA:

### ❌ MOS I PREK KURRË:
- `C:\xampp\mysql\data\ibdata1`
- `C:\xampp\mysql\data\ib_logfile*`
- `C:\xampp\mysql\data\backend\*.ibd`

### ✅ BËJ BACKUP ÇDO DITË:
- Dyklikoje: `backup-database.bat`
- Ose vendose automatic backup (shiko më poshtë)

---

## 🤖 AUTOMATIC DAILY BACKUP (opsionale):

### Hapat:
1. Hap "Task Scheduler" në Windows
2. Create Task → Name: "Database Backup"
3. Triggers → New → Daily at 2:00 AM
4. Actions → New → Start a program
   - Program: `powershell.exe`
   - Arguments: `-File "C:\Users\fatio\Desktop\backend\backend\daily-backup.ps1"`
5. Save

---

## 📁 Backup Files Location:
`C:\Users\fatio\Desktop\backend\backend\storage\backups\`

---

## 🆘 NË RAST EMERGJENXE:

Nëse backups nuk ka, por ke access në phpMyAdmin:
1. Export databazën para se të bësh ndonjë ndryshim
2. Ruaje në një vend të sigurt
3. Pastaj bëj fix

---

**MEMO: Backup është si sigurimi i makinës - më mirë ta kesh e të mos duhet, se sa të duhet e të mos e kesh! 🚨**
