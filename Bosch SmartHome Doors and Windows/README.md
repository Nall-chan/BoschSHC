[![SDK](https://img.shields.io/badge/Symcon-PHPModul-red.svg)](https://www.symcon.de/service/dokumentation/entwicklerbereich/sdk-tools/sdk-php/)
[![Version](https://img.shields.io/badge/Modul%20Version-1.20-blue.svg)](https://community.symcon.de/t/modul-bosch-smarthome-system-beta/138205)
[![Version](https://img.shields.io/badge/Symcon%20Version-8.1%20%3E-green.svg)](https://www.symcon.de/de/service/dokumentation/installation/migrationen/v80-v81-q3-2025/)   
[![License](https://img.shields.io/badge/License-CC%20BY--NC--SA%204.0-green.svg)](https://creativecommons.org/licenses/by-nc-sa/4.0/)
[![Check Style](https://github.com/Nall-chan/BoschSHC/workflows/Check%20Style/badge.svg)](https://github.com/Nall-chan/BoschSHC/actions)
[![Run Tests](https://github.com/Nall-chan/BoschSHC/workflows/Run%20Tests/badge.svg)](https://github.com/Nall-chan/BoschSHC/actions)  
[![Spenden](https://www.paypalobjects.com/de_DE/DE/i/btn/btn_donate_SM.gif)](#2-spenden)[![Wunschliste](https://img.shields.io/badge/Wunschliste-Amazon-ff69fb.svg)](#2-spenden)  

# Bosch SmartHome Türen und Fenster <!-- omit in toc -->
Anzeige der Türen und Fensterzustände

### Inhaltsverzeichnis <!-- omit in toc -->

- [3. Software-Installation](#3-software-installation)
- [4. Einrichten der Instanzen in IP-Symcon](#4-einrichten-der-instanzen-in-ip-symcon)
- [5. Statusvariablen](#5-statusvariablen)
- [6. PHP-Funktionsreferenz](#6-php-funktionsreferenz)
- [7. Aktionen](#7-aktionen)
- [8. Anhang](#8-anhang)
  - [1. Changelog](#1-changelog)
  - [2. Spenden](#2-spenden)
- [9. Lizenz](#9-lizenz)

### 1. Funktionsumfang

* Anzeige der Türen und Fensterzustände.

### 2. Voraussetzungen

* IP-Symcon ab Version 8.1
* Bosch SmartHome Controller I oder II.

## 3. Software-Installation

* Dieses Modul ist Bestandteil der [Bosch SmartHome-Library](../README.md#4-software-installation).  

## 4. Einrichten der Instanzen in IP-Symcon

 Unter 'Instanz hinzufügen' kann das 'Bosch SmartHome Türen und Fenster'-Modul mithilfe des Schnellfilters gefunden werden.  
 - Die Einrichtung sollte durch das anlegen einer [Bosch SmartHome Konfigurator](../Bosch%20SmartHome%20Configurator/README.md)-Instanz erfolgen.   
 - Weitere Informationen zum Hinzufügen von Instanzen in der [Dokumentation der Instanzen](https://www.symcon.de/service/dokumentation/konzepte/instanzen/#Instanz_hinzufügen)  

### Konfigurationsseite: <!-- omit in toc -->

Keine Konfiguration nötig.  

## 5. Statusvariablen

| Name            | Typ     | Profil | Beschreibung           |
| --------------- | ------- | ------ | ---------------------- |
| allDoors        | integer |        | alle Türen             |
| openDoors       | integer |        | offene Türen           |
| bypassedDoors   | integer |        | abgeschaltete Türen    |
| unknownDoors    | integer |        | unbekannte Türen       |
| allWindows      | integer |        | alle Fenster           |
| openWindows     | integer |        | offene Fenster         |
| bypassedWindows | integer |        | unbekannte Fenster     |
| unknownWindows  | integer |        | abgeschaltete Fenster  |
| allOthers       | integer |        | alle Sonstige          |
| openOthers      | integer |        | offene Sonstige        |
| bypassedOthers  | integer |        | unbekannte Sonstige    |
| unknownOthers   | integer |        | abgeschaltete Sonstige |

## 6. PHP-Funktionsreferenz

```php
bool BSHC_RequestState(integer $InstanzID);
```
Aktuellen Status auslesen.  

--- 

```php
array BSHC_GetStates(integer $InstanzID);
```
Gespeicherte Zustände auslesen.  

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