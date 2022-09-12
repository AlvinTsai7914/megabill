@echo off
::檔案目錄
set BackupPath=D:\schedule

::資料庫連線
set userId=root
set UserPwd=Ksd@25127693
set Host=localhost
set port=3306
set DBName=megabills
set TableName=log

::備份保留天數
set RetentionDays=90

::設定時間格式 yyyyMMdd
set "Ymd=%date:~0,4%%date:~5,2%%date:~8,2%"

::刪除舊有備份檔
forfiles /p %BackupPath% /m log_backup_*.sql -d -%RetentionDays% /c "cmd /c del /f @path"

::資料庫備份
"D:\MariaDB 10.4\bin\mysqldump" --opt --single-transaction=TRUE --user=%userId% --password=%UserPwd% --host=%Host% --protocol=tcp --port=%port% --default-character-set=utf8 --single-transaction=TRUE --routines --events %DBName% %TableName% > "%BackupPath%\log_backup_%Ymd%.sql"

::清除Log資料表
::"D:\MariaDB 10.4\bin\mysql" --user=%userId% --password=%UserPwd% --host=%Host% --protocol=tcp --port=%port% %DBName% -e "DELETE from %TableName% where 1" ;

@echo on
