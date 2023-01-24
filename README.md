# Noten-App für DGN

![Bootstrap](https://img.shields.io/badge/bootstrap-%23563D7C.svg?style=for-the-badge&logo=bootstrap&logoColor=white)
![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white)
![JavaScript](https://img.shields.io/badge/javascript-%23323330.svg?style=for-the-badge&logo=javascript&logoColor=%23F7DF1E)
![CSS3](https://img.shields.io/badge/css3-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white)
![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
![Apache](https://img.shields.io/badge/apache-%23D42029.svg?style=for-the-badge&logo=apache&logoColor=white)

> ❗ Diese App ist nicht offiziell vom dem Domgymnaisum Naumburg entwickelt wurden. Die App steht in keinerlei Verbindung mit dem Domgymnasium Naumburg oder dem Schulträger Burgenlandkreis.

> ❗ Gegenwärtig ist die App nur für die Noten der 10. Klassenstufe kompatibel. Gerne kannst du dieses Repo forken und die Notenübersicht für deine eigene Klassenstufe implementieren.

Diese App ermöglicht den einfacheren Zugriff auf die Notenübersicht für die Schüler des Domgymnasium Naumburgs. Endlich ist es möglich, seine Noten auch (richtig formatiert) am Smartphone anzusehen. Außerdem gibt es die Möglichkeit, einen Darkmode zu aktivieren (ist ganz nice für die Augen hab ich gehört). Die Nutzung der App ist vollkommen kostenlos. Die Anmeldedaten werden nur lokal auf deinem Gerät gespeichert und nicht auf dem Server der App. Außerdem wird dein Passwort verschlüsselt und kann nur mit einer PIN wieder entschlüsselt werden. Solltest du der ganzen Sache trotzdem nicht vertrauen, kannst du die App natürlich auch auf deinem eigenen Server installieren.

---

## Technische Umsetzung
Wegen Bildungsauftrag und so versuche ich euch mal zu erklären, wie diese App so ungefähr funktioniert und an eure Noten kommt.
Eigentlich kann man alles in einem Satz erklären: Der Server der App ist ein Proxy zwischen dem Schüler und der Schulwebsite. Nach dem Anmelden parset er die Noten in eine angenehmere Übersicht. Naja, da es jetzt eh zwei Sätze waren, kann ich auch ins Detail gehen und alles nochmal für Leute erklären, welche ein Sozialleben haben und nicht 24/7 vor ihrem PC sitzen und irgend nen Müll programmieren... Wenn du dich bei dieser App anmeldest, werden deine Anmeldedaten an den Server der App gesendet. Sobald die Daten am Server angekommen sind, versucht dieser sich mit deinen Anmeldedaten auf der Schulwebsite anzumelden. Stell dir das vor, wie ein Roboter der in das Anmelde-Formular deine Anmeldedaten einträgt und dieses dann absendet. Als Antwort erhält der App-Server von der Schulwebsite einen Sitzungs-Token. Das ist sowas, wie ein Passwort, mit dem sich der App-Server für dich anmelden kann. Danach öffnet der App-Server die Noten-Seite der Schule und schickt den Sitzungs-Token mit. Somit denkt die Schulseite, dass du gerade auf deine Noten zugreifst. Der App-Server kopiert sich danach deine Notentabelle und versucht diese auszuwerten. Mit den ausgewerteten Daten werden dann deine Noten in der App angezeigt. Keine Sorge, deine Noten werden zu keinem Zeitpunkt permanent auf dem Server gespeichert und außer dir hat keiner die Möglichkeit deine Noten auszulesen. Gerne kannst du alles selbst im Quellcode nachlesen und versuchen nachzuvollziehen, was ich hier erzählt habe.

---

## Installation

Es gibt drei Möglichkeiten die App zu installieren. Ich gehe hier auf jede dieser Möglichkeiten ein und zeige dir, auf welchen Geräten was am besten läuft und wo nicht.

> **Warum gibt es die App nicht im App Store oder Play Store?** Da diese App nur eine sehr kleine Zielgruppe anspricht, sind die Kosten für die Veröffentlichung in den Stores zu teuer. Außerdem besteht eine hohe Chance, dass die App abgelehnt wird, da diese zu irrelevant für die Allgemeinheit ist.

#### 1. Installation der `.apk`-Datei
![Android](https://img.shields.io/badge/Android-3DDC84?style=for-the-badge&logo=android&logoColor=white)

Du kannst die [Releases-Seite](https://github.com/Kurtiii/dgn-app/releases) besuchen und die neuste Version der App als `.apk`-Datei herunterladen und auf deinem Android-Handy installieren indem du die Datei öffnest. Möglicherweise musst du erst "Installation aus unbekannten Quellen" in deinen Einstellungen aktivieren.

#### 2. Installation als Progressive Web App
![Android](https://img.shields.io/badge/Android-3DDC84?style=for-the-badge&logo=android&logoColor=white)
![iOS](https://img.shields.io/badge/iOS-000000?style=for-the-badge&logo=ios&logoColor=white)

Du kannst [dgn-app.kurtiii.de/install](https://dgn-app.kurtiii.de/install) öffnen und den Anweisungen auf dieser Seite folgen. Somit kannst du die App ohne den Download einer Datei installieren. Bitte beachte, dass nicht alle Browser dieses Feature unterstützen. Verwende auf Android am besten Google Chrome und auf iOS Safari.

#### 3. Ohne Installation -> Nutzung im Browser

![Android](https://img.shields.io/badge/Android-3DDC84?style=for-the-badge&logo=android&logoColor=white)
![Windows](https://img.shields.io/badge/Windows-0078D6?style=for-the-badge&logo=windows&logoColor=white)
![iOS](https://img.shields.io/badge/iOS-000000?style=for-the-badge&logo=ios&logoColor=white)
![macOS](https://img.shields.io/badge/mac%20os-000000?style=for-the-badge&logo=macos&logoColor=F0F0F0)

Natürlich kannst du die App auch auf deinem Laptop im Browser nutzen. Das geht selbstverständlich auch auf deinem Handy, wenn du nichts installieren kannst/darfst. I mean es ist eine PWA, warum sollte es nicht gehen? Besuche dafür einfach [dgn-app.kurtiii.de/web](https://dgn-app.kurtiii.de/web) und melde dich an.
