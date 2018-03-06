# Micro-and-back-end-247
There are Microcontroler and Backend 247

![alt text](https://github.com/stefanusj/Weather247/blob/master/app/src/main/res/mipmap-xxxhdpi/ic_launcher.png "Logo Application")

## Introduction 

Microcontroler and Backend Version of Weather247 App, this project was made by 
- [Noel](https://github.com/nokano)
- Bonus Bon Jofri Girsang
- [Dita](https://github.com/Ditadwihapsari)
- Rara Priska Yuniar

------------------------------------------------
This app using Arduino Software, reference [here](https://www.arduino.cc/reference/en/)

This BackEnd using php


## Library 
NodeMcu and Sensor Bmp180 and Dht11/22 Library

- Esp8266 Library,reference [here](http://arduino-esp8266.readthedocs.io/en/latest/esp8266wifi/readme.html)
- Adafruit_BMP085, reference [here](https://www.arduinolibraries.info/libraries/adafruit-bmp085-library)
- Adafruit,reference [here](https://learn.adafruit.com/adafruit-all-about-arduino-libraries-install-use?view=all)

## Configuration

#### Microcontroler 

using NodeMcu, Bmp180 using SCD D1, SDA D2 vin 3v, Dht11/22 using D3 and 3v

#### Backend
using php in Backend, there is a json file when client request to weather_detail.php client give parameter date and duration time, duration time like 5 minute 15 minute
to get data detail in minute and client can request data now without give any parameter. When client request to weather, client didn't give any parameter
client can get data averange temperture, humidity and preassure last 5 day, now ,and prediction. The prediction data get from averange 3 day data with same minute.

#### Fuzzy
Using php to create fuzzy, using mamdani fuzzy and using centroid as fuzzification, fuzzy must give 3 input data, there are temperature data, humidiy data, and preassure data.
Fuzzy can mapping output to Rainy,Sunny, and Cloudy.

#### Sql Database
Using Sql Database to save data humidity,temperature, preassure from NodeMcu and weather prediction from fuzzy.

