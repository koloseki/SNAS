<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class RunSqlFile extends Command
{
    protected $signature = 'sql:run {file}';

    protected $description = 'Run SQL file';

    // Function to run SQL file created to run initial SQL file to create tables and insert data
    public function handle()
    {
        $file = $this->argument('file');

        // Odczyt pliku SQL
        $sql = file_get_contents($file);

        // Wykonanie zapytań SQL
        DB::unprepared($sql);

        $this->info('SQL file executed successfully');
    }
}
