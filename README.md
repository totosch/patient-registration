# **Patient Registration App**

Este proyecto es una aplicación desarrollada en Laravel para el registro de pacientes, utilizando MySQL como base de datos. La aplicación está dockerizada para facilitar su despliegue.

---

## **Instalación y ejecución**

### **1. Clonar el repositorio**

```bash
git clone https://github.com/totosch/patient-registration.git
cd patient-registration
```

### **2. Levantar los contenedores con Docker Compose**

```bash
docker-compose up -d
```

### **3. Ejecutar las migraciones de la base de datos**

```bash
docker exec -it patient-registration-app-1 php artisan migrate
```

### **4. Probar la API**

Puedes realizar una solicitud `POST` para registrar pacientes utilizando Postman o cualquier herramienta similar.

---

## **Envío de correos**

Para ejecutar el envío de correos en la aplicación, usa el siguiente comando:

```bash
php artisan queue:work
```

Este comando se encarga de procesar los correos en la cola de Laravel.

---

## **Configuración adicional**

- Asegúrate de configurar correctamente tu archivo `.env` antes de iniciar la aplicación.
