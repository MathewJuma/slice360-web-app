

{{-- load the main web-app layout --}}
<x-web-app.dashboard.dashboard-web-app-layout :all_countries='$all_countries' :all_categories='$all_categories' :user_details='$user_details'>

    <div class="dashboard-title  fl-wrap">
        <h3>All Opportunity Listings</h3>
    </div>

    <table class="table table-bordered" id="all_opportunities_table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

    {{-- push custom javascript --}}
    @push('custom_javascript')

        <script type="text/javascript">

            //when the page is ready, process javascript
            $(document).ready(function () {

                //2. Load datatable to show all data
                var categories_table = $('#category_table').DataTable({

                    processing: true,
                    serverSide: true,
                    ajax: '{{ route("categories.index") }}',
                    columns: [
                        {data: 'DT_RowIndex', searchable: false, orderable: false},
                        {data: 'item_name'},
                        {data: 'item_category'},
                        {data: 'edit_action', name: 'edit_action', orderable: false, searchable: false },
                    ]

                });

            });

        </script>

    @endpush
    {{-- push custom javascript end --}}

</x-web-app.dashboard.dashboard-web-app-layout>
{{-- load the main web-app layout end --}}
