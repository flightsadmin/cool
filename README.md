# Cool

[![Latest Version on Packagist](https://img.shields.io/packagist/v/flightsadmin/cool.svg?style=flat-square)](https://packagist.org/packages/flightsadmin/cool)
[![Total Downloads](https://img.shields.io/packagist/dt/flightsadmin/cool.svg?style=flat-square)](https://packagist.org/packages/flightsadmin/cool)

This Package provides easy way to enable, disable and Remove packages during local laravel development.
Many time you want to try your Package locally before submitting to packagist.org 

## Installation

Installation is simple
```bash
composer require flightsadmin/cool --dev
```
This will install the package as a dev dependancy.

## Using this package

Execute below commands as required.

#### To Enable Local packages.
```bash
php artisan cool:enable {vendor} {package}
````

#### To Disable Local packages.
```bash
php artisan cool:disable {vendor} {package}
````
#### To Remove Local packages.
```bash
php artisan cool:remove vendor package
````
**Replace**

*{vendor} with the package vendor-name*

*{package} with the package-name*

## Conclussion
This package will be helpful with local development.