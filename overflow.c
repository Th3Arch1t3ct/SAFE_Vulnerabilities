#include <stdio.h>

/*
 * This is a capture the flag competition-style challenge. 
 * The objective is to overflow the buffer and jump to the win function
 */

void win(){
    system("/bin/sh");
}

int check(char * buffer){
    if(buffer[0] == '0'){
        return 1;
    }
    return 0;
}

int main(int argc, char** argv){
    char buffer[32];
    printf("Can you figure out how to overflow the buffer?? (y/n)\n");
    gets(buffer);
    check(buffer);
    return 0;
}