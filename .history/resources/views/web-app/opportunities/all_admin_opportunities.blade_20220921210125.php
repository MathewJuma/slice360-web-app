

{{-- load the main web-app layout --}}
<x-web-app.dashboard.dashboard-web-app-layout :all_countries='$all_countries' :all_categories='$all_categories' :all_opportunities='$all_opportunities' :user_details='$user_details'>

    <div class="dashboard-title  fl-wrap">
        <h3>All Opportunity Listings</h3>
    </div>

    <table class="table table-bordered styled-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Owner</th>
                <th>Category</th>
                <th>Country</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>

            {{-- loop through each opportunity --}}
            @php

                $counter = 1;
                $table_row = '';
                foreach ($all_opportunities as $opportunity) {

                    $table_row .= ' <tr>
                                        <td>'.$counter.'</td>
                                        <td>'.$opportunity->title'</td>
                                        <td>'.$opportunity->opportunity_user->first_name .' '.opportunity_user->last_name.'</td>
                                        <td>'.$opportunity->opportunity_category->name.'</td>
                                        <td>'.$opportunity->opportunity_country->name.'</td>
                                        <td>'.$opportunity->status.'</td>
                                    </tr>';

                    $counter++;
                }

                echo $table_row;

            @endphp
            {{-- loop through each opportunity end --}}

        </tbody>
    </table>

    {{-- push custom javascript --}}
    @push('custom_javascript')

        <script type="text/javascript">

            //when the page is ready, process javascript
            $(document).ready(function () {



            });

        </script>

    @endpush
    {{-- push custom javascript end --}}

</x-web-app.dashboard.dashboard-web-app-layout>
{{-- load the main web-app layout end --}}
