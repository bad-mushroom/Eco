<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CreateAccount extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'eco:make-account {email} {name} {--password=password} {--verify}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a user account.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $email = $this->argument('email');
        $name = $this->argument('name');
        $password = $this->option('password') ?? 'password';

        $user = User::create([
            'email'             => $email,
            'name'              => $name,
            'password'          => Hash::make($password),
            'email_verified_at' => $this->option('verify') ? Carbon::now() : null,
        ]);

        $this->info('User account created:');
        $this->info(' - ID: ' . $user->id);
        $this->info(' - Email: ' . $email);
        $this->info(' - Name: ' . $name);
        $this->info(' - Password: ' . $password);
    }
}
