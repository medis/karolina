<?php
namespace Deployer;
require 'recipe/laravel.php';
// Configuration
$path = '/var/www/karolina';
$live_path = '~/laravel';
set('repository', 'git@github.com:medis/karolina.git');
set('git_tty', true);
add('shared_files', []);
//add('shared_dirs', ['public/storage']);
//add('writable_dirs', ['storage', 'vendor', 'public/storage']);
add('writable_dirs', ['storage', 'vendor']);
set('allow_anonymous_stats', false);
// Hosts
host('audrius.io')
    ->stage('production')
    ->user('deployer')
    ->identityFile('~/.ssh/id_deployex')
    ->set('deploy_path', $path);
// Tasks
desc('Restart PHP-FPM service');
task('php-fpm:restart', function () {
    // The user must have rights for restart service
    // /etc/sudoers: username ALL=NOPASSWD:/bin/systemctl restart php-fpm.service
    run('sudo systemctl restart php-fpm.service');
});
after('deploy:symlink', 'php-fpm:restart');
// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');
// Migrate database before symlink new release.
// before('deploy:symlink', 'artisan:migrate');
