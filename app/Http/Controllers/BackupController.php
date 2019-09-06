<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use File;

class BackupController
{

    const DATABASE_FILENAME = __DIR__ . '/database.sql';

    public function index()
    {
        return view('db-backup');
    }

    public function store(Request $request)
    {
        $dbhost = env('DB_HOST');
        $dbuser = env('DB_USERNAME');
        $dbpass = env('DB_PASSWORD');
        $dbname = env('DB_DATABASE');


        // delete previous file
        if (file_exists(self::DATABASE_FILENAME)){
            unlink(self::DATABASE_FILENAME);
        }

        $dbfilename = 'db_'.date("Y_m_d_his").'.sql';

        fopen(self::DATABASE_FILENAME, 'w');

        shell_exec("mysqldump -h $dbhost -u $dbuser -p$dbpass $dbname > " . self::DATABASE_FILENAME);

        return response()->download(self::DATABASE_FILENAME, $dbfilename);
    }
}