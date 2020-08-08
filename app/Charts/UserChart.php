<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\Posting;
use App\User;

class UserChart extends BaseChart
{
    public ?string $name = 'charts_user';

    public ?string $routeName = 'chart_user';

    public ?string $prefix = 'api/chart';

    public ?array $middlewares = [];

    public function handler(Request $request): Chartisan
    {
        $label      = [];
        $value      = [];

        $daterange = User::all();
        // $users = User::where(function ($query) {
        //     $query->select('user_id')
        //         ->from('posting')
        //         ->whereColumn('id', 'user_id')
        //         ->orderByDesc()
        //         ->count()
        //         ->limit(5);
        // }, 'Pro')->get();

        foreach($daterange as $cdate){
            $label[]    = $cdate->id;
            $value[]    = \App\Posting::where('user_id', $cdate->id)->count();
        }


        return Chartisan::build()
            ->labels($label)
            ->dataset('Total User', $value);
    }
}