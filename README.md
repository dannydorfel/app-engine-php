# Simple working api for Google-Cloud-Platform

## Usage

### Install google cloud SDK tools

For information on installing the SDK, see [The QuickStart guide for MacOS](https://cloud.google.com/sdk/docs/quickstart-macos)

Also, install the app-engine-php component

    gcloud components install app-engine-php
    
For running the php application, we recommend php7.2. So make sure you install it locally (with homebrew)
    
### Starting the dev app-server

To run the local environment, start the gcp dev app-server with the following command 

    dev_appserver.py . --php_executable_path /usr/local/bin/php-cgi

You will now be able to see the application on [http://localhost:8080/hello-world](http://localhost:8080/hello-world)

### Dev App-Engine Management  

The management application can be found at [http://localhost:8000](http://localhost:8000)
