<?php

namespace App\Console;

use App\Models\CleaningPlan;
use App\Models\WgGroup;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Auth;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        $schedule->call(function () {

            $wgs = CleaningPlan::select('wg_id')->distinct()->get();

            foreach($wgs as $wg) {
                $cleaningPlan = CleaningPlan::select('cleaning_task', 'cleaning_plans.id', 'cleaning_plans.updated_at', 'cleaning_plans.update_trigger')
                    ->join('wg_groups', 'cleaning_plans.wg_id', '=', 'wg_groups.id')
                    ->where(function ($query) use ($wg) {
                        $query->where('wg_id' , $wg->wg_id);
                    })
                    ->orderBy('cleaning_plans.updated_at', 'asc')
                    ->first();

                if ($cleaningPlan->update_trigger = true) {
                    $cleaningPlan->update_trigger = false;
                } else {
                    $cleaningPlan->update_trigger = true;
                }
                $cleaningPlan->save();
            }
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
