/*
===============================================================================
 Name        : SL2_TP1y2.c
 Author      : $(author)
 Version     :
 Copyright   : $(copyright)
 Description : main definition
===============================================================================
*/

#if defined (__USE_LPCOPEN)
#if defined(NO_BOARD_LIB)
#include "chip.h"
#else
#include "board.h"
#endif
#endif

#include <cr_section_macros.h>

// TODO: insert other include files here
#include "GPIO_setup.h"
#include "stdio.h"
#include "stdbool.h"
// TODO: insert other definitions and declarations here

int main(void) {
Bool presencia;
Bool Fc_c;
Bool Fc_a;
#if defined (__USE_LPCOPEN)
    // Read clock settings and update SystemCoreClock variable
    SystemCoreClockUpdate();
#if !defined(NO_BOARD_LIB)
    // Set up and initialize all required blocks and
    // functions related to the board hardware
    Board_Init();
    // Set the LED to the state of "On"
    Board_LED_Set(0, true);
#endif
#endif

    // TODO: insert code here
    setup_GPIO(2,10,1); //led1
    //Cuando se enciende el Led 1, significa que se está abriendo la puerta//
    //Cuando el Led 1 está apagado, significa que se está cerrando la puerta//
    setup_GPIO(2,8,1);//led2
    //Cuando se enciende significa que el motor de la puerta está encendido//
    //Caso contrario, el motor de la puerta está apagado//

    setup_GPIO(2,7,0);//Sensor de presencia//
    setup_GPIO(2,6,0);//Final de carrera abierto
    setup_GPIO(2,5,0);//Final de carrera cerrado

    //Establecemos lo siguiente para definir que será nuestro estado inicial:
    Fc_c=TRUE;
    GPIO_off(2,10);
    GPIO_off(2,8);

    // Force the counter to be placed into memory
    volatile static int i = 0 ;
    // Enter an infinite loop, just incrementing a counter
    while(1) {
        i++ ;
        do{
        presencia=GPIO_read(2,7); //Lee el sensor de presencia
        }while(presencia==FALSE); //lo lee hasta que detecta algo

        if (presencia==TRUE && Fc_c==TRUE){

        	GPIO_on(2,10);//Se enciende el Led 1
            GPIO_on(2,8);//Se enciende el motor (led 2)

            for(i=0;i<3000000;i++);//Delay

            do{
            Fc_a=GPIO_read(2,6);//Se mantiene hasta que llega al final de carrera abieto
            }while(Fc_a==0);

            GPIO_off(2,8); //se apaga el motor
           for(i=0;i<3000000;i++);
        }

        do{
        presencia=GPIO_read(2,7);//se mantiene como está hasta que deja de detectar presencia
        }while(presencia==TRUE);

        if(presencia==FALSE && Fc_a==TRUE){
        	Fc_a=0;
            for(i=0;i<3000000;i++){}
           	GPIO_on(2,8);//se enciende el motor
           	GPIO_off(2,10);//se apaga el led de abierto, indicando que se está cerrando
           	do{
           	Fc_c=GPIO_read(2,5);//Se mantiene hasta que llega al final de carrera cerrado
           	}while(Fc_c==0);

           	GPIO_off(2,8);
           	//apaga el motor (led 2)
           	//El led 1 se mantiene apagado ya que está cerrada la puerta
           	for(i=0;i<3000000;i++);
            }


        // "Dummy" NOP to allow source level single
        // stepping of tight while() loop
        __asm volatile ("nop");
    }
    return 0 ;
}