# Invigor Technical Test

The framework I've chosen is Laravel. It's a lightweight framework with very efficient way of route definition, which is a perfect choice for CRUD implementation. Laravel has its own tests folder allowing users to implement unit testing and test with phpunit.
This framework also provides the functionality of database migration with the use of artisan. These are the reasons why I chose this framework.

## Steps to set up
> **Assumptions:**
> - LAMP environment has been set up in your local machine
> - Composer has been installed

**Steps:**
1. git clone https://github.com/ketchol/invigor.git invigor.

2. change current location to invigor folder.

3. run "composer install".

4. copy .env.example to .env.

5. modify the following fields in .env
- DB_DATABASE=**name of database**
- DB_USERNAME=**user name of database**
- DB_PASSWORD=**password of the user account in db**
> **Notice:** Please make sure the user has permissions to **create** and **delete** **tables** for db migration purpose.

6. in project folder, run "sh init.sh" to initialise the project settings.

Without extra settings, project should be accessible through "invigor/public".
