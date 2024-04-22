

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

    // Entradas de la placa
    setup_GPIO(2,12,0);
    setup_GPIO(2,11,0);
    setup_GPIO(2,10,0);
    setup_GPIO(2,8,0);

    //Salidas de la placa
    setup_GPIO(2,7,1);
    setup_GPIO(2,6,1);
    setup_GPIO(2,5,1);
    setup_GPIO(2,4,1);

    // Force the counter to be placed into memory
    volatile static int i = 0 ;
    // Enter an infinite loop, just incrementing a counter
    while(1) {
        i++ ;

        if(GPIO_read(2,12)==true){
        	GPIO_on(2,7);
        }else {
        	GPIO_off(2,7);
        }
        if(GPIO_read(2,11)==true){
        	GPIO_on(2,6);
        }else {
        	GPIO_off(2,6);
        }
        if(GPIO_read(2,10)==true){
        	GPIO_on(2,5);
        }else {
        	GPIO_off(2,5);
        }
        if(GPIO_read(2,18)==true){
        	GPIO_on(2,4);
        }else {
        	GPIO_off(2,4);
        }

        // "Dummy" NOP to allow source level single
        // stepping of tight while() loop
        __asm volatile ("nop");
    }
    return 0 ;
}