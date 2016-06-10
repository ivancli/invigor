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

Finally in project folder, run **"sh init.sh"** to initialise the project settings.

Without extra settings, project should be accessible through "invigor/public".

In order to run unit testing, simply go to project directory in command prompt/terminal and run **"phpunit"**

This project took me around 7-8 hours discontinuously including testing and readme.md creation.

Due to time consideration, I haven't handled the exception of MySQL insert package size limitation and Apache memory size while coding the image upload function. And in the product create success test case, I haven't think of the way to delete the created product for that test case, since result is redirected after product created. Unable to retrieve newly created product information.

And I've overlooked the test requirement, missed the pagination and sorting functionality. Added them back on Friday night, and updated the total use of time mentioned above.
