Ejecutando MCUXpresso IDE
Opening 'Display'.
Opening 'lpc_board_nxp_lpcxpresso_1769'.
Opening 'lpc_chip_175x_6x'.
Opening 'Proyecto_Final'.
Opening 'SL2_TP1y2'.
Opening 'SL2_TP3'.
Opening 'SL2_TP4'.
10:37:42 **** Build of configuration Debug for project SL2_TP1y2 ****
make -r -j4 all 
Building file: ../src/SL2_TP1y2.c
Invoking: MCU C Compiler
arm-none-eabi-gcc -DDEBUG -D__CODE_RED -DCORE_M3 -D__USE_LPCOPEN -D__LPC17XX__ -D__REDLIB__ -I"C:\Users\valen\Documents\MCUXpressoIDE_11.3.0_5222\workspace\SL2_TP1y2\inc" -I"C:\Users\valen\Documents\MCUXpressoIDE_11.3.0_5222\workspace\lpc_board_nxp_lpcxpresso_1769\inc" -I"C:\Users\valen\Documents\MCUXpressoIDE_11.3.0_5222\workspace\lpc_chip_175x_6x\inc" -O0 -fno-common -g3 -Wall -c -fmessage-length=0 -fno-builtin -ffunction-sections -fdata-sections -fmerge-constants -fmacro-prefix-map="../src/"=. -mcpu=cortex-m3 -mthumb -fstack-usage -specs=redlib.specs -MMD -MP -MF"src/SL2_TP1y2.d" -MT"src/SL2_TP1y2.o" -MT"src/SL2_TP1y2.d" -o "src/SL2_TP1y2.o" "../src/SL2_TP1y2.c"
Finished building: ../src/SL2_TP1y2.c
 
Building target: SL2_TP1y2.axf
Invoking: MCU Linker
arm-none-eabi-gcc -nostdlib -L"C:\Users\valen\Documents\MCUXpressoIDE_11.3.0_5222\workspace\lpc_board_nxp_lpcxpresso_1769\Debug" -L"C:\Users\valen\Documents\MCUXpressoIDE_11.3.0_5222\workspace\lpc_chip_175x_6x\Debug" -Xlinker -Map="SL2_TP1y2.map" -Xlinker --cref -Xlinker --gc-sections -Xlinker -print-memory-usage -mcpu=cortex-m3 -mthumb -T "SL2_TP1y2_Debug.ld" -o "SL2_TP1y2.axf"  ./src/GPIO_setup.o ./src/SL2_TP1y2.o ./src/cr_startup_lpc175x_6x.o ./src/crp.o ./src/sysinit.o   -llpc_board_nxp_lpcxpresso_1769 -llpc_chip_175x_6x
Memory region         Used Size  Region Size  %age Used
       MFlash512:        4656 B       512 KB      0.89%
        RamLoc32:           8 B        32 KB      0.02%
        RamAHB32:          0 GB        32 KB      0.00%
Finished building target: SL2_TP1y2.axf
 
make --no-print-directory post-build
Performing post-build steps
arm-none-eabi-size "SL2_TP1y2.axf"; # arm-none-eabi-objcopy -v -O binary "SL2_TP1y2.axf" "SL2_TP1y2.bin" ; # checksum -p LPC1769 -d "SL2_TP1y2.bin";
   text	   data	    bss	    dec	    hex	filename
   4656	      0	      8	   4664	   1238	SL2_TP1y2.axf
 

10:37:45 Build Finished. 0 errors, 0 warnings. (took 3s.254ms)

