ci3 Phi Boilerplate
===================================
> Under Development

**Nikmat Laravel mana lagi yang kau dustakan**




### Setup/Install
* import sql file
* Clone Repo
* npm install
* composer update
* npm run dev
* login http://foo/admin/auth  username = admin@admin.com password = admin




### CLI





#### Crud Generator

**Syntax**

php oqha.php create:crudDT (tableName string) (controllerOrModelName string)  (pathTo string) 

**example**

>php oqha.php create:crudDT sayur sayuran admin
>- Applications
>  - Modules
>    - Admin
>      - controller
>        - sayuran.php
>      - model
>        - sayuran_model.php
>      - view
>        - sayuran
>          - sayuran_list.php 
>          - sayuran_form.php 







#### Modules Create (Create Folder for Modules)

**Syntax**

php oqha.php create:module (moduleName string)  

**example**

>php oqha.php create:crudDT sayur
>will create
>
>- Applications
>  - Modules
>    - sayur
>      - controller
>        - sayur.php
>      - model
>      - view







#### Seed with Faker

**Syntax**

php oqha.php seed (tableName string) (Total Int)

**example**

* first create files at application/seed/ 
	name of seed files must be same as ur table name
```php
// application/seed/tableName.php
<?php 
 $data = array(
                'tableNameFielduserName' => $faker->unique()->userName, 
                'tableNameFieldlastName' => $faker->lastName,
            );
```

>php oqha.php seed tableName 100






### Todo
* add laravel blade template engine
* add logs action
* add date helper
* Clean Code
* Create documentation
* Add More CLI Command
* Add sublime snippset
* Add more Love


### Resource
* [Code Igniter](https://github.com/bcit-ci/CodeIgniter) 
* [Garuda Crud Generator](https://github.com/nurisakbar/Garuda-CRUD-Generator) 
* [Laravel Mix](https://github.com/JeffreyWay/laravel-mix)
* [AdminLTE](https://github.com/almasaeed2010/AdminLTE) 
* [Faker](https://github.com/fzaninotto/Faker)
* [Datatables](https://github.com/DataTables/DataTables)
* [Mpdf](https://github.com/mpdf/mpdf)
* HarviaCode Generator
* others.....




## License
ci3 Phi Boilerplate is released under the MIT Licence. See the bundled LICENSE file for details.
