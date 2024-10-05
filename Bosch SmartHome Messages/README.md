[![SDK](https://img.shields.io/badge/Symcon-PHPModul-red.svg)](https://www.symcon.de/service/dokumentation/entwicklerbereich/sdk-tools/sdk-php/)
[![Version](https://img.shields.io/badge/Modul%20Version-1.10-blue.svg)](https://community.symcon.de/t/modul-bosch-smarthome-system-beta/138205)
[![Version](https://img.shields.io/badge/Symcon%20Version-7.0%20%3E-green.svg)](https://www.symcon.de/service/dokumentation/installation/migrationen/v60-v61-q1-2022/)  
[![License](https://img.shields.io/badge/License-CC%20BY--NC--SA%204.0-green.svg)](https://creativecommons.org/licenses/by-nc-sa/4.0/)
[![Check Style](https://github.com/Nall-chan/BoschSHC/workflows/Check%20Style/badge.svg)](https://github.com/Nall-chan/BoschSHC/actions)
[![Run Tests](https://github.com/Nall-chan/BoschSHC/workflows/Run%20Tests/badge.svg)](https://github.com/Nall-chan/BoschSHC/actions)  
[![Spenden](https://www.paypalobjects.com/de_DE/DE/i/btn/btn_donate_SM.gif)](#2-spenden)[![Wunschliste](https://img.shields.io/badge/Wunschliste-Amazon-ff69fb.svg)](#2-spenden)  

# Bosch SmartHome Meldungen <!-- omit in toc -->
Auslesen der Meldungen / Nachrichten.  

## Inhaltsverzeichnis <!-- omit in toc -->

- [1. Funktionsumfang](#1-funktionsumfang)
  - [2. Voraussetzungen](#2-voraussetzungen)
- [3. Software-Installation](#3-software-installation)
- [4. Einrichten der Instanzen in IP-Symcon](#4-einrichten-der-instanzen-in-ip-symcon)
- [5. Statusvariablen](#5-statusvariablen)
- [6. PHP-Funktionsreferenz](#6-php-funktionsreferenz)
- [7. Aktionen](#7-aktionen)
- [8. Anhang](#8-anhang)
  - [1. Changelog](#1-changelog)
  - [2. Spenden](#2-spenden)
- [9. Lizenz](#9-lizenz)

## 1. Funktionsumfang

* Auslesen der Meldungen / Nachrichten.  
* Summenzähler nach Typ der Meldungen darstellen.  
* Ausgeben und löschen von Meldungen per PHP-Script.  

### 2. Voraussetzungen

* IP-Symcon ab Version 7.0
* Bosch SmartHome Controller I oder II.

## 3. Software-Installation

* Dieses Modul ist Bestandteil der [Bosch SmartHome-Library](../README.md#4-software-installation).  

## 4. Einrichten der Instanzen in IP-Symcon

 Unter 'Instanz hinzufügen' kann das 'Bosch SmartHome Meldungen'-Modul mithilfe des Schnellfilters gefunden werden.  
 - Die Einrichtung sollte durch das anlegen einer [Bosch SmartHome Konfigurator](../Bosch%20SmartHome%20Configurator/README.md)-Instanz erfolgen.   
 - Weitere Informationen zum Hinzufügen von Instanzen in der [Dokumentation der Instanzen](https://www.symcon.de/service/dokumentation/konzepte/instanzen/#Instanz_hinzufügen)  

### Konfigurationsseite: <!-- omit in toc -->

Keine Konfiguration nötig.  

## 5. Statusvariablen

| Name        | Typ     | Profil | Beschreibung          |
| ----------- | ------- | ------ | --------------------- |
| ERROR       | integer |        | Fehlermeldungen       |
| WARNING     | integer |        | Warnmeldungen         |
| ALARM       | integer |        | Alarmmeldungen        |
| INFORMATION | integer |        | Informationsmeldungen |
| SW_UPDATE   | integer |        | SW Updatemeldung      |

## 6. PHP-Funktionsreferenz

```php
bool BSHC_RequestState(integer $InstanzID);
```
Aktuellen Meldungen auslesen.  

---  

```php
array BSHC_ReadMessages(integer $InstanzID);
```
Gespeicherte Nachrichten auslesen.  
**Beispiel:**
```php
$ret = BSHC_ReadMessages(18075 /* Nachrichten */);
var_dump($ret);
```
**Ausgabe:**
```php
array(1) {
  ["40d346c3-07e9-4ef2-8a99-0a7f49504d51"]=>
  array(6) {
    ["messageCode"]=>
    array(2) {
      ["name"]=>
      string(19) "COMMUNICATION_ERROR"
      ["category"]=>
      string(5) "ERROR"
    }
    ["sourceType"]=>
    string(6) "DEVICE"
    ["sourceId"]=>
    string(43) "hdm:homeconnect:BOSCH-WAV28G40"
    ["sourceName"]=>
    string(13) "Waschmaschine"
    ["location"]=>
    string(6) "Keller"
    ["timestamp"]=>
    int(1724588345918)
  }
}
```
---
```php
bool BSHC_DeleteMessage(integer $InstanzID, string $MessageId);
```
Gespeicherte Nachrichten auslesen.  
**Beispiel:**
```php
BSHC_DeleteMessage(18075 /* Nachrichten */, "40d346c3-07e9-4ef2-8a99-0a7f49504d51");
```

## 7. Aktionen

Keine Aktionen verfügbar.

## 8. Anhang

### 1. Changelog

[Changelog der Library](../README.md#2-changelog)

### 2. Spenden

Die Library ist für die nicht kommerzielle Nutzung kostenlos, Schenkungen als Unterstützung für den Autor werden hier akzeptiert:  

<a href="https://www.paypal.com/donate?hosted_button_id=G2SLW2MEMQZH2" target="_blank"><img src="https://www.paypalobjects.com/de_DE/DE/i/btn/btn_donate_LG.gif" border="0" /></a>  

[![Wunschliste](https://img.shields.io/badge/Wunschliste-Amazon-ff69fb.svg)](https://www.amazon.de/hz/wishlist/ls/YU4AI9AQT9F?ref_=wl_share) 

## 9. Lizenz

  IPS-Modul:  
  [CC BY-NC-SA 4.0](https://creativecommons.org/licenses/by-nc-sa/4.0/)  