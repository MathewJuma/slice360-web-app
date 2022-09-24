

{{-- load the main web-app layout --}}
<x-web-app.dashboard.dashboard-web-app-layout :all_countries='$all_countries' :all_categories='$all_categories' :user_details='$user_details'>

    <div class="dashboard-title  fl-wrap">
        <h3>All Opportunity Listings</h3>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <style type="text/css">

                .styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}


.styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
}


.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}

.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}


                </style>
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Points</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Dom</td>
                            <td>6000</td>
                        </tr>
                        <tr class="active-row">
                            <td>Melissa</td>
                            <td>5150</td>
                        </tr>
                        <!-- and so on... -->
                    </tbody>
                </table>

            </div>
        </div>
    </div>

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
