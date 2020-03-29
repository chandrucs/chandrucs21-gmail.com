#!/usr/bin/env python

import RPi.GPIO as GPIO
GPIO.setwarnings(False)
from mfrc522 import SimpleMFRC522
reader = SimpleMFRC522()

id, text = reader.read()
print(id)
print(text)
GPIO.cleanup()   
