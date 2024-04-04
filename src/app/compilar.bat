@echo off
cd C:\xampp\htdocs\pruebas
IF EXIST %1 (goto hacer) ELSE GOTO FIN

:hacer

copy %1 C:\Users\valen\Documents\MCUXpressoIDE_11.3.0_5222\workspace\SL2_TP1y2\src\SL2_TP1y2.c


IF EXIST resultado.txt (del resultado.txt)

build2.bat >> resultado.txt

:FIN