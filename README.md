# Entrega 3 del TPE // API

### -Integrantes
Lucía Magali Anta - Bautista Menna Zujani.
### -Descripcion
Esta API tiene como propósito acceder a los equipos inscriptos y facultades participantes en las olimpiadas 2023.

---
### -Endpoints tabla equipos
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

---
##### -GET: /equipos/:ID
Este endpoint devuelve el equipo con el ID indicado.

---
##### -POST: /equipos
Este endpoint crea un nuevo equipo a partir de los datos introducidos en el body:
```json
{
  "nombre_del_equipo": "Nombre del equipo a agregar",
  "id_facultad": "ID de la facultad a agregar del 1 al 10" /*tipo numero*/,
  "deportes": "Deporte a agregar"
}
```

---
##### -PUT: /equipos/:ID
Este endpoint modifica un equipo ya existente a partir de los datos introducidos en el body:
```json
{
  "nombre_del_equipo": "Nombre del equipo a modificar",
  "id_facultad": "ID de la facultad a modificar del 1 al 10" /*tipo numero*/,
  "deportes": "Deporte a modificar"
}
```

---
##### -DELETE: /equipos/:ID
Este endpoint elimina el equipo con el ID indicado.

---

### Parámetros de ordenamiento
- #### -sort:
Recibe como valor una propiedad para la busqueda y devuelve los resultados ordenados.
- #### -order:
Recibe como valor "asc o "desc" y devuelve los resultados (de forma ascendente o descendente) según el valor indicado.

#### Ejemplo:
##### /equipos?sort=id_equipos&order=asc
Este endpoint devuelve los equipos ordenados por su ID de forma ascendente.
Y así con los demás campos.

---

### Endpoints tabla facultades
Cada facultad se verá de la siguiente manera:
```json
{
        "id_facultades": 1,
        "nombre_facultad": "Facultad de Ciencias Exactas",
        "descripcion": " ",
        "fundacion": 1975
}
```

---
#### -GET: /facultades
Este endpoint devuelve todas las facultades creadas dentro de la base de datos.

---
##### -GET: /facultadess/:ID
Este endpoint devuelve la facultad con el ID indicado.

---
##### -POST: /facultades
Este endpoint crea una nueva facultad a partir de los datos introducidos en el body:
```json
{
        "nombre_facultad": "Facultad a agregar",
        "descripcion": "Descripción a agregar",
        "fundacion": Año a agregar /*tipo numero*/
}
```
#### PUT: /facultades/:ID
Este endpoint modifica una facultad ya existente a partir de los datos introducidos en el body:
```json
{
        "nombre_facultad": "Facultad a modificar",
        "descripcion": "Descripción a modificar",
        "fundacion": Año a modificar /*tipo numero*/
}
```

---
##### -DELETE: /facultades/:ID
Este endpoint elimina la facultad con el ID indicado.

---
### Parámetros de ordenamiento
- #### -sort:
Recibe como valor una propiedad para la busqueda y devuelve los resultados ordenados.
- #### -order:
Recibe como valor "asc o "desc" y devuelve los resultados (de forma ascendente o descendente) según el valor indicado.

#### Ejemplo:
##### /facultad?sort=id_facultades&order=asc
Este endpoint devuelve las facultades ordenadas por su ID de forma ascendente.
Y así con los demás campos.

---
