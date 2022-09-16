<section class="parallax-section small-par" data-scrollax-parent="true">
    <div class="bg par-elem "  data-bg="{{ asset('web_app/images/bg/statistics.jpg') }}" data-scrollax="properties: { translateY: '30%' }"></div>
    <div class="overlay  op7"></div>
    <div class="container">
        <div class=" single-facts single-facts_2 fl-wrap">
            <x-app-general.index_page.general-statistics :all_opportunities='$all_opportunities' :new_monthly_visitors='$new_monthly_visitors'  />
        </div>
    </div>
</section>
