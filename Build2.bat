@echo off
@REM Este archivo Batch se encarga de compilar el archivo remoto de programación
@REM Utilizando el MCUXpresso IDE

@REM Primero se setea una variable donde se guarda la ruta del IDE
SET IDE_PATH=C:\nxp\MCUXpressoIDE_11.3.0_5222

@REM Luego se setea una variable donde se guarda la ruta de las herramientas del compilador
SET TOOLCHAIN_PATH=%IDE_PATH%\ide\tools\bin

@REM Ahora seteamos una variable con la ubicación del IDE
SET IDE=%IDE_PATH%\ide\mcuxpressoidec.exe

@REM Agregando ruta al PATH si no esta presente actualmente
ECHO %PATH%|findstr /i /c:"%TOOLCHAIN_PATH:"=%">nul || set PATH=%PATH%;%TOOLCHAIN_PATH%

ECHO Ejecutando MCUXpresso IDE

@REM Compila el objetivo
"%IDE%" -nosplash --launcher.suppressErrors -application org.eclipse.cdt.managedbuilder.core.headlessbuild -data "C:\Users\valen\Documents\MCUXpressoIDE_11.3.0_5222\workspace" -importAll "C:\Users\valen\Documents\MCUXpressoIDE_11.3.0_5222\workspace" -build SL2_TP1y2/Debug
