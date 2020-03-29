import RPi.GPIO as GPIO
import time

GPIO.setmode(GPIO.BOARD)
GPIO.setwarnings(False)
GPIO.setup(18, GPIO.OUT)

p=GPIO.PWM(18,50)
p.start(7.5)


p.ChangeDutyCycle(7.5)
time.sleep(0.8)
GPIO.cleanup()




