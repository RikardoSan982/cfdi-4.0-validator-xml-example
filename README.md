# Ejemplo CFDI 4.0 – Validación y Generación de XML (Simplificado)

Este proyecto es un ejemplo inspirado en un sistema real de facturación electrónica CFDI 4.0.  
Muestra cómo validar datos de una factura y generar un XML simplificado siguiendo buenas prácticas de diseño orientado a objetos y código limpio.

El objetivo del ejemplo es demostrar estructura, legibilidad y mantenibilidad del código, no implementar el estándar completo del SAT.

## Alcance
- Validación básica de datos de una factura (RFCs, importes, UsoCFDI).
- Generación de un XML CFDI 4.0 simplificado.
- Separación clara de responsabilidades (datos, validación, construcción de XML y servicio).
- Pruebas unitarias para validar los casos principales.

⚠️ Nota:  
Este ejemplo **no incluye sellado digital, certificados, timbrado ni conexión a PAC**, para evitar el uso de información sensible o dependencias externas.

## Estructura
- `InvoiceData`: objeto de datos inmutable que representa la información de la factura.
- `InvoiceValidator`: valida reglas básicas del CFDI.
- `CfdiXmlBuilder`: construye el XML a partir de datos válidos.
- `InvoiceService`: orquesta validación y generación.
- Pruebas unitarias con PHPUnit usando datos controlados.

## Ejecución de pruebas
```bash
vendor/bin/phpunit
