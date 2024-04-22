@echo off
cd C:\xampp\htdocs\pruebas
IF EXIST %1 (goto hacer) ELSE GOTO FIN

:hacer

copy %1 C:\Users\valen\Documents\MCUXpressoIDE_11.3.0_5222\workspace\SL2_TP1y2\src\SL2_TP1y2.c


IF EXIST .\sources\archivos\resultado.txt (del .\sources\archivos\resultado.txt)

Build2.bat >> .\sources\archivos\resultado.txt

:FIN