#!/usr/bin/env python
#Libraries

import RPi.GPIO as GPIO
import time
import os
i=1
#GPIO Mode (BOARD / BCM)
GPIO.setmode(GPIO.BOARD)
GPIO.setwarnings(False)
#set GPIO Pins
GPIO_TRIGGER = 7
GPIO_ECHO = 11
GPIO_ECHO1 = 15
GPIO_ECHO2 = 13

s=1

#set GPIO direction (IN / OUT)
GPIO.setup(GPIO_TRIGGER, GPIO.OUT)
GPIO.setup(GPIO_ECHO, GPIO.IN)
GPIO.setup(GPIO_ECHO1, GPIO.IN)
GPIO.setup(GPIO_ECHO2, GPIO.IN)

def distance():
    # set Trigger to HIGH
    GPIO.output(GPIO_TRIGGER, True)
 
    # set Trigger after 0.01ms to LOW
    time.sleep(0.00001)
    GPIO.output(GPIO_TRIGGER, False)
 
    StartTime = time.time()
    StopTime = time.time()
 
    # save StartTime
    while GPIO.input(GPIO_ECHO) == 0:
        StartTime = time.time()
 
    # save time of arrival
    while GPIO.input(GPIO_ECHO) == 1:
        StopTime = time.time()
 
    # time difference between start and arrival
    TimeElapsed = StopTime - StartTime
    # multiply with the sonic speed (34300 cm/s)
    # and divide by 2, because there and back
    distance = (TimeElapsed * 34300) / 2
 
    return distance
def distance1():
    # set Trigger to HIGH
    GPIO.output(GPIO_TRIGGER, True)
 
    # set Trigger after 0.01ms to LOW
    time.sleep(0.00001)
    GPIO.output(GPIO_TRIGGER, False)
 
    StartTime = time.time()
    StopTime = time.time()
 
    # save StartTime
    while GPIO.input(GPIO_ECHO1) == 0:
        StartTime = time.time()
 
    # save time of arrival
    while GPIO.input(GPIO_ECHO1) == 1:
        StopTime = time.time()
 
    # time difference between start and arrival
    TimeElapsed = StopTime - StartTime
    # multiply with the sonic speed (34300 cm/s)
    # and divide by 2, because there and back
    distance1 = (TimeElapsed * 34300) / 2
 
    return distance1

def distance2():
    # set Trigger to HIGH
    GPIO.output(GPIO_TRIGGER, True)
 
    # set Trigger after 0.01ms to LOW
    time.sleep(0.00001)
    GPIO.output(GPIO_TRIGGER, False)
 
    StartTime = time.time()
    StopTime = time.time()
 
    # save StartTime
    while GPIO.input(GPIO_ECHO2) == 0:
        StartTime = time.time()
 
    # save time of arrival
    while GPIO.input(GPIO_ECHO2) == 1:
        StopTime = time.time()
 
    # time difference between start and arrival
    TimeElapsed = StopTime - StartTime
    # multiply with the sonic speed (34300 cm/s)
    # and divide by 2, because there and back
    distance2 = (TimeElapsed * 34300) / 2
 
    return distance2

if __name__ == '__main__':
    try:
        
        while i<100:
            i=i+1
            dist2=distance2()
            print ("Measured Distance3 = %.1f cm" % dist2)
            if(dist2<20):
                os.system("python motor4.py")
                            
            dist = distance1()
            distc=distance()
            
            print ("Measured Distance1 = %.1f cm" % dist)
            if dist<20.0 and s==1 and distc>=30:
                os.system("python motor2.py")
                s=0
            dist1=distance()
            print ("Measured Distance2 = %.1f cm" % dist1)
            if dist1>5 and dist1<20:
                os.system("python motor.py")
                s=1
                from mfrc522 import SimpleMFRC522
                reader = SimpleMFRC522()
                id, text = reader.read()
                print(id)
                if(id==870121418549):
                    print("valid")
                    os.system("python motor3.py")
                  
                else:
                    print("invalid")

                #os.system("python Read.py")          
            time.sleep(1)
            
 
        # Reset by pressing CTRL + C
    except KeyboardInterrupt:
        print("Measurement stopped by User")
        GPIO.cleanup()

