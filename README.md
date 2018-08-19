# Blip PHP
###### An ultra-light MVC framework for your PHP project

###### Deployment:

I like to use Homestead for PHP development so these instructions are based on that.

1) Clone the repo into your Homestead shared folder (here it's ~/Code):

```
$ cd ~/Code && git clone https://github.com/hellkat1911/blip-php.git
```

2) Switch to your Homestead folder, boot the VM, and SSH in:

```
$ cd ~/Homestead && vagrant up && vagrant ssh
```

3) In the VM, switch to the project root folder and install packages:

```
$ cd ~/Code/blip-php
$ npm install
$ composer install
```

4) Copy .env.example to .env (make sure you check that .env contains the
correct credentials and not just placeholders)

```
$ cp ./.env.example ./.env
```
