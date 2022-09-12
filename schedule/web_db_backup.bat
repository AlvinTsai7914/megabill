@echo off
::檔案目錄
set SourcePath=D:\web
set BackupPath=D:\schedule

::資料庫連線
set userId=root
set UserPwd=Ksd@25127693
set Host=localhost
set port=3306
set DBName=megabills

::備份保留天數
set RetentionDays=3

::設定時間格式 yyyyMMdd
set "Ymd=%date:~0,4%%date:~5,2%%date:~8,2%"

::刪除舊有備份檔
forfiles /p %BackupPath% /m db_backup_*.sql -d -%RetentionDays% /c "cmd /c del /f @path"
forfiles /p %BackupPath% /m web_backup_%Ymd% -d -%RetentionDays% /c "cmd /c if @isdir==TRUE (rmdir /q /s @path) else (del /f @path)"

::資料庫備份
"D:\MariaDB 10.4\bin\mysqldump" --opt --single-transaction=TRUE --user=%userId% --password=%UserPwd% --host=%Host% --protocol=tcp --port=%port% --default-character-set=utf8 --single-transaction=TRUE --routines --events %DBName% > "%BackupPath%\db_backup_%Ymd%.sql"

::網站檔案備份
xcopy "%SourcePath%" "%BackupPath%\web_backup_%Ymd%" /i /e /d /y /h

@echo on

pause