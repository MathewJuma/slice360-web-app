@props(['all_opportunities'])

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

<!-- inline-facts -->
<div class="inline-facts-wrap">
    <div class="inline-facts">
        <div class="milestone-counter">
            <div class="stats animaper">
                <div class="num" data-content="0" data-num="{{ $opportunity_count }}">{{ $opportunity_count }}</div>
            </div>
        </div>
        <h6>New Opportunities This Month</h6>
    </div>
</div>
<!-- inline-facts end -->
<!-- inline-facts  -->
<div class="inline-facts-wrap">
    <div class="inline-facts">
        <div class="milestone-counter">
            <div class="stats animaper">
                <div class="num" data-content="0" data-num="{{ $new_monthly_visitors }}">{{ $new_monthly_visitors }}</div>
            </div>
        </div>
        <h6>Visitors This Month</h6>
    </div>
</div>
<!-- inline-facts end -->
<!-- inline-facts  -->
<div class="inline-facts-wrap">
    <div class="inline-facts">
        <div class="milestone-counter">
            <div class="stats animaper">
                <div class="num" data-content="0" data-num="{{ $total_opportunities }}">
                    {{ $total_opportunities }}
                </div>
            </div>
        </div>
        <h6>Fully Funded Opportunities</h6>
    </div>
</div>
<!-- inline-facts end -->
<!-- inline-facts  -->
<div class="inline-facts-wrap">
    <div class="inline-facts">
        <div class="milestone-counter">
            <div class="stats animaper">
                <div class="num" data-content="0" data-num="{{ number_format($total_amount_funded,0,",","") }}">
                    {{ number_format($total_amount_funded,0,",","") }}
                </div>
            </div>
        </div>
        <h6>Opportunities Funding in $ ,000</h6>
    </div>
</div>
<!-- inline-facts end -->
