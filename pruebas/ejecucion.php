<?=
	shell_exec('compilar.bat auxiliar.c');
	while(!file_exists("resultado.txt"))sleep(10);
    
?>