{{-- load the main web-app layout --}}
<x-web-app.dashboard.dashboard-web-app-layout :all_countries='$all_countries' :all_categories='$all_categories'>

    <div class="dashboard-title   fl-wrap">
        <h3>Your Opportunities</h3>
    </div>

    @if (count($all_opportunities) == 0)

        <div class="section-title" style="padding-top: 100px !important;">
            <h2 style="color: #325096 !important;">No investment opportunities found!</h2>
        </div>

    @else

        <!-- dashboard-list-box-->
        <div class="dashboard-list-box  fl-wrap">

            {{-- loop through each opportunity --}}
            @foreach ($all_opportunities as $opportunity)

                {{ dd($opportunity) }}

                @if($opportunity->opportunity_other_images->count() > 0)
                    {{ asset('/storage/'. $opportunity->opportunity_other_images) }}<br>
                @else
                    Mentor don't have any intern<br>
                @endif



            @endforeach
            {{-- loop through each opportunity end --}}

        </div>
        <!-- dashboard-list-box end-->

        {{-- pagination section --}}
        {{ $all_opportunities->links('pagination::slice360-custom') }}
        {{-- pagination section end --}}

    @endif

</x-web-app.dashboard.dashboard-web-app-layout>
{{-- load the main web-app layout end --}}
