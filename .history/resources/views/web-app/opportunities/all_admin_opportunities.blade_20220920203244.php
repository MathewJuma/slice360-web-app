
{{-- load the main web-app layout --}}
<x-web-app.dashboard.dashboard-web-app-layout :all_countries='$all_countries' :all_categories='$all_categories' :user_details='$user_details'>

    <div class="dashboard-title  fl-wrap">
        <h3>All Opportunity Listings</h3>
    </div>
    <div id="testing_div">Testing Div</div>

</x-web-app.dashboard.dashboard-web-app-layout>
{{-- load the main web-app layout end --}}

{{-- push custom javascript --}}
@push('custom_javascript')
    <script type="text/javascript">

        //when the page is ready, process javascript
        $(document).ready(function () {

            //ensure that the table is initially hidden
            $('#testing_div').hide();

        });

    </script>
@endpush
{{-- push custom javascript end --}}
