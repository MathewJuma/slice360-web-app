{{-- load the main web-app layout --}}
<x-app-general.main-web-app-layout :all_countries='$all_countries' :all_categories='$all_categories'>

    @php

        //funding_status, $funding_status_icon and funding_status_color
        $funding_status = $opportunity_details->funding_status;
        $funding_status_icon = (($funding_status == "opening soon") ? "fal fa-lock-open" : (($funding_status == "fund raising") ? "fal fa-check-circle" : (($funding_status == "closing soon") ? "fal fa-clock" : (($funding_status == "funding closed") ? "fal fa-lock" : ""))));
        $funding_status_color = (($funding_status == "opening soon") ? "geodir_status_date orange-bg" : (($funding_status == "fund raising") ? "geodir_status_date green-bg" : (($funding_status == "closing soon") ? "geodir_status_date purp-bg" : (($funding_status == "funding closed") ? "geodir_status_date gsd_close" : ""))));

        //banner_images and other_images arrays
        $banner_images_array = $opportunity_details->banner_images;
        $other_images_array = $opportunity_details->other_images;

    @endphp

</x-app-general.main-web-app-layout>
{{-- load the main web-app layout end --}}
