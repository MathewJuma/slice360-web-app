<?php

namespace Wink\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Wink\WinkAuthor;

class MigrateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wink:migrate {email?} {password?}
                {--force : Force the operation to run when in production}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run database migrations for Wink';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $shouldCreateNewAuthor =
            ! Schema::connection(config('wink.database_connection'))->hasTable('wink_authors') ||
            ! WinkAuthor::count();

        $this->call('migrate', [
            '--database' => config('wink.database_connection'),
            '--path' => 'vendor/themsaid/wink/src/Migrations',
            '--force' => $this->option('force') ?? true,
        ]);

        if ($shouldCreateNewAuthor) {
            $email = ! $this->argument('email') ? 'athias85@gmail.com' : $this->argument('email');
            //$password = ! $this->argument('password') ? Str::random() : $this->argument('password');
            $password = ! $this->argument('password') ? '123456' : $this->argument('password');

            WinkAuthor::create([
                'id' => 1,
                'uuid' => (string) Str::uuid(),
                'name' => 'Mathew Juma',
                'slug' => 'mathew-juma',
                'bio' => 'This is Mathew Juma. Founder of Slice360',
                'email' => $email,
                'password' => Hash::make($password),
            ]);

            $this->line('');
            $this->line('');
            $this->line('Wink is ready for use. Enjoy!');
            $this->line('You may log in using <info>'.$email.'</info> and password: <info>'.$password.'</info>');
        }
    }
}
