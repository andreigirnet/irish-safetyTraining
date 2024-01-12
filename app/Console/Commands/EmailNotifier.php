<?php

namespace App\Console\Commands;
use App\Mail\NotifyMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class EmailNotifier extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:notifier';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $users = DB::select('SELECT MAX(u.email) as email, MAX(u.id) as id FROM users AS u LEFT JOIN packages AS p ON p.user_id = u.id WHERE p.id IS NULL AND u.created_at >= NOW() - INTERVAL 1 DAY AND u.created_at < NOW() AND u.notified = 0 GROUP BY u.id;');

        for($i = 0; $i<count($users); $i++){
            Mail::to($users[$i]->email)->send(new NotifyMail());
            DB::statement('UPDATE users SET notified = 1 WHERE id = ' . $users[$i]->id);
        }
    }
}
