@echo off

@rem cd C:\nxp\MCUXpressoIDE_11.3.0_5222\ide\binaries\Scripts
@rem bootLPCXpresso.cmd winusb
cd C:\nxp\MCUXpressoIDE_11.3.0_5222\ide\binaries
crt_emu_cm_redlink -pLPC1769 -vendor=NXP -flash-load-exec "C:\Users\valen\Documents\MCUXpressoIDE_11.3.0_5222\workspace\SL2_TP1y2\Debug\SL2_TP1y2.axf"