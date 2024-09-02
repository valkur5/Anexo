# Este archivo Batch se encarga de compilar el archivo remoto de programacion
# Utilizando el MCUXpresso IDE
echo Ejecutando MCUXpresso IDE, Esto puede tardar un momento
#Compila el objetivo
/usr/local/mcuxpressoide-11.10.0_3148/ide/mcuxpressoide -nosplash --launcher.suppressErrors -application org.eclipse.cdt.managedbuilder.core.headlessbuild -data "/home/valkur/Documentos/Linux backup/mcuworkspace" -importAll "/home/valkur/Documentos/Linux backup/mcuworkspace" -build SL2_TP1y2/Debug