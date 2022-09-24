

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

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">

        //when the page is ready, process javascript
        $(document).ready(function () {

            //1. when the link is clicked
            $('#admin-opportunities-page').click(function() {
                console.log('we are home');
            });

        });

    </script>

@endpush
{{-- push custom javascript end --}}
