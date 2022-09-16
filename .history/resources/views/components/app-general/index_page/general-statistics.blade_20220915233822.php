@props(['testimonials'])

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
