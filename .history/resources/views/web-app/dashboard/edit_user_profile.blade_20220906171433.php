{{-- load the main web-app layout --}}
<x-web-app.dashboard.dashboard-web-app-layout :all_countries='$all_countries' :all_categories='$all_categories'>

    <div class="dashboard-title   fl-wrap">
        <h3>Edit Profile</h3>
        @php
            echo "<pre>"; print_r($user_details); echo "</pre>"
        @endphp

    </div>


</x-web-app.dashboard.dashboard-web-app-layout>
{{-- load the main web-app layout end --}}
