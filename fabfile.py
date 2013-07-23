from fabric.api import *

env.hosts = ['learn.dsl-platform.com']

def deploy():
    with cd('/var/www/dsl-sandbox'):
        sudo('git pull', user="www-data")
        sudo('composer install', user="www-data")
    print('Deploying vagrant...')
    with cd('/vagrant/dsl'):
        sudo("vagrant ssh -c \\\n"
            "\"sudo su www-data -c \\\n"
            "'cd /var/www/dsl-sandbox; git pull; composer install\'\"")
