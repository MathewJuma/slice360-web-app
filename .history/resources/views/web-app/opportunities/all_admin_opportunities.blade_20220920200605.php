

{{-- load the main web-app layout --}}
<x-web-app.dashboard.dashboard-web-app-layout :all_countries='$all_countries' :all_categories='$all_categories' :user_details='$user_details'>

    <div class="dashboard-title   fl-wrap">
        <h3>All Opportunity Listings</h3>
    </div>

    <h1>Data Tables Goes Here!!</h1>

</x-web-app.dashboard.dashboard-web-app-layout>
{{-- load the main web-app layout end --}}

{{-- push custom javascript --}}
@push('custom_javascript')
    {{-- Add datatables --}}


@endpush
{{-- push custom javascript end --}}
