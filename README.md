## PrintAlert - Incident management system
[![MIT](https://img.shields.io/cocoapods/l/AFNetworking.svg)](https://github.com/emilwallner/Screenshot-to-code-in-Keras/blob/master/LICENSE)

PrintAlert is an incident management system for printers in your company. 

## Demo (English translation is comming soon)

![alt text](https://github.com/markushaug/print_alert/blob/master/demo.gif)

## Features

- Fast and easy-to-use
- Multiple rooms/offices
- Add printers/devices and map the respective rooms
- Customize user-defined alerts that you want to send
- E-Mail notification for the chosen users
- Beautiful and refreshing backgrounds from <a href="https://unsplash.com">unsplash.com</a>


## Installation

1. Clone the repository
2. Navigate to the directory
3. Run ```composer install``` (<a href="https://getcomposer.org">Composer</a> is required)
4. Rename the ".env.example" file to ".env" and setup your database & mail settings
5. Run ```php artisan key:generate```
6. Run ```php artisan migrate```
7. Set the webroot of your webserver to the "public" folder

## License

The incident management system is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

