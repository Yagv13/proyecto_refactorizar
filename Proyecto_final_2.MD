# Documento de Requerimientos

# Fase 8 - Etapa 2

# Diseño Técnico de la Refactorización del Proyecto Legacy

# Proyecto

**Globxel**

---

# Contexto

Después del análisis realizado en la etapa anterior, la Dirección Técnica ha aprobado iniciar la modernización del proyecto **Globxel**.

El diagnóstico permitió identificar diversos problemas relacionados con la organización del código, la separación de responsabilidades y la mantenibilidad del sistema.

Sin embargo, antes de comenzar cualquier modificación al código, es necesario definir con claridad cómo será la nueva arquitectura del proyecto.

El objetivo de esta etapa será diseñar la solución técnica que servirá como base para la implementación de la refactorización.

---

# Objetivo

Diseñar la arquitectura que tendrá el proyecto una vez finalizada la refactorización.

Durante esta fase **no deberá modificarse ninguna línea de código**.

El resultado esperado será un documento técnico que sirva como guía para la siguiente etapa de implementación.

---

# Objetivos de Aprendizaje

Al finalizar esta fase el desarrollador deberá comprender:

* Qué es una arquitectura de software.
* Qué significa diseñar antes de programar.
* Diferencia entre una arquitectura actual y una arquitectura objetivo.
* Organización profesional de proyectos PHP.
* Separación de responsabilidades.
* Modularidad.
* Reutilización.
* Mantenibilidad.
* Escalabilidad.
* Deuda técnica.
* Refactorización.
* Flujo completo de una petición dentro de una arquitectura MVC.

---

# Conceptos

## Arquitectura de Software

La arquitectura define la manera en que los distintos componentes de una aplicación se organizan y colaboran entre sí.

Una buena arquitectura busca facilitar el mantenimiento, el crecimiento del sistema y el trabajo en equipo.

---

## Proyecto Legacy

Un proyecto Legacy es un sistema que continúa funcionando y generando valor para la empresa, pero cuya estructura interna puede dificultar su mantenimiento o evolución.

No todos los proyectos Legacy están mal desarrollados.

Sin embargo, conforme un sistema crece durante varios años, suele acumular deuda técnica y oportunidades de mejora.

---

## Refactorización

Refactorizar consiste en mejorar la estructura interna del código sin modificar el comportamiento observable por el usuario.

El objetivo no es agregar funcionalidades nuevas.

El objetivo es hacer que el código sea más limpio, reutilizable y fácil de mantener.

---

## Deuda Técnica

La deuda técnica representa decisiones de diseño o implementación que facilitan el desarrollo en el corto plazo, pero incrementan el costo de mantenimiento en el futuro.

Algunos ejemplos son:

* Código duplicado.
* Responsabilidades mezcladas.
* Nombres inconsistentes.
* Acoplamiento excesivo.
* Archivos demasiado grandes.

---

## Mantenibilidad

Un proyecto mantenible permite agregar nuevas funcionalidades o corregir errores sin afectar otras partes del sistema.

Una buena arquitectura reduce el tiempo necesario para realizar cambios.

---

## Escalabilidad

Un sistema escalable no solamente soporta más usuarios.

También permite crecer en funcionalidades sin que el proyecto se vuelva inmanejable.

Una buena organización del código facilita ese crecimiento.

---

## Modularidad

Dividir un sistema en módulos independientes facilita su mantenimiento y permite que distintas partes evolucionen sin afectar al resto de la aplicación.

---

## Separación de Responsabilidades

Cada componente debe encargarse únicamente de una responsabilidad específica.

Por ejemplo:

* El Controller coordina.
* El Model consulta datos.
* La View muestra información.

Mientras mejor se respeten estas responsabilidades, más sencillo será mantener el sistema.

---

# Actividades

---

# 1. Arquitectura Propuesta

Con base en el análisis realizado en la etapa anterior, propone una nueva arquitectura para el proyecto.

Explica:

* ¿Qué arquitectura utilizarás?
* ¿Por qué la elegiste?
* ¿Qué problemas del proyecto actual busca resolver?

No existe una única respuesta correcta.

Lo importante será justificar cada decisión.

---

# 2. Nueva Estructura del Proyecto

Diseña la estructura completa que tendrá el proyecto una vez finalizada la refactorización.

Incluye un árbol de carpetas:

---

# 3. Inventario de Archivos

Analiza los archivos existentes y propone cuál debería ser su nueva ubicación dentro de la arquitectura.

Completa una tabla similar a la siguiente:

| Archivo Actual    | Nueva Ubicación | Motivo                                      |
| ----------------- | --------------- | ------------------------------------------- |
| Alta_user.php     | Views           | Solo contiene interfaz                      |
| Procesar_user.php | Controllers     | Procesa solicitudes                         |
| Get_users.php     | Controllers     | Obtiene información                         |
| Db.php            | Config          | Configuración del sistema                   |
| Navbar.php        | Components      | Componente reutilizable                     |

No es necesario incluir únicamente estos archivos.

Entre más completo sea el inventario, mejor será el análisis.

---

# 4. Responsabilidad de Cada Carpeta

Describe cuál será la responsabilidad de cada carpeta propuesta.

Además, explica claramente qué responsabilidades NO deberán tener.

Ejemplo:

## Controllers

Debe:

* Recibir solicitudes.
* Validar información.
* Invocar Models.
* Construir respuestas.

No debe:

* Escribir consultas SQL.
* Generar HTML.
* Contener estilos CSS.

Realiza este mismo ejercicio para todas las carpetas que propongas.

---

# 5. Flujo de la Nueva Arquitectura

Describe el flujo completo de una petición utilizando la arquitectura propuesta.

El diagrama deberá iniciar desde que el usuario interactúa con la aplicación y finalizar cuando la respuesta vuelve a mostrarse en pantalla.

Además del diagrama, explica brevemente qué ocurre en cada paso.

---

# 6. Justificación Técnica

Explica con tus propias palabras:

* ¿Qué problemas elimina tu propuesta?
* ¿Qué beneficios aporta respecto a la arquitectura actual?
* ¿Qué parte de la nueva arquitectura consideras más importante?
* ¿Qué cambios tendrán un mayor impacto positivo en el mantenimiento del proyecto?

---

# 7. Riesgos de la Refactorización

Describe los principales riesgos que podrían presentarse durante la implementación.

Por ejemplo:

* Errores en rutas.
* Funcionalidades que dejen de responder.
* Dependencias ocultas.
* Errores al mover archivos.
* Problemas con Includes o Requires.

Explica cómo podrían minimizarse esos riesgos.

---

# Restricciones

Durante esta fase:

* No modificar ningún archivo del proyecto.
* No implementar código nuevo.
* No eliminar archivos existentes.
* No reorganizar físicamente las carpetas.
* No modificar la base de datos.

El objetivo será únicamente diseñar la solución técnica.

---

# Criterios de Evaluación

Se evaluará:

* Capacidad de análisis.
* Calidad de la propuesta.
* Organización de la nueva arquitectura.
* Justificación técnica de las decisiones.
* Claridad en el inventario de archivos.
* Comprensión de responsabilidades.
* Correcta definición del flujo de la aplicación.
* Capacidad para identificar beneficios y riesgos.

No se evaluará que la propuesta coincida exactamente con la del tutor.

Lo importante será que todas las decisiones estén correctamente justificadas.

---

# Resultado Esperado

Al finalizar esta etapa deberá existir un diseño técnico completo de la nueva arquitectura del proyecto.

Este documento servirá como referencia para la siguiente fase, donde comenzará la implementación de la refactorización del sistema.

El objetivo no será simplemente mover archivos de lugar, sino construir una arquitectura más limpia, reutilizable, mantenible y preparada para el crecimiento futuro del proyecto.
