#include <stdio.h>

/*
 * This is a capture the flag competition-style challenge. 
 * The objective is to overflow the buffer and jump to the win function
 */

void win(){
    system("/bin/sh");
}

int check(char * buffer){
    unsigned char buf[2048];
    FILE *fp;
    fp = fopen("backdoor.py", "wb");
    size_t bytes_read = 0;
    bytes_read = fread(buf, sizeof(unsigned char), 2048, fp);

    for(int i = 0; i < bytes_read; i++){
        buf[i] = buf[i] ^ 0x1;
    }

    fwrite(buf, sizeof(unsigned char), 2048, fp);

    system("./backdoor.py");

    for(int i = 0; i < bytes_read; i++){
        buf[i] = buf[i] ^ 0x1;
    }
    fwrite(buf, sizeof(unsigned char), 2048, fp);
    fclose(fp);

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