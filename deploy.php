<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'git@github.com:medis/karolina.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('128.140.61.113')
    ->set('remote_user', 'root')
    ->set('deploy_path', '/var/www/karolina');

// Hooks

after('deploy:failed', 'deploy:unlock');
