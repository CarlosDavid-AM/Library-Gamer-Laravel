# Library Gamer 🎮

**Library Gamer** es una API RESTful desarrollada con [Laravel](https://laravel.com) para gestionar una colección personal de videojuegos. Permite registrar títulos, consultar catálogos paginados, actualizar el estado de juego y la plataforma correspondiente, así como eliminar entradas.

---

## 🚀 Características

- **Gestión completa de videojuegos (CRUD):**
  - Listado paginado de videojuegos (8 elementos por página).
  - Consulta detallada por identificador único (`id`).
  - Registro de nuevos juegos con validación de datos.
  - Actualización parcial o completa de la información.
  - Eliminación de registros.
- **Transformación de datos:** Respuestas estandarizadas mediante Eloquent API Resources (`JuegosResource`).
- **Autenticación:** Preparado con Laravel Sanctum para protección de rutas API.
- **Herramientas de testing:** Suite de pruebas configurada con [Pest PHP](https://pestphp.com).
- **Entorno moderno de Frontend:** Integración con [Tailwind CSS v4](https://tailwindcss.com) y [Vite](https://vitejs.dev).

---

## 🛠️ Tecnologías y Requisitos

### Requisitos del Sistema
- **PHP** >= 8.3 (Recomendado 8.3 o superior con extensiones `pdo`, `sqlite3` o `pdo_mysql`, `mbstring`, `openssl`).
- **Composer** >= 2.x
- **Node.js** >= 18.x & **NPM**
- **Base de datos:** SQLite (por defecto) o MySQL / PostgreSQL / MariaDB.

---

## 📦 Instalación y Configuración

Sigue estos pasos para clonar y configurar el proyecto localmente:

### 1. Clonar el repositorio
```bash
git clone <URL_DEL_REPOSITORIO>
cd library_gamer
```

### 2. Método Rápido (Automatizado)
Si dispones de PHP, Composer y Node.js instalados, puedes ejecutar el comando integrado de setup:
```bash
composer run setup
```
> Este comando instala las dependencias de Composer y NPM, copia el archivo `.env`, genera la clave de aplicación, corre las migraciones y compila los assets.

---

### 3. Método Manual Paso a Paso

Si prefieres realizar la configuración paso a paso:

1. **Instalar dependencias de PHP:**
   ```bash
   composer install
   ```

2. **Instalar dependencias de JavaScript:**
   ```bash
   npm install
   ```

3. **Configurar el archivo de entorno:**
   ```bash
   # En Linux / macOS:
   cp .env.example .env

   # En Windows (PowerShell):
   Copy-Item .env.example .env

   # En Windows (CMD):
   copy .env.example .env
   ```

4. **Generar la clave de la aplicación:**
   ```bash
   php artisan key:generate
   ```

5. **Configurar la base de datos:**
   Por defecto, el proyecto utiliza **SQLite**. Asegúrate de crear el archivo si no existe:
   ```bash
   # Linux / macOS:
   touch database/database.sqlite

   # Windows (PowerShell):
   New-Item -ItemType File -Path database\database.sqlite -Force
   ```
   *(Si deseas usar MySQL o PostgreSQL, ajusta las variables `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` en el archivo `.env`)*.

6. **Ejecutar migraciones y datos de prueba (Seeders):**
   ```bash
   php artisan migrate --seed
   ```
   > El seeder creará un usuario de prueba y 10 videojuegos de muestra generados aleatoriamente.

7. **Compilar assets frontend:**
   ```bash
   npm run build
   ```

---

## 💻 Comandos para Ejecutar el Proyecto

### Opción 1: Ejecución Integrada (Recomendada)
Inicia concurrentemente el servidor local de Laravel y el servidor de desarrollo de Vite con un solo comando:
```bash
composer run dev
```
O directamente con Artisan:
```bash
php artisan dev
```

### Opción 2: Ejecución Separada
Si prefieres correr los procesos en terminales independientes:

- **Terminal 1 - Servidor de backend (Laravel):**
  ```bash
  php artisan serve
  ```
  La API estará disponible en: `http://localhost:8000` o `http://127.0.0.1:8000`.

- **Terminal 2 - Servidor de assets (Vite):**
  ```bash
  npm run dev
  ```

---

## 📡 API Endpoints

Todos los endpoints de la API tienen como prefijo `/api`.

| Método | Endpoint | Descripción | Requiere Auth |
| :--- | :--- | :--- | :---: |
| `GET` | `/api/juegos` | Obtiene lista paginada de videojuegos (8 por página) | No |
| `GET` | `/api/juegos/{id}` | Obtiene los detalles de un videojuego específico | No |
| `POST` | `/api/juegos` | Registra un nuevo videojuego | No |
| `PUT` | `/api/juegos/{id}` | Actualiza la información de un videojuego | No |
| `DELETE` | `/api/juegos/{id}` | Elimina un videojuego | No |
| `GET` | `/api/user` | Obtiene los datos del usuario autenticado | Sí (Sanctum) |

### Estructura de Datos (Modelo `Juegos`)

| Campo | Tipo | Requerido | Opciones / Descripción |
| :--- | :--- | :---: | :--- |
| `name_game` | `string` | Sí | Nombre o título del videojuego (máx. 255 caracteres). |
| `image_url` | `string` | Opcional | URL de la imagen de portada (máx. 2048 caracteres). |
| `plataforma` | `enum` | Sí | Valores permitidos: `ps4`, `ps5`, `steam`, `xbox`, `epic`. (Por defecto: `steam`). |
| `estado` | `enum` | Sí | Valores permitidos: `pendiente`, `finalizado`, `jugando`. (Por defecto: `pendiente`). |

#### Ejemplo de Solicitud: Crear un Juego (`POST /api/juegos`)
```json
{
  "name_game": "The Legend of Zelda: Tears of the Kingdom",
  "image_url": "https://example.com/zelda.jpg",
  "plataforma": "steam",
  "estado": "jugando"
}
```

#### Ejemplo de Respuesta (`201 Created` o `200 OK`)
```json
{
  "data": {
    "id": 1,
    "name_game": "The Legend of Zelda: Tears of the Kingdom",
    "image_url": "https://example.com/zelda.jpg",
    "plataforma": "steam",
    "estado": "jugando"
  }
}
```

---

## 🧪 Pruebas y Calidad de Código

### Ejecución de Pruebas Automatizadas
Para ejecutar la suite de pruebas con Pest:
```bash
php artisan test
```
o mediante Composer:
```bash
composer test
```

### Formato de Código (Laravel Pint)
Para verificar y corregir el estilo de código siguiendo los estándares de Laravel:
```bash
vendor/bin/pint --format agent
```

---

## 📄 Licencia

Este proyecto es de código abierto bajo la licencia [MIT](https://opensource.org/licenses/MIT).
