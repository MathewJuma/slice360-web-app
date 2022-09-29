@php

    //set inital 0 values
    $opportunity_count = 0; $total_amount_funded = 0; $total_opportunities = 0;

    //first and last dates of the month
    $first_month_date = strtotime(date('01-m-Y 00:00:00')); // hard-coded '01' for first day
    $last_month_date  = strtotime(date('t-m-Y 23:59:59')); //last date of the current month

    //loop through each opportunity
    foreach ($all_opportunities as $opportunity) {

        //fetch created_at
        $created_at = strtotime(date('d-m-Y H:i:s', strtotime($opportunity->created_at)));

        //increament if the created_at is within limits
        if($created_at >= $first_month_date && $created_at <= $last_month_date){

            $opportunity_count++;

        }

        //work on the % funding
        if($opportunity->amount_needed == $opportunity->amount_raised){

            $total_amount_funded = $total_amount_funded + ($opportunity->amount_raised/1000);
            $total_opportunities ++;

        }

    }

    //dd(number_format($total_amount_funded,0,",",""));

@endphp

{{-- load the main web-app layout --}}
<x-app-general.main-web-app-layout :all_countries='$all_countries' :all_categories='$all_categories' :user_details='[]'>

    <!--component :: slice360 blog :: hero inner -->
    <x-app-general.hero-inner title='Slice360 Blog' description='Lastest news on new opportunities form around the globe' imageName='about-us.jpg'/>
    <!--component end :: slice360 blog :: hero inner-->



</x-app-general.main-web-app-layout>
{{-- load the main web-app layout end --}}
