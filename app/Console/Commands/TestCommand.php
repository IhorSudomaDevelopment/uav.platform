<?php

namespace App\Console\Commands;

use App\Models\Flight;
use App\ValuesObject\Target;
use App\ValuesObject\TargetStatus;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-command';

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
//        $num = DB::table('flights')
//            ->whereDate('date', now('Europe/Kyiv'))
//            ->max('flight_number');
//
//        $num = ($num ?? 0) + 1;
//        echo $num . PHP_EOL;
        $startDate = '2026-03-06';
        $endDate = '2026-03-07';
        $query = DB::table('flights')
            ->where('date', '>=', $startDate)
            ->where('date', '<=', $endDate)
            ->get();
        $status200 = 0;
        $cover = 0;
        foreach ($query as $flight) {
            if ($flight->target === Target::PERSONNEL && str_contains($flight->status, '200')) {
                $q = substr($flight->status, -7, 1);
                $status200 += (int)$q;
            } else if ($flight->target === Target::SHELTER && ($flight->status === TargetStatus::DESTROYED)) {
                $cover++;
            }
        }

//        foreach ($query as $status) {
//            if (str_contains($status, '200')) {
//                $q = substr($status, -7, 1);
//                $status200 += (int)$q;
//            }
//        }
        echo $status200 . PHP_EOL;
        echo $cover . PHP_EOL;
        // print_r($query);
    }
}
