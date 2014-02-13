<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class LightgearInstaller extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'lightgear:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Lightgear install utility";

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        // is it really a new installation? 
        if ($this->isInstalled()) {
            return $this->error('Lightgear is already installed. Empty your Database to re-install it.');
        }

        // run DB migrations
        $this->runMigrations();

        // create admin user
        $this->createAdmin();
    }

    protected function isInstalled()
    {
        return Schema::hasTable('migrations');
    }

    protected function runMigrations()
    {
        $this->info('Preparing database.');
        $this->call('migrate:install');
        $this->call('migrate');
        $this->info('Done.');
    }

    protected function createAdmin()
    {
        $this->info('Creating administrator account.');

        $username = $this->ask('Administrator username: ');
        $password = $this->secret('Administrator password: ');
        $passwordConfirm = $this->secret('Re-type administrator password: ');

        if ($password === $passwordConfirm) {
            $user = new User();
            $user->username = $username;
            $user->password = Hash::make($password);
            $user->is_admin = true;

            if ($user->save()) {
                return $this->info('Admin user created successfully.');
            }
        } else {
            $this->error('The password you entered don\'t match. Please try again.');
            $this->createAdmin();
        }

    }

}
