# Symfony5 DDD skeleton
Se trata de un ejemplo de uso de Symfony 5 con php8 y una estructura DDD, para utilizarlo como referencia de nuestras
aplicaciones/microservicios. Inicialmente está pensado para aplicaciones tipo REST, aunque es posible utilizarlo para
otros fines.

Se incluye un docker-compose para poder probar directamente la aplicación. 

## Requisitos
- php 8.0 instalado en local
- Docker y Docker-compose
- composer

## Documentación
- [Changelog](docs/0_CHANGELOG.md)
- [DDD](docs/1_DDD.md)
- [Instalación](docs/2_INSTALACION.md)
- [Makefile](docs/3_MAKEFILE.md)

## Lista TODO
- implementar CQRS
- kernel asincrono (react-php)
- añadir sistema de respuestas erroneas, para indicar un 'status' => false y el error correspondiente.
- Testing. No me ha dado tiempo a revisarlo