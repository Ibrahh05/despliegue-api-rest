# 🐾 Protectora de Mascotas API REST

Bienvenido a la API REST para la gestión de mascotas en una protectora.  
Este proyecto está desarrollado con **Spring Boot** y utiliza **PostgreSQL (NeonDB)** como base de datos.

---

## 🚀 Características

- **Listar mascotas:** Consulta todas las mascotas registradas.
- **Adoptar mascota:** Marca una mascota como adoptada.

---

## ⚙️ Tecnologías

- **Java / Spring Boot**
- **PostgreSQL (NeonDB)**
- **JPA / Hibernate**

---

## 🗄️ Estructura de la base de datos

La entidad principal del sistema es **Pet**.  
La tabla recomendada en PostgreSQL es:

```sql
CREATE TABLE pets (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255),
    born DATE,
    chip VARCHAR(255),
    category VARCHAR(255),
    adopt BOOLEAN DEFAULT false
);
```

### Ejemplo de la entidad Java

```java
@Entity
public class Pet {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private long id;
    private String name;
    private LocalDate born;
    private String chip;
    private String category;
    private boolean adopt;
    // getters y setters
}
```

---

## 📦 Configuración

La conexión a la base de datos se configura en `src/main/resources/application.properties`:

```properties
spring.datasource.url=jdbc:postgresql://ep-wandering-water-ad57btsv-pooler.c-2.us-east-1.aws.neon.tech:5432/neondb?sslmode=require&channel_binding=require
spring.datasource.username=neondb_owner
spring.datasource.password=npg_1DWzEr8TNjcl
spring.datasource.driver-class-name=org.postgresql.Driver

spring.jpa.hibernate.ddl-auto=validate
spring.jpa.show-sql=true
spring.jpa.properties.hibernate.dialect=org.hibernate.dialect.PostgreSQLDialect
```

> ⚠️ **Nota:** No incluyas credenciales sensibles en tu repositorio público.

---

## 📚 Endpoints

### ➤ Listar mascotas

- **URL:** `/list`
- **Método:** `GET`
- **Descripción:** Obtiene todas las mascotas registradas en el sistema.
- **Ejemplo de respuesta:**
  ```json
  [
    {
      "id": 1,
      "name": "Luna",
      "born": "2022-01-10",
      "chip": "123456789",
      "category": "Perro",
      "adopt": false
    }
  ]
  ```

---

### ➤ Adoptar mascota

- **URL:** `/adopt/{id}`
- **Método:** `POST`
- **Descripción:** Marca como adoptada la mascota con el id indicado.
- **Ejemplo de respuesta:**
  ```json
  {
    "id": 1,
    "name": "Luna",
    "born": "2022-01-10",
    "chip": "123456789",
    "category": "Perro",
    "adopt": true
  }
  ```

---

## 🏁 Instalación y ejecución

1. Clona el repositorio:
   ```bash
   git clone https://github.com/antoniorb1913/despliegue-api-rest.git
   cd despliegue-api-rest
   ```
2. Configura el acceso a tu base de datos en `src/main/resources/application.properties`.
3. Compila y ejecuta la aplicación:
   ```bash
   ./mvnw spring-boot:run
   ```
   o si usas Gradle:
   ```bash
   ./gradlew bootRun
   ```

---

## 🧑‍💻 Contribuciones

¿Te gustaría ayudar a mejorar el proyecto?  
Haz un fork, crea una rama y envía tu pull request.

---

## 📩 Contacto

Para dudas o sugerencias, abre un issue o escríbeme a [antoniorb1913@gmail.com](mailto:antoniorb1913@gmail.com)

---

_Disfruta ayudando a que más mascotas encuentren un hogar 🏡🐶🐱_
