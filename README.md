# API REST IZERTIS


## Entorno

* PHP 8.1.1
* Docker
* Symfony 5.4

## Instalacion

- Clone o descargue el proyecto desde https://github.com/lliccien/izertis-backend.git

- Ejecute el comando en la terminal `composer install`

## Ejecucion

- Ejecute el comando en la terminal  `docker-composer up -d --build`
- Agregue al archivo `hosts` del sistema los sigiente `127.0.0.1  izertis.test`
- Consulte la url http://izertis.test/{operation}/{operatorA}/{operatorB} cambiando los valores de `operator` por add ó subtract ó multiply ó divide
y los valores de `operatorA` y `operatorA` por numeros
