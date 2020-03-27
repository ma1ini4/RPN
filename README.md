### CLI RPN Calculator

### Instruction

You need to open a Terminal and run the following commands
* `composer install`
* `php index.php`

### Requirements

* Php >= 7
* Composer
* Bash


### Project Description

Here we have CLI class in Output directory which is handling our I/O. All Output Classes must implement the Streamable interface. This approach allows us to switch output to other implementations without breaking the app.

The project uses composer autoload by using it, we avoid any custom autoloader and in the future we can easily register dependencies in it.

The main RPN calculator is created to do the basic calculation. It can be extended either. The Class is static now and it causes some problems with the testing, but it isn't a case of our application, because it's enough for the simple implementation .

### Notes

* The solution isn't tested on Windows or Mac systems
