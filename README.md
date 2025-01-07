# DevOps
### Security Team and CI/CD Pipeline
The primary objective of the Security Team is to establish automated security response mechanisms and improve overall system resilience. This entails:
1. **Developing Efficient Security Strategies**: Creating robust methods for handling security incidents promptly and effectively.
2. **Integrating Advanced Tools**: Leveraging cutting-edge technologies and tools to enhance threat detection and mitigation.
3. **Collaborating with Other Teams**: Working closely with development, operations, and QA teams to ensure seamless integration of security measures into the CI/CD pipeline.
4. 
By embedding security into the CI/CD pipeline, the team aims to foster a proactive and fortified approach to cybersecurity.

The website is built using the Laravel framework, and the CI/CD pipeline is managed by Jenkins.

<p align="center"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></p>
<p align="center"><img src="https://www.jenkins.io/images/logos/jenkins/jenkins.svg" width="150"  alt="Jenkins Logo"></p>

---
# The project's dependencies
The project dependencies and their respective versions are specified, and the Dockerfile includes these dependencies.
- **Composer**: `2.6.5`
- **APINE**: `3.20`
- **PHP**: `8.3`
- **MariaDB**: `10.6`
- **PhpMyAdmin**: `latest`
- **Redis**: `7.2`
- **Node.js**: `18-apline`
- **Mailhog**: `latest`
# Installation
This repository provides a Docker Compose configuration for quickly setting up a Laravel project. This setup is intended for development and testing purposes only and is not recommended for production environments.

Credits: This approach is inspired by both the [official Docker instructions](https://docs.docker.com/compose/) and the [official Jenkins instructions](https://www.jenkins.io/doc/book/installing/docker/). It has been adapted to leverage Docker Compose via a `docker-compose.yml` file, streamlining the steps required to set up both Laravel and Jenkins efficiently.
## Step 1
Install Docker locally
### for Linux 
**Arch-based** (Manajaro)
```
sudo pacman -S docker
sudo systemctl start docker
sudo systemctl enable docker
sudo usermod -aG docker $USER
```
**Debian-based**  (Ubuntu)
```
sudo apt-get update
sudo apt-get install docker.io
sudo systemctl start docker
sudo systemctl enable docker
sudo usermod -aG docker $USER
```
### for Windows
1. Download Docker Desktop from the [official Docker website](https://www.docker.com/get-started/).
2. Launch Docker Desktop.
3. Verify Installation: Open a command prompt or PowerShell and run:
```
docker --version
```
## Step 2
Clone this repository or download it's contents.
## Step 3
Open a terminal window in the same directory where the `docker-compose.yml` from this repository is located. Build the Docker image
```
docker-compose build  
```
## Step 3
Start the project
```
docker-compose up -d
```
## Step 4
Open Jenkins by going to: [http://localhost:80/](http://localhost:80/) .

## Step 5
If you wish to stop Jenkins and get back to it later, run:
```
docker-compose stop
```
If you wish to start again later, just run the same command from Step 3.

---
## Install Jenkins using Docker Compose

## Step 1
Open a terminal window in the same directory where the `install-jenkins-docker/Dockerfile` from this repository is located. Build the Jenkins Docker image:

```
docker build -t my-jenkins .
```
## Step 2

Start Jenkins:
```
docker compose up -d
```

## Step 3

Open Jenkins by going to: [http://localhost:8080/](http://localhost:8080/) and finish the installation process.

## Step 4

If you wish to stop Jenkins and get back to it later, run:

```
docker compose down
```

If you wish to start Jenkins again later, just run the same comand from Step 2.

## Removing project
Once you are done playing with Jenkins maybe it is time to clean things up.

Run the following command to terminate project and to remove all volumes and images used:
```
docker compose down --volumes --rmi all 
```
