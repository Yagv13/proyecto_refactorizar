# Documento de Requerimientos

# FASE 8 - ETAPA 1

# Análisis y Propuesta de Refactorización del Proyecto Legacy

## Proyecto

**Globxel**

---

# Contexto

El proyecto Globxel ha estado en desarrollo durante varios años.

Durante este tiempo distintos desarrolladores participaron en su construcción, agregando nuevas funcionalidades conforme las necesidades del negocio fueron creciendo.

Actualmente el sistema funciona correctamente y cumple con los requerimientos del cliente.

Sin embargo, conforme el proyecto ha evolucionado, el código se ha vuelto cada vez más complejo de mantener.

La empresa ha decidido iniciar un proceso de modernización del sistema para facilitar su mantenimiento y permitir que futuros desarrolladores puedan trabajar sobre él de manera más sencilla.

Antes de realizar cualquier modificación al código, el equipo de desarrollo necesita un **diagnóstico técnico** del estado actual del proyecto.

---

# Objetivo

El objetivo de esta fase NO es programar.

El objetivo será realizar un análisis técnico del proyecto existente, identificar oportunidades de mejora y proponer una estrategia de refactorización.

Durante esta etapa no deberá modificarse ninguna línea de código.

---

# Objetivos de Aprendizaje

Al finalizar esta fase el desarrollador deberá ser capaz de:

* Analizar un proyecto existente.
* Comprender la arquitectura actual.
* Detectar problemas de organización.
* Identificar responsabilidades mezcladas.
* Detectar código duplicado.
* Detectar posibles problemas de mantenimiento.
* Proponer una arquitectura más escalable.
* Justificar técnicamente sus decisiones.
* Elaborar un plan de refactorización.

---

# Escenario

Imagina que acabas de incorporarte al equipo de desarrollo de Globxel.

Tu líder técnico te asigna el siguiente trabajo:

> "Antes de comenzar la modernización del sistema necesito que analices el proyecto y me entregues un documento con los problemas encontrados y una propuesta de mejora."

El objetivo no será encontrar una única respuesta correcta.

Lo importante será demostrar capacidad de análisis y justificar cada decisión tomada.

---

# Entregable

Se deberá entregar un documento técnico que responda los siguientes puntos.

---

# 1. Descripción General del Proyecto

Describe con tus propias palabras:

* ¿Qué tipo de sistema consideras que es?
es un sistema web desarrollado en php que está dividido en dos partes; una pagina publica que es lo que ve el "cliente" y un panel de administración que es lo de atrás lo que solo ven los administradores para agregar o eliminar información.
* ¿Cuál crees que es su objetivo?
facilitar la administración del contenido de la pagina web a través de un panel interno. 
* ¿Cómo está organizado actualmente?
en dos partes principales: la página páblica que es la que corresponde a la página web donde se encuentran archivos como index.php, cayalogo.php, producto.php, nosotros.php y otros que forman la parte pública de la página. Y la segunda parte es el panel de administración donde estan los archivos relacionados con el manejo de productos, usuarios, categorías... 
también está la carpeta assets donde están los recursos del proyecto como imágenes, archivos css, javascript, y todo lo relacionado con el diseño de la página que lo mantiene separado de lo demás. 
* ¿Qué impresión general te dio el proyecto?
me pareció que es un sistema muy completo con una arquitectura bien estructurada 
---

# 2. Arquitectura Actual

Analiza la estructura del proyecto.

Describe:

* ¿Qué patrón arquitectónico identificas?
yo creo que aqui se utiliza una arquitectura tradicional php 
* ¿Consideras que existe una separación clara de responsabilidades?
yo pienso que si y no, ya que por un lado exsten archivos como navbar, sidebar, header lo que evita repetir el codigo en varias paginas pero tambien hay varios archivos que realizan más de una función al mismo tiempo como procesar_product que recibe la información del formulario, inserta o actualiza registros en la base de datos, crea carpetas, guarda imagenes o get_product_detalles que consulta la base de datos, obtiene imagenes del producto desde el servidor y genera la respuesta para el front, esto hace que la lógica del sistema esté distribuida en diferentes archivos y que no haya una separación clara.
* ¿Cómo fluye una petición desde que el usuario interactúa con la aplicación hasta que se consulta la base de datos?
primero el usuario entra a una pagina como por ejemplo catalogo.php luego esta pagina carga el diseño del catalogo pero los productos no se obtienen de este archivo php, luego el archivo catalogo.js realiza una peticion a archivos como por ejemplo get_product_detalles.php los cuales consultan la base de datos en db.php, finalmente la informacion se devuelve en formato json y js genera el contenido que se muestra en la pantalla. 

Incluye un diagrama sencillo del flujo actual.

Usuario
catalogo.php
catalogo.js
get_product_detalles.php
db.php
MySQL
JSON
catalogo.js
HTML

Ejemplo:

```text
Usuario

↓

Products.php

↓

Get_products.php

↓

db.php

↓

MySQL

↓

HTML
```

Este diagrama es únicamente un ejemplo.

---

# 3. Organización del Proyecto

Analiza la estructura de carpetas.

Responde preguntas como:

* ¿La organización es clara?
en general se me hace que está bien organizado, ya que los archivos se pueden encontrar con facilidad gracias a las carpetas separadas como la carpeta assets donde estan los archivos que definen el diseño de la página, o la carpeta app donde está la mayor parte del panel administrativo, aunque siento que hay algunos que podrían reorganizarse ya que hay algunos archivos con funciones muy diferentes que están mezclados en la raíz del proyecto. Archivos en la raíz del proyecto como db.php, header.php, catalogo.php, index.php, tienen responsabilidades muy diferentes entre sí entonces tener estos archivos mezclados hace que la estructura sea menos clara. También los archivos que procesan información como get_products.php, procesar_product.php, get_product_detalles.php están en diferentes ubicaciones entonces estaría mejor que todos los archicos encargados de la lógica del sistema estuvieran agrupados en una misma. También estaría bien hacer una carpeta config para almacenar db.php. 
* ¿Qué carpetas cumplen correctamente su función?
la carpeta assets ya que viene todo sobre el diseño de la página, vienen imágenes, tipo de letra, color, etc. la carpeta app tambien ya que dentro de ella se encuentran archivos relacionados con la administración de productos, y otras funciones. 
* ¿Qué carpetas podrían reorganizarse?
la carpeta app porque tiene archivos de distintos tipos mezclados por ejemplo dentro de ella hay archivos que muestran vistas y tambien archivos que procesan información, sería mejor separar estos archivos en carpetas según su responsabilidad. También como ya había dicho hacer una carpeta config para almacenar db.php.
* ¿Existen archivos fuera del lugar donde deberían estar?
db.php se encuentra en la raíz del proyecto cuando podría estar dentro de una caroeta config, get_product_detalles.php también está en la raíz aunque su función es procesar información y devolver datos en formato JSON estaría mejor ponerlo junto con los demás archivos de procesamiento.

Justifica cada respuesta.

---

# 4. Problemas Detectados

Identifica todos los problemas que encuentres.

- Arquitectura poco definida: no existe una separación clara entre modelo, vista y controlador.
- Archivos dispersos: los archivos de procesamiento están en distintas carpetas.
- Responsabilidades mezcladas: un mismo archivo realiza varias tareas diferentes 
- Código duplicado: código repetido en varias páginas.


Por ejemplo:

* Código duplicado.
* Archivos demasiado grandes.
* Responsabilidades mezcladas.
* Archivos con nombres inconsistentes.
* Formularios apuntando directamente a archivos PHP.
* SQL mezclado con HTML.
* Includes repetidos.
* Lógica distribuida en demasiados archivos.
* Código difícil de localizar.
* Cualquier otro problema que consideres importante.

**No es necesario encontrar exactamente los mismos problemas.**

Lo importante será justificar cada observación.

---

# 5. Aspectos Positivos

No todo proyecto Legacy está mal diseñado.

Describe también los aspectos que consideres positivos.

un aspecto positivo es que el proyecto tiene todos los recursos de imágenes, archivos css y js dentro de una misma carpeta lo que facilita encontrarlos y tener el proyecto más ordenado, también archivos como header, navbar, sidebar y scripts se utilizan en diferentes páginas del sistema y eso evita tener que escribir el mismo código varias veces y facilita hacer cambios sin tener que modificar todas los archivos, también el proyecto diferencia el sitio web público y el panel de administración, esto facilita identificar qué archivos pertenecen a cada parte del sistema, la conexión a la base de datos está en un mismo archivo y esto evita tener que repetir el código de conexión en cada archivo que necesita acceder a MySQL.

Por ejemplo:

* Componentes reutilizables.
* Organización de Assets.
* Uso de Bootstrap.
* Separación de algunos módulos.
* Cualquier práctica que consideres adecuada.

---

# 6. Código Duplicado

Identifica archivos que consideres que realizan tareas similares.

Por ejemplo:

* Alta_*.php
* Editar_*.php
* Eliminar_*.php
* Procesar_*.php
* Get_*.php

Explica:

* ¿Qué archivos podrían unificarse?
alta_product.php y alta_user.php, los dos archivos tienen la misma responsabilidad de mostrar un formulario para registrar información nueva, la estructura es muy parecida solamente cambian los campos que se capturan entonces se podría reutilizar la misma estructura de formulario.
editar_product.php y editar_user.php, estos dos tambien hacen casi lo mismo, la lógica general es la misma y solamente cambian los datos que se editan.
eliminar_categoria.php, eliminar_imagen.php, eliminar_product.php, eliminar_subcategoria.php, eliminar_user.php, al igual que los otros el procedimiento es muy parecido entonces esta lógica podría adaptarse para evitar la duplicación.
procesar_categoria.php, procesar_product.php, procesar_subcategoria.php, procesar_user.php, igual solamente cambiar la lógica específica de cada una.
y por último todos los get, get_categorias.php, get_leads.php, get_products.php, get_subcategorias.php, get_users.php, estos podrían centralizarse usando controllers o models. 
* ¿Por qué?
en general todos estos archivos tienen responsabilidades muy parecidas, hacer una arquitectura basada en controllers y models permitiría reutilizar gran parte de la lógica y facilitaría el mantenimiento del sistema. 
---

# 7. Responsabilidades

Selecciona al menos cinco archivos del proyecto y responde:

* ¿Cuál es la responsabilidad de este archivo?
db.php: establecer la conexión con la base de datos MySQL
index.php: mostrar la pagina principal del sitio web para los clientes
get_product_detalles.php: obtener la informacion de un producto y devolverla en formato json.
procesar_product.php: registrar o actualizar la información de un producto
app/products.php: mostrar el módulo de administración de productos
* ¿Está cumpliendo únicamente esa responsabilidad?
db.php: no solo eso
index.php: no
get_product_detalles.php: no
procesar_product.php: no
app/products.php: no
* ¿Qué otras responsabilidades realiza?
db.php: tambien proporciona la variable $conn para que otros archivos puedan realizar consultas.
index.php: incluye otros archivos como header.php, importa estilos, configura algunos scripts
get_product_detalles.php: tambien busca las imagenes del producto en las carpetas del servidpr y construye el arreglo que se envía al cliente.
procesar_product.php: recibe los datos del formulario, valida la información, ejecuta consultas SQL, crea carpetas, guarda imágenes, cambia nombres de archivos.
app/products.php: contiene varios modales, formularios, codigo js, estilos css y vista previa de imágenes.
* ¿Cómo podría mejorar?
index.php: podria dividirse en componentes o vistas parciales para que el archivo principal sea mas pequeño
get_product_detalles.php: la busqueda de imagenes podria separarse para que el archivo tenga una sola responsabilidad.
procesar_product.php: cada una de estas responsabilidades podrian estar separadas, un controlador podria recibir la peticion y un modelo realizar las consultas.
app/products.php: los modales, estilos y código js podrian separarse en archivos independientes para mantenerlo más organizado.

---

# 8. Propuesta de Nueva Arquitectura

Propón una nueva estructura para el proyecto.

No existe una única respuesta correcta.

Puedes utilizar cualquier arquitectura que consideres adecuada.

Incluye un árbol de carpetas.

app/
  controllers/
  models/
  views/
  assets/
  charts/
  components/
  forms/
  maps/
  tables/

helpers/

core/

config/
  db.php

public/
  index.php
  catalogo.php
  producto.php
  contacto.php
  servicios.php
  nosotros.php
  aviso.php
  terminos.php

assets/
  css/
  fonts/
  images/
  js/
  products/
  categorias/
  subcategorias/

includes/
  header.php
  navbar.php
  sidebar.php
  scripts.php

php-fetching/

PHPMailer/


Ejemplo:

```text
app/

controllers/

models/

views/

config/

core/

helpers/

assets/

public/
```

Este árbol es únicamente una referencia.

Puedes proponer uno diferente.

---

# 9. Responsabilidad de Cada Carpeta

Explica brevemente cuál sería la responsabilidad de cada carpeta propuesta.

Se agregaron las carpetas controllers, models y views para organizar el proyecto siguiendo el MVC para que haya una mejor separación de responsabilidades, se dejaron las carpetas charts, components, forms, maps, assets, tables porque no forman parte de la logica del negocio solamente son recursos extra, se agregaron las carpetas helpers y core para organizar funciones evitando el duplicado de codigo y tener una esctructura mas limpia, tambien hice una carpeta config para centralizar ahí la configuracion de la base de datos, la public es para guardar los archivos a los que accede el usuario, la carpeta assets es para todos los archivos de diseño como css, imagenes, fuentes, etc. , la carpeta includes es para los archivos reutilizables y php-fetching y PHPMailer para mandar correos desde el sistema.

Por ejemplo:

* Controllers
* Models
* Views
* Config
* Helpers
* Core
* Assets

---

# 10. Flujo Propuesto

Realiza un diagrama del flujo que propones para el proyecto una vez refactorizado.

Usuario
Views
JavaScript
Controller
Model
Config
MySQL
Controller
Views
JavaScript

El usuario interactúa con una vista. Si es necesario realizar una consulta o guardar información, JavaScript envía la petición al controlador. El controlador valida la información y solicita los datos al modelo. El modelo utiliza la configuración de la base de datos para conectarse a MySQL y realizar la consulta. Después, la información regresa al controlador, que decide si devuelve una vista con los datos o una respuesta en formato JSON para que JavaScript actualice la página sin necesidad de recargarla. De esta forma, cada parte del sistema tiene una responsabilidad específica y el código es más fácil de mantener y ampliar.

Ejemplo:

```text
Usuario

↓

Vista

↓

JavaScript

↓

Controller

↓

Model

↓

Database

↓

MySQL

↓

Controller

↓

JSON

↓

JavaScript

↓

Vista
```

Este flujo es únicamente un ejemplo.

---

# 11. Plan de Refactorización

Propón un plan de trabajo.

No es necesario implementarlo.

Simplemente explica en qué orden realizarías la refactorización.

Primero reorganizaría las carpetas para que los archivos queden acomodados según su función y esto va a facilitar encontrar cada código, luego centralizaría la configuración del sistema en un solo lugar para que no esté en otros archivos, luego ya que esté más organizada la estructura ya haría los controllers y los models para evitar tener instrucciones sql por todos los archivos, luego adaptaría las vistas para que solo tengan la información necesaria para mostrar al usuario, luego en los archivos que realizan tareas similares unificaría funciones repetidas y reutilizaría el código donde se pueda, y por último organizaría los archivos JavaScript separando las funciones por módulo y eliminando código duplicado.

Por ejemplo:

* Reorganizar carpetas.
* Crear Controllers.
* Crear Models.
* Separar Views.
* Centralizar configuración.
* Eliminar código duplicado.
* Refactorizar JavaScript.
* Etc.

Justifica el orden elegido.

---

# 12. Riesgos

Describe qué riesgos podrían presentarse durante una refactorización de este tipo.

Por ejemplo:

* Romper funcionalidades existentes.
* Errores de rutas.
* Dependencias ocultas.
* Código duplicado difícil de detectar.
* Otros riesgos identificados.

---

# 13. Conclusiones

Finaliza el documento respondiendo:

* ¿Consideras necesaria la refactorización?
* ¿Qué beneficios tendría?
* ¿Qué parte consideras más compleja?
* ¿Qué fue lo que más te llamó la atención del proyecto?
* ¿Qué harías primero si fueras responsable de este sistema?

---

# Restricciones

Durante esta fase:

* No modificar ningún archivo del proyecto.
* No crear nuevas clases.
* No eliminar archivos.
* No reorganizar carpetas.
* No cambiar nombres de archivos.
* No implementar nuevas funcionalidades.

El objetivo será únicamente analizar y proponer.

---

# Criterios de Evaluación

Se evaluará:

* Capacidad de análisis.
* Capacidad para detectar problemas.
* Justificación técnica.
* Claridad al explicar ideas.
* Calidad de la propuesta.
* Comprensión de arquitectura de software.
* Criterio para priorizar cambios.

No se evaluará que la propuesta coincida exactamente con la del tutor.

Lo importante será que cada decisión esté correctamente fundamentada.

---

# Resultado Esperado

Al finalizar esta fase deberás haber elaborado un diagnóstico técnico del estado actual del proyecto.

Este documento servirá como base para la siguiente etapa, donde se comenzará la implementación de la refactorización aprobada.

**Importante:** En la siguiente fase no recibirás una arquitectura predefinida. El objetivo será implementar la solución que tú mismo propusiste en este documento, realizando los ajustes necesarios conforme avances en la refactorización.
