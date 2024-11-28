Proyecto Final - Programación para Internet

# Instrucciones para instalar el proyecto

1. Clona el repositorio:

   ```
   git clone https://github.com/usuario/Laravel-CRUD.git
   cd nombre-del-repositorio
   ```

2. Instala las dependencias de Composer:

   ```
   composer install
   ```

3. Copia el archivo `.env.example` a `.env`:

   ```
   cp .env.example .env
   ```

4. Genera la clave de la aplicación:

   ```
   php artisan key:generate
   ```

5. (Opcional) Si estás utilizando migraciones de base de datos, ejecuta:

   ```
   php artisan migrate
   ```

6. (Opcional) Si necesitas sembrar datos de prueba:

   ```
   php artisan db:seed
   ```

7. Levanta el servidor de desarrollo:

   ```
   php artisan serve
   ```

8. ¡Listo! Accede a la aplicación en `http://localhost:8000`.

