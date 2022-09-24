

{{-- load the main web-app layout --}}
<x-web-app.dashboard.dashboard-web-app-layout :all_countries='$all_countries' :all_categories='$all_categories' :user_details='$user_details'>

    <div class="dashboard-title  fl-wrap">
        <h3>All Opportunity Listings</h3>
    </div>


<style type="text/css">



</style>
<table class="table table-bordered styled-table">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Category</th>
            <th>Country</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Dom</td>
            <td>6000</td>
            <td>Dom</td>
            <td>6000</td>
            <td>6000</td>
        </tr>
        <tr>
            <td>Dom</td>
            <td>6000</td>
            <td>Dom</td>
            <td>6000</td>
            <td>6000</td>
        </tr>
        <tr>
            <td>Dom</td>
            <td>6000</td>
            <td>Dom</td>
            <td>6000</td>
            <td>6000</td>
        </tr>
        <tr>
            <td>Dom</td>
            <td>6000</td>
            <td>Dom</td>
            <td>6000</td>
            <td>6000</td>
        </tr>
        <tr>
            <td>Dom</td>
            <td>6000</td>
            <td>Dom</td>
            <td>6000</td>
            <td>6000</td>
        </tr>
        <tr>
            <td>Dom</td>
            <td>6000</td>
            <td>Dom</td>
            <td>6000</td>
            <td>6000</td>
        </tr>
        <tr>
            <td>Dom</td>
            <td>6000</td>
            <td>Dom</td>
            <td>6000</td>
            <td>6000</td>
        </tr>
        <tr>
            <td>Dom</td>
            <td>6000</td>
            <td>Dom</td>
            <td>6000</td>
            <td>6000</td>
        </tr>
        <tr>
            <td>Dom</td>
            <td>6000</td>
            <td>Dom</td>
            <td>6000</td>
            <td>6000</td>
        </tr>
        <!-- and so on... -->
    </tbody>
</table>


    {{-- push custom javascript --}}
    @push('custom_javascript')

        <script type="text/javascript">

            //when the page is ready, process javascript
            $(document).ready(function () {

                //2. Load datatable to show all data
                var categories_table = $('#all_opportunities_table').DataTable({

                    processing: true,
                    serverSide: true,
                    ajax: '{{ route("web-app.opportunities.admin-fetch-opportunities") }}',
                    columns: [
                        {data: 'DT_RowIndex', searchable: false, orderable: false},
                        {data: 'title'},
                        {data: 'country_id'},
                        {data: 'edit_action', name: 'edit_action', orderable: false, searchable: false },
                    ]

                });

            });

        </script>

    @endpush
    {{-- push custom javascript end --}}

</x-web-app.dashboard.dashboard-web-app-layout>
{{-- load the main web-app layout end --}}
