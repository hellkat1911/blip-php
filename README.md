# Blip PHP
##### An ultra-light MVC framework for your PHP/MySQL project

##### Deployment:

I like to use Homestead for PHP development so these instructions are based on that. As stated above, the framework is useful for small or medium projects, anything larger you'd probably want to go with Laravel or similar. The default database is MySQL and as such utilizes PDO, but it can be tweaked for PostgreSQL and others. Lastly, I did this for fun to help with structuring my future MVC projects, any comments/suggestions/fixes are appreciated!

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
