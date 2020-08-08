<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\Posting;

class SampleChart extends BaseChart
{
    /**
     * Determines the chart name to be used on the
     * route. If null, the name will be a snake_case
     * version of the class name.
     */
    public ?string $name = 'charts';

    /**
     * Determines the name suffix of the chart route.
     * This will also be used to get the chart URL
     * from the blade directrive. If null, the chart
     * name will be used.
     */
    public ?string $routeName = 'sample_chart';

    /**
     * Determines the prefix that will be used by the chart
     * endpoint.
     */
    public ?string $prefix = 'api/chart';

    /**
     * Determines the middlewares that will be applied
     * to the chart endpoint.
     */
    public ?array $middlewares = [];

    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {

        $label      = [];
        $value      = [];

        $start      = now()->subdays(7);
        $end        = now();

        $interval   = new \DateInterval('P1D');
        $daterange  = new \DatePeriod($start, $interval , $end);

        foreach($daterange as $cdate){
            $label[]    = $cdate->format('d/M/Y');
            $value[]    = \App\Posting::where('created_at', '>=', \Carbon\Carbon::parse($cdate)->startofday())->where('created_at', '<=', \Carbon\Carbon::parse($cdate)->endofday())->count();
        }
        
        return Chartisan::build()
            ->labels($label)
            ->dataset('Total Post', $value);
    }
}