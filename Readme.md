# Documentation

## [English](#english-1)

## [Español](#español-1)

## English

Credits to [Doekia for his fix & script](https://www.prestashop.com/forums/topic/981159-spam-customer-account-solution-13-17/). This module is based on his work.

The purpose of this module is to make things easier for those that don't have or don't know how to use FTP, or simply prefer a solution that works from prestashop backoffice.

### MODULE INSTALLATION.

*IMPORTANT: This module works from Prestashop version 1.5.4.1 to 1.7*

In order to install the module, you have to go to Modules > Add New Module and upload the ZIP file from our latest release: https://github.com/factoriadigital/prestashop-spam-registers-solution/releases/download/v2.0.0/factocreateoverride.zip

Once installed, go to the configuration section of the module and click on: 

"Create override files"

After that, you should see the following:

```
El archivo validate.php con su clase ha sido creado de forma correcta en la carpeta override
El archivo customer.php con su modificación ha sido creado de forma correcta en la carpeta override
```

That message means that the files are been created correctly.

However, if you see the following message:

```El proceso de creación de archivos en la carpeta override ha fallado, porque ya existían dichos archivos```

It means that these files already exist and you have to make changes manually.


## Español

Desde https://www.factoriadigital.com/ hemos creado este módulo para solucionar el problema detectado a finales de Abril en Prestashop:

Los usuarios están empezando a recibir emails de nuevos clientes registrados en la tienda con una procedencia un tanto extraña. Además, dichos registros, en el apartado de "apellidos" aparece la url de una web. Este es el mayor problema.

Agradecimientos a [Doekia por su solución y script](https://www.prestashop.com/forums/topic/981159-spam-customer-account-solution-13-17/). Este módulo está basado en su trabajo.

El propósito de este módulo es hacer las cosas más fáciles para los que no tienen o no saben usar el FTP, o sencillamente prefieran una solución sin tener que salir del admin de PrestaShop.


### INSTALACIÓN DE MÓDULO.

*IMPORTANTE: El módulo funciona desde la versión de Prestashop 1.5.4.1 hasta la última 1.7*

Para instalar el módulo, solo tiene que ir a Módulos, añadir nuevo módulo, subir el zip proporcionado, e instalar.

Una vez instalado, vaya a configurar el módulo y clique sobre;

"Crear archivos override"

A continuación debe aparecer el siguiente texto:

```
El archivo validate.php con su clase ha sido creado de forma correcta en la carpeta override
El archivo customer.php con su modificación ha sido creado de forma correcta en la carpeta override
```

Si sale este mensaje, los archivos se han creado de forma correcta. Y se estarán aplicando las modificaciones para solucionar el problema.

Si por el contrario, le aparece el siguiente mensaje:

```El proceso de creación de archivos en la carpeta override ha fallado, porque ya existían dichos archivos```

Es porque ya existen dichos archivos y hay que realizar modificaciones de forma manual, este mismo texto puedes copiarlo y pegarlo en el espacio para dudas.

### DUDAS?

Para dudas sobre este módulo pueden usar el hilo del foro destinado a tal efecto:

[Solución a spam por registros fraudulentos en prestashop](https://www.factoriadigital.com/prestaforum/threads/solucion-a-registros-fraudulentos-en-prestashop.1557/)

