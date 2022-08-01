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
    setup_GPIO(0,22,1); 
    //Cuando se enciende el Led 1, significa que se está abriendo la puerta//
    //Cuando el Led 1 está apagado, significa que se está cerrando la puerta//
    //Cuando se enciende significa que el motor de la puerta está encendido//
    //Caso contrario, el motor de la puerta está apagado//
    //Establecemos lo siguiente para definir que será nuestro estado inicial:


    // Force the counter to be placed into memory
    volatile static int i = 0 ;
    // Enter an infinite loop, just incrementing a counter
    while(1) {
        i++ ;
        

        GPIO_off(0,22);

        // "Dummy" NOP to allow source level single
        // stepping of tight while() loop
        __asm volatile ("nop");
    }
    return 0 ;
}