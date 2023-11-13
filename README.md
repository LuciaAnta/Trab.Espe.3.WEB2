# Entrega 3 del TPE // API
### -Integrantes
-Lucía Magali Anta.
-Bautista Menna Zujani.

### -Descripcion
Esta API tiene como propósito acceder a los equipos inscriptos en las olimpiadas 2023.

### -Endpoints
Cada equipo se verá de la siguiente manera:
```json
{
  "id_equipos": 1,
  "nombre_del_equipo": "Exactas Team",
  "id_facultad": 4,
  "deportes": "Futbol",
  "finalizada": 0
}
```


##### -GET: /equipos
Este endpoint devuelve todos los equipos creados dentro de la base de datos.

##### -GET: /equipos/:ID
Este endpoint devuelve el equipo con el ID indicado.

##### -POST: /equipos
Este endpoint crea un nuevo equipo a partir de los datos introducidos en el body:
```json
{
  "nombre_del_equipo": "Nombre del equipo a agregar",
  "id_facultad": "ID de la facultad a agregar del 1 al 10" /*tipo numero*/,
  "deportes": "Deporte a agregar"
}
```
##### -PUT: /equipos/:ID
Este endpoint modifica un equipo ya existente a partir de los datos introducidos en el body:
```json
{
  "nombre_del_equipo": "Nombre del equipo a modificar",
  "id_facultad": "ID de la facultad a modificar del 1 al 10" /*tipo numero*/,
  "deportes": "Deporte a modificar"
}
```
##### -DELETE: /equipos/:ID
Este endpoint elimina el equipo con el ID indicado.

#### Parámetros de ordenamiento
- ##### -sort:
Recibe como valor una propiedad para la busqueda y devuelve los resultados ordenados.
- ##### -order:
Recibe como valor "asc o "desc" y devuelve los resultados (de forma ascendente o descendente) según el valor indicado.

#### Ejemplo:
##### /equipos?sort=id_equipos&order=asc
Este endpoint devuelve los equipos ordenados por su ID de forma ascendente.
