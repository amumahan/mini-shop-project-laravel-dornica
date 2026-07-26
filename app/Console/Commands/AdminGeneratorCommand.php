<?php

namespace App\Console\Commands;

use App\Enums\AdminStatus;
use App\Models\Admin;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class AdminGeneratorCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:admin-generator';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Admin::create([
            'full_name'=>'Admin',
            'user_name'=>'admin',
            'mobile' => '09112345678',
            'email'=>'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'status' => AdminStatus::ACTIVE
        ]);
        $this->info('Admin create');
    }
}
