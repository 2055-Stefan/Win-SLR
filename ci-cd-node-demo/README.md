# CI/CD Node.js Demo – Dokumentation

Dieses Projekt demonstriert den vollständigen Aufbau einer modernen CI/CD-Pipeline für eine
Node.js-Anwendung mithilfe von **Docker**, **Docker Compose** und **GitHub Actions**.  
Es wurde als eigenständiges Beispielprojekt innerhalb des Repositories *SLR* umgesetzt.

---

## Inhaltsverzeichnis
1. Überblick
2. Projektstruktur
3. Voraussetzungen
4. Lokales Setup & Ausführung
5. Docker & Multi-Stage Dockerfile
6. docker-compose Setup
7. CI/CD-Pipeline (GitHub Actions)
8. Deployment-Ablauf
9. Troubleshooting
10. Fazit

---

## 1. Überblick

Das Projekt zeigt, wie man eine minimalistische Node.js-Express Anwendung:

- containerisiert,
- mit einem Multi-Stage Dockerfile optimiert,
- über docker-compose lokal startet,
- und mithilfe von GitHub Actions automatisch baut und deployed.

Die CI/CD-Pipeline erstellt automatisch Docker-Images und veröffentlicht sie auf Docker Hub.

---

## 2. Projektstruktur

SLR/
│
├─ ci-cd-node-demo/
│ ├─ src/
│ │ └─ index.js # Node.js Express Server
│ │
│ ├─ package.json # Dependencies & Scripts
│ ├─ Dockerfile # Multi-Stage Build (Builder + Runtime)
│ ├─ docker-compose.yml # Lokale Startumgebung
│
└─ .github/
└─ workflows/
└─ ci-cd.yml # CI/CD Workflow


### Kurzbeschreibung

| Datei / Ordner | Zweck |
|----------------|-------|
| `src/` | Enthält die Serverlogik |
| `Dockerfile` | Multi-Stage Docker Build |
| `docker-compose.yml` | Einfacher lokaler Start |
| `.github/workflows/ci-cd.yml` | Automatischer Build & Deployment-Prozess |

---

## 3. Voraussetzungen

### Lokale Software
- Node.js 22+
- Docker Desktop oder Docker Engine
- Git

### Accounts
- GitHub
- Docker Hub (für Deployment)

---

## 4. Lokales Setup & Ausführung

### 4.1 Abhängigkeiten installieren
cd ci-cd-node-demo
npm install


### 4.2 Server lokal starten

npm start

Server läuft auf:
http://localhost:3000


---

## 5. Docker & Multi-Stage Dockerfile

Das verwendete Dockerfile ist ein **Multi-Stage Build**, um ein schlankes und sicheres Runtime-Image zu erzeugen.

### Build Stage
- Installiert Dependencies
- Kopiert Projektdateien
- Enthält nur Tools zum Bauen

### Runtime Stage
- Sehr kleines Node Alpine Image
- Enthält *nur* die fertige Anwendung
- Keine Entwicklungswerkzeuge
- Reduziert Angriffsfläche und Image-Größe

Vorteile:
- kleineres Bild
- sauberer Build-Prozess
- optimiert für Deployment

---

## 6. docker-compose Setup

`docker-compose.yml` bietet ein einfaches Starten des Containers:

docker-compose up --build


Der Container startet dann unter:
http://localhost:3000


---

## 7. CI/CD-Pipeline (GitHub Actions)

Die Pipeline läuft bei jedem Push in den `main` Branch.

### Aufgaben der Pipeline:

#### Build-Job:
- Checkt Code aus
- Installiert Node Dependencies
- Führt einen Test aus
- Bereitet das Deployment vor

#### Deploy-Job:
- Loggt sich in Docker Hub ein
- Baut ein Docker-Image
- Pushes das Image auf Docker Hub

Der Pipeline-Status ist im GitHub Actions Tab sichtbar.

---

## 8. Deployment-Ablauf

Der Deploymentprozess funktioniert folgendermaßen:

1. Push in den `main` Branch  
2. CI führt Build, Installation, Test aus  
3. CI baut ein Docker-Image  
4. CI überträgt das Image auf Docker Hub  
5. Docker Hub enthält immer das aktuelle Produktions-Image

Benötigte Secrets:

| Name | Inhalt |
|------|--------|
| `DOCKERHUB_USER` | Docker Hub Benutzername |
| `DOCKERHUB_TOKEN` | Docker Hub Access Token |

Diese Secrets werden nicht versioniert und liegen verschlüsselt im GitHub Repo.

---

## 9. Troubleshooting

### Container startet nicht
→ Ports prüfen  
→ Fehler in `index.js` anzeigen lassen  
→ `docker-compose logs` ansehen

### Workflow schlägt fehl
→ Actions-Tab öffnen  
→ Fehlermeldung prüfen  
→ Oft fehlen Secrets

### Docker Hub Login schlägt fehl
→ Token neu generieren  
→ Token „Read/Write“ auswählen  
→ Secrets exakt schreiben (`DOCKERHUB_USER`)

---

## 10. Fazit

Dieses Projekt zeigt, wie eine moderne CI/CD-Architektur aufgebaut wird:

- saubere Ordnerstruktur  
- containerisierte Anwendung  
- Multi-Stage Dockerfile  
- automatisierter Deployment-Prozess  
- Docker-Image-Veröffentlichung auf Docker Hub  

Die Struktur eignet sich ideal als Grundlage für größere Projekte oder produktionsnahe Pipelines.
