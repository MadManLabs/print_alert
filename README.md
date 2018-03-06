<h1 align="center">
  PrintAlert 🖨
  <br>
</h1>

<h4 align="center">Incident management system</h4>


<p align="center">
  <a href="https://travis-ci.org/markushaug/print_alert">
    <img src="https://travis-ci.org/markushaug/print_alert.svg?branch=master">
  </a>
  <a href="https://packagist.org/packages/markushaug/print_alert">
    <img src="https://poser.pugx.org/markushaug/print_alert/downloads">
  </a>
  <a href="https://packagist.org/packages/markushaug/print_alert">
    <img src="https://poser.pugx.org/markushaug/print_alert/v/stable">
  </a>
</p>

[![Dashboard](https://github.com/markushaug/print_alert/blob/master/demo.gif)](https://github.com/markushaug/homify)

## Table of content

- [About PrintAlert](#about-printalert)
- [Key Features](#key-features)
- [Setup](#setup)
    - [Composer](#composer)
    - [Database](#database)
    - [Webserver](#webserver)
- [FAQ / CONTACT / TROUBLESHOOT](#faq--contact--troubleshoot)
- [Contributing](#contributing)
- [License](#license)

## ABOUT PRINTALERT
PrintAlert is an incident management system for printers in your company. 


## KEY FEATURES

- Fast and easy-to-use
- Multiple rooms/offices
- Add printers/devices and map the respective rooms
- Customize user-defined alerts that you want to send
- E-Mail notification for the chosen users
- Beautiful and refreshing backgrounds from <a href="https://unsplash.com">unsplash.com</a>


## SETUP
To install and run this application, you'll need <a href="https://getcomposer.org/">Composer</a> and PHP7 installed on your computer. 

### Composer
```bash
# Download & install Homify with its dependencies
$ composer create-project markushaug/print_alert
$ composer update
```

### Database
Setup your database & mail settings in the ```.env``` file and then run:

```bash
# Creating tables and inserting their default values to them
$ php artisan migrate
$ php artisan db:seed
```

### Webserver
- Set the webroot of your webserver to the ```public``` folder
- Grant permissions to the homify folder. 
  - If the application runs into an issue, try this command inside of the homify directory: ```chmod -R 777 storage```.


## FAQ / CONTACT / TROUBLESHOOT
If you run into issues while using PrintAlert or during development of a component, please use one of the following options:

- Use github's issue reporter on the right, so that other people can search these issues too
- Send me an email <a href="mailto:mh@haugmarkus.de">mh@haugmarkus.de</a> (might take a few days)

## License

The incident management system is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).


---

> Homepage [haugmarkus.de](https://www.haugmarkus.de) &nbsp;&middot;&nbsp;
> GitHub [@markushaug](https://github.com/markushaug) &nbsp;&middot;&nbsp;
> Twitter [@_markushaug_](https://twitter.com/_markushaug_)

