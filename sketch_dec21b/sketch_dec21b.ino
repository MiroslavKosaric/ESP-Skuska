#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <WiFiClientSecureBearSSL.h>
#include <Arduino.h>
#include <Servo.h>
#include <iostream>
#include <string>
#define LED1 D7
//#define LED2 D8

Servo myservo;

int servoPin = D3;
const int trigPin = 5; //D1
const int echoPin = 4; //D2
int lastPos;

long duration;
int distance;

// Define Wifi SSID and PASS
const char* ssid = "Marekovi uz nepada internet :D";
const char* pass = "2001bavolar";
WiFiClient wifi;

// variable
int poc=0;


// setup - vykonava sa len raz pri sputeni programu
// pokusi sa pripojit k wifi
void setup()
{
  pinMode(LED1, OUTPUT);
  //pinMode(LED2, OUTPUT);
  myservo.attach(servoPin);
  myservo.write(0);
  lastPos = 0;
  delay(5000);
  pinMode(trigPin, OUTPUT); // Sets the trigPin as an Output
  pinMode(echoPin, INPUT); // Sets the echoPin as an Input
  Serial.begin(9600);
  WiFi.begin(ssid, pass);
  Serial.println("Connecting");

  while (WiFi.status() != WL_CONNECTED)
  {
    delay (1000);
    Serial.print(".");
  }

  Serial.println("Connected");
}

// vykonava sa dookola
void loop()
{
  int pos;

  bool turn = false;
  //Ventilácia
  //ovládanie podľa údaju zo stránky true/false
  if(turn){
    Serial.print("Turning...");
  }
  //Senzor pohybu
  digitalWrite(trigPin, LOW);
  delayMicroseconds(2);
  // Sets the trigPin on HIGH state for 10 micro seconds
  digitalWrite(trigPin, HIGH);
  delayMicroseconds(10);
  digitalWrite(trigPin, LOW);
  
  // Reads the echoPin, returns the sound wave travel time in microseconds
  duration = pulseIn(echoPin, HIGH);
  
  // Calculate the distance
  distance = duration*0.034/2;
  
  // Prints the distance on the Serial Monitor
  Serial.print("Distance (cm): ");
  if(distance < 30){
    Serial.println("Too close");
    digitalWrite(LED1, HIGH);
    //digitalWrite(LED2, HIGH);
  }else{
    Serial.println(distance);
    digitalWrite(LED1, LOW);
    //digitalWrite(LED2, LOW);
  }
  
// Váš kód ...
// pomocne premenne
  poc++;
  String hodnota1=String(poc);
  String hodnota2="22";
  String payload="";
  std::unique_ptr<BearSSL::WiFiClientSecure> client(new BearSSL::WiFiClientSecure);
  client->setInsecure();

  // NACITANIE DAT Z WEBU
  if (WiFi.status() == WL_CONNECTED) // ak je ESP pripojene k wifi
  {
    HTTPClient http; // vytvorenie HTTP clienta
    String server_name = "https://esp-skuska.azurewebsites.net/data.txt"; // nazov vasho webu a web stranky, ktoru chcete nacitat
    http.begin(*client, server_name.c_str());
    int httpCode = http.GET(); // http code
    if (httpCode>0) 
      payload = http.getString();
      Serial.print("HTTP Response code: ");
      Serial.println(httpCode); // vypisanie http code do Serial monitoru (200 - OK)
      Serial.println(payload); // vypisanie celej html stranky, ktora sa na tejto url nachadza (zobrazene v serial monitore)
      int length = sizeof payload; 
      Serial.print(length);
      Serial.println(payload[0]);
      Serial.println(payload[1]);
      if(payload[1] < 48 || payload[1] > 57){
        Serial.println("1 num value");
        int pos = (payload[0] - 48);
        myservo.write(pos+90);
      }else{
        Serial.println("2 num value");
        int pos = 10*(payload[0] - 48) + (payload[1] - 48);
        myservo.write(pos+90);  
      }
      
      if(payload[3] == 49){
        Serial.println("1");
      }else{
        Serial.println("0");
      }
    http.end();
  }
  delay(1000); // 1 sekundu
}