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
* ¿Cuál crees que es su objetivo?
* ¿Cómo está organizado actualmente?
* ¿Qué impresión general te dio el proyecto?

---

# 2. Arquitectura Actual

Analiza la estructura del proyecto.

Describe:

* ¿Qué patrón arquitectónico identificas?
* ¿Consideras que existe una separación clara de responsabilidades?
* ¿Cómo fluye una petición desde que el usuario interactúa con la aplicación hasta que se consulta la base de datos?

Incluye un diagrama sencillo del flujo actual.

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
* ¿Qué carpetas cumplen correctamente su función?
* ¿Qué carpetas podrían reorganizarse?
* ¿Existen archivos fuera del lugar donde deberían estar?

Justifica cada respuesta.

---

# 4. Problemas Detectados

Identifica todos los problemas que encuentres.

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
* ¿Por qué?

---

# 7. Responsabilidades

Selecciona al menos cinco archivos del proyecto y responde:

* ¿Cuál es la responsabilidad de este archivo?
* ¿Está cumpliendo únicamente esa responsabilidad?
* ¿Qué otras responsabilidades realiza?
* ¿Cómo podría mejorar?

---

# 8. Propuesta de Nueva Arquitectura

Propón una nueva estructura para el proyecto.

No existe una única respuesta correcta.

Puedes utilizar cualquier arquitectura que consideres adecuada.

Incluye un árbol de carpetas.

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
