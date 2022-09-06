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

                {{-- start image processing --}}
                @if($opportunity->opportunity_other_images->count() > 0)
                    @php
                        $image_path = '/storage/'. $opportunity->opportunity_other_images[0]->image_path;
                    @endphp
                @else

                    @php
                        $image_path = '/web_app/images/slice360_blue.png';
                    @endphp

                @endif
                {{-- start image processing --}}


                <!-- dashboard-list -->
                <div class="dashboard-list fl-wrap">
                    <div class="dashboard-message">
                        <div class="booking-list-contr">
                            <a href="#" class="color-bg tolt" data-microtip-position="left" data-tooltip="Edit"><i class="fal fa-edit"></i></a>
                            <a href="#" class="red-bg tolt" data-microtip-position="left" data-tooltip="Delete"><i class="fal fa-trash"></i></a>
                        </div>
                        <div class="dashboard-message-text">
                            <img src="{{ asset($image_path ) }}" alt="">
                            <h4 style="font-size: 10.4px !important; font-weight: bold !important;">
                                <a href="/opportunities/{{ $opportunity->id }}-{{ Str::slug($opportunity->title) }}">{{ $opportunity->title }}</a>
                            </h4>
                            <div class="geodir-category-location clearfix"><a href="/opportunities/{{ $opportunity->id }}-{{ Str::slug($opportunity->title) }}">{{$opportunity->city.', '.$opportunity->opportunity_country->name }}</a></div>
                        </div>
                    </div>
                </div>
                <!-- dashboard-list end-->

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
