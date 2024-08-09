
# Laboratorio remoto de la facultad de tecnología y ciencias aplicadas, destinada a la programación remota de sistemas embebidos.

Para levantar el servidor se necesita primero instalar las dependencias necesarias tanto en la carpeta principal como en la del cliente, ya que tienen diferentes dependencias.


## Instalación y puesta en marcha

Primero debemos instalar las dependencias del proyecto, esto se puede hacer con npm o con yarn:
```bash
  npm install 
  cd client
  npm install
```
o bien
```bash
  yarn install
  cd client
  yarn install
```

Después simplemente, en la carpeta raíz del proyecto utilizamos:

```bash
  node server.js
```
Esto nos debería notificar que estamos en el puerto 8080.

Los links para comprobar el uso del laboratorio serán:

http://localhost:8080/Camara-servidor.html (para la cámara que se mostrará a todos los clientes que se conecten, esta página debe estar abierta del lado del servidor.)

http://localhost:8080/index.html Aquí se mostrará todo el entorno de programación. Para poder ver la cámara del lado del servidor tendremos que presionar en "ejecutar" o ir a /ejec.html
