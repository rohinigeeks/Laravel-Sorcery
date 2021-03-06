Laravel API/Scaffold/CRUD Generator (Laravel5)
=======================
[![Total Downloads](https://poser.pugx.org/mitulgolakiya/laravel-api-generator/downloads.svg)](https://packagist.org/packages/mitulgolakiya/laravel-api-generator)

Laravel Sorcery generates boilerplate code for a Laravel Web App from the MySQL Schema

This command Generator generates following things:
  * Migration File
  * Model
  * Repository (optional)
  * Controller
  * View
    * index.blade.php
    * show.blade.php
    * create.blade.php
    * edit.blade.php
    * fields.blade.php
  * updates routes.php



Here is the full documentation.

Steps to Get Started
----------------------

1. Add this package to your composer.json:
  
        "require": {
            "rohinigeeks/laravel-sorcery": "dev-master"
        }
  
2. Run composer update

        composer update
    
3. Add the ServiceProviders to the providers array in ```config/app.php```.<br>
As we are using these two packages [illuminate/html](https://github.com/illuminate/html) & [laracasts/flash](https://github.com/laracasts/flash) as a dependency.<br>
so we need to add those ServiceProviders as well.

        'Illuminate\View\ViewServiceProvider',
        'Illuminate\Html\HtmlServiceProvider',
        'Laracasts\Flash\FlashServiceProvider'
        'Rohinigeeks\Generator\GeneratorServiceProvider'
        
Also for convenience, add these facades in alias array in ```config/app.php```.

		'Form'  => 'Illuminate\Html\FormFacade',
		'HTML'  => 'Illuminate\Html\HtmlFacade',
		'Flash' => 'Laracasts\Flash\Flash'

4. Publish generator.php

        php artisan vendor:publish --provider='Rohinigeeks\Generator\GeneratorServiceProvider'

5. Fire the artisan command to generate API for Model, or to generate scaffold with views for web applications

        php artisan rohinigeeks.generator:api ModelName
        php artisan rohinigeeks.generator:scaffold ModelName
        
    e.g.
    
        php artisan rohinigeeks.generator:api Project
        php artisan rohinigeeks.generator:api Post
 
        php artisan rohinigeeks.generator:scaffold Project
        php artisan rohinigeeks.generator:scaffold Post


6. And You are ready to go. :)


Documentation
--------------

### Generator Config file

Config file (```config/generator.php```) contains path for all generated files

```path_migration``` - Path where Migration file to ge generated<br>
```path_model``` - Path where Model file to ge generated<br>
```path_repository``` - Path where Repository file to ge generated<br>
```path_controller``` - Path where Controller file to ge generated<br>
```path_views``` - Path where views will be created<br>
```path_request``` -  Path where request file will be created<br>
```path_routes``` - Path of routes.php (if you are using any custom routes file)<br>

```namespace_model``` - Namespace of Model<br>
```namespace_repository``` - Namespace of Repository<br>
```namespace_controller``` - Namespace of Controller<br>
```namespace_request``` - Namespace for Request<br>

### Field Input

Here is the input for the fields by which you can specify Input.

        fieldName:fieldType,options:fieldOptions
        
e.g.,

        email:string:unique
        email:string:unique,default('me@mitul.me')
        title:string,100
        price:flat,8,4

Parameters will be in the same sequence as ```Blueprint``` class function for all types.
Option will be printed as it is given in input except unique & primary.

### API Response Structure
 
**Remember: This response structure is based on the most of my API response structure, you can change it to your API response after file generation in controller.**
 
**Success**

        {
            "flag":true,
            "message":"success message",
            "data":{}
        }


data can be anything as per response.

**Failure**

        {
            "flag":false,
            "message":"failure message",
            "code": 0
            "data":{}
        }

data will be optional. And code will be error code.

### Generated Views

While generating scaffold, all views are created with basic CRUD functionality. (**currently delete is not working**)

Views will be created in ```resources/views/modelName``` folder,

        index.blade.php - Main Index file for listing records
        create.blade.php - To insert a new record
        edit.blade.php - To edit a record
        fields.blade.php - Common file of all model fields, which will be used create and edit record
        show.blade.php - To display a record

Credits
--------

This API Generator was forked from laravel-api-generator created by
1. [Jamison Valenta](https://github.com/jamisonvalenta)
2. [Mitul Golakiya](https://github.com/mitulgolakiya).
3. [Bernhard Breytenbach] (https://github.com/Xethron)

Screenshots
------------

### Command Execution
![Image of Command Execution]
(http://drive.google.com/uc?export=view&id=0B5kWGBdVjC7RbTRvTEswQ0tfOEU)

### Generated Files & routes.php
![Image of Generated Files]
(http://drive.google.com/uc?export=view&id=0B5kWGBdVjC7RZ1VMcXlsM1Z2MDg)

### Migration File
![Image of Migration File]
(http://drive.google.com/uc?export=view&id=0B5kWGBdVjC7RMWtnN1RxUzdmTUE)

### Model File
![Image of Model File]
(http://drive.google.com/uc?export=view&id=0B5kWGBdVjC7RRUJfdHE4MVRaeXM)

### Repository File
![Image of Repository File]
(http://drive.google.com/uc?export=view&id=0B5kWGBdVjC7ROUdNVTVORm5nQ1E)

### Controller File
![Image of Controller File]
(http://drive.google.com/uc?export=view&id=0B5kWGBdVjC7RREVacVlOZDhxNDQ)

### View Files
![Image of View Files]
(http://drive.google.com/uc?export=view&id=0B5kWGBdVjC7RQW5FOXExOFhEbms)
