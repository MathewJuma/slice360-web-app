{{-- load the main web-app layout --}}
<x-web-app.dashboard.dashboard-web-app-layout :all_countries='$all_countries' :all_categories='$all_categories' :user_details='$user_details'>

    <div class="dashboard-title   fl-wrap">
        <h3>My Opportunity Listings</h3>
    </div>

    @if (count($all_opportunities) === 0)

        <div class="dashboard-list fl-wrap" style="margin-bottom: 10px !important;">
            <div class="dashboard-message-text" style="width: 100% !important; border: 0px solid blue;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="{{ asset('/web_app/images/slice360_blue.png') }}" alt="">
                            </div>
                            <div class="col-md-9" style="text-align:left !important; padding-top: 15px !important;">
                                <h2 style="font-size: 20px !important; font-weight: bold !important; color: #325096 !important;">
                                    You have no investment opportunities in our database!
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else

        <!-- dashboard-list-box-->
        <div class="dashboard-list-box fl-wrap">

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
                <div class="dashboard-list fl-wrap" style="margin-bottom: 10px !important;">
                    <div class="dashboard-message">
                        <div class="booking-list-contr">
                            {{-- logic to show edit/delete or locked --}}
                            @if ($opportunity->is_locked === "Yes")
                                <a href="{{ route('web-app.opportunities.show-opportunity', $opportunity->id.'-'.Str::slug($opportunity->title)) }}" class="yellow-bg tolt" data-microtip-position="left" data-tooltip="Locked"><i class="fal fa-lock"></i></a>

                                {{-- check if published --}}
                                @if ($opportunity->is_published === "Yes")
                                    <a href="{{ route('web-app.opportunities.show-opportunity', $opportunity->id.'-'.Str::slug($opportunity->title)) }}" class="green-bg tolt" data-microtip-position="left" data-tooltip="Published"><i class="fal fa-check-circle"></i></a>
                                @endif
                                {{-- check if published end --}}

                            @else

                                <a href="{{ route('web-app.opportunities.edit-opportunity', $opportunity->id.'-'.Str::slug($opportunity->title)) }}" class="color-bg tolt" data-microtip-position="left" data-tooltip="Edit"><i class="fal fa-edit"></i></a>
                                <span class="red-bg tolt" data-microtip-position="right" data-tooltip="Delete">
                                    <form action="{{ route('web-app.opportunities.delete-opportunity', $opportunity->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="delete_source" value="my_opportunities">
                                        <button type="submit" class="custom_submit_buttons">
                                            <i class="fal fa-trash" style="color: #ffffff !important;"></i>
                                        </button>
                                    </form>
                                </span>
                            @endif
                            {{-- logic to show edit/delete or locked end --}}
                        </div>
                        <div class="dashboard-message-text" style="border: 0px solid red;">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="{{ asset($image_path ) }}" alt="">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="geodir-category-content-title fl-wrap">
                <div class="geodir-category-content-title-item">
                    <h3 class="title-sin_map">
                        <a href="/opportunities/{{ $opportunity->id }}-{{ Str::slug($opportunity->title) }}">{{ $opportunity->title }}</a>
                        {{-- logic to show if opportunity is verified or not --}}
                        @if ($opportunity->is_verified === "Yes")
                            <span class="verified-badge tolt" data-microtip-position="bottom" data-tooltip="Slice360 Verified">
                                <i class="fal fa-check"></i>
                            </span>
                        @else
                            <span class="danger-badge tolt" data-microtip-position="bottom" data-tooltip="Not Verified">
                                <i class="fal fa-exclamation"></i>
                            </span>
                        @endif
                        {{-- logic to show if opportunity is verified or not end --}}
                    </h3>
                    <div class="geodir-category-location fl-wrap">
                        <a href="/opportunities?interest=&category_id=All+Categories&country_id={{ $country_details->id }}" >
                            <i class="fas fa-map-marker-alt"></i> {{ $opportunity->city . ', ' .$country_details->name }}
                        </a>
                    </div>
                </div>
            </div>
                                            <div class="geodir-category-location clearfix" style="padding-bottom: 10px !important;">
                                                <a href="/opportunities/{{ $opportunity->id }}-{{ Str::slug($opportunity->title) }}" style="font-size: 10px !important;">{{$opportunity->city.', '.$opportunity->opportunity_country->name }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="geodir-category-location clearfix" style="font-size: 9px; color:#7d93b2; text-align: left !important; padding-top: 5px;">
                                        <span>{{ $opportunity->brief_description }}</span>
                                    </div>
                                </div>
                            </div>
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
