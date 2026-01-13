# wc-service-mode
Modo Servicios para WooCommerce

WC Service Mode es un plugin para WordPress que transforma WooCommerce de una tienda orientada a productos físicos en una plataforma optimizada para la oferta, gestión y contratación de servicios profesionales.

El plugin adapta el flujo clásico de WooCommerce (carrito, checkout, stock, envío) a un modelo de solicitud de servicio, manteniendo la estructura robusta del sistema sin forzar comportamientos comerciales que no aplican a servicios.

🎯 Objetivo

Permitir que desarrolladores, agencias y profesionales utilicen WooCommerce como motor estructural para servicios, evitando:

Pagos inmediatos innecesarios

Lógica de inventario artificial

Envíos irrelevantes

Experiencias confusas para el cliente

WC Service Mode prioriza el contacto, la negociación y el cierre posterior, sin romper la escalabilidad de WooCommerce.

⚙️ Funcionalidades

Funcionalidades actuales

Conversión semántica de productos WooCommerce en servicios

Personalización de textos del flujo:

“Añadir al carrito” → “Solicitar servicio”

“Finalizar compra” → “Enviar solicitud”

Eliminación de lógica de stock y envío para servicios

Soporte para precios orientativos (“Desde…”, “Sujeto a alcance”)

Activación condicional por categoría o producto

Compatibilidad total con WooCommerce estándar


Funcionalidades planificadas

Botón de contacto por WhatsApp y otros canales

Mensajes prellenados según el servicio seleccionado

Simplificación avanzada del checkout

Panel de opciones del plugin

Soporte híbrido (servicios + productos)

Preparación para activación futura de pasarelas y facturación


🧱 Arquitectura

WC Service Mode está construido exclusivamente sobre hooks y filtros oficiales de WooCommerce, sin modificar:

Archivos core

Base de datos

Themes padres


Estructura del plugin
wc-service-mode/
│
├── wc-service-mode.php
├── includes/
│   ├── buttons.php
│   ├── pricing.php
│   ├── checkout.php
│   ├── services.php
│   └── integrations.php
└── readme.md

🔐 Principios de diseño

No intrusivo: no altera el comportamiento global de WordPress

Modular: cada funcionalidad es independiente

Escalable: preparado para crecer por versiones

Reversible: se puede activar o desactivar sin efectos colaterales

Ligero: sin dependencias innecesarias


👥 Público objetivo

Desarrolladores WordPress / WooCommerce

Agencias digitales

Freelancers técnicos

Empresas que venden servicios profesionales

Proyectos que requieren contacto previo al pago


🚀 Instalación

Descargue el plugin en formato .zip

En WordPress vaya a Plugins → Añadir nuevo → Subir plugin

Seleccione el archivo ZIP

Instale y active el plugin

📌 Requisitos

WordPress 6.x o superior

WooCommerce activo

PHP 7.4 o superior

🧠 Filosofía del proyecto

WooCommerce no es solo una tienda.
Con la arquitectura adecuada, puede convertirse en un sistema de contratación profesional.

WC Service Mode nace para cubrir ese vacío de forma limpia, técnica y sostenible.

🧪 Estado del proyecto

Versión inicial en desarrollo activo

Enfoque en estabilidad y control semántico

Evolución guiada por necesidades reales de servicios

📄 Licencia

GPL v2 o posterior