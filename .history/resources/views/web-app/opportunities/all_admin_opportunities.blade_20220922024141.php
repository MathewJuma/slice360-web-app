
{{-- {{ dd($all_opportunities) }} --}}
{{-- load the main web-app layout --}}
<x-web-app.dashboard.dashboard-web-app-layout :all_countries='$all_countries' :all_categories='$all_categories' :all_opportunities='$all_opportunities' :user_details='$user_details'>

    <div class="dashboard-title  fl-wrap">
        <h3>All Opportunity Listings</h3>
    </div>
    <form method="GET" class="mb-3">
        <div class="input-group mb-3">
            <input type="text" name="search" value="{{ request()->get('search') }}" class="form-control" placeholder="Search..." aria-label="Search" aria-describedby="button-addon2">
            <button class="btn btn-primary" type="submit" id="button-addon2">Search</button>
        </div>
    </form>
    <table class="table table-bordered styled-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Owner</th>
                <th>Category</th>
                <th>Country</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            {{-- loop through each opportunity --}}
            @foreach ($all_opportunities as $opportunity_key => $opportunity)
                <tr>
                    <td class="tb_index_column">{{ $all_opportunities->firstItem() + $opportunity_key }}.</td>
                    <td>{{ $opportunity->title }}</td>
                    <td>{{ $opportunity->opportunity_user->first_name .' '. $opportunity->opportunity_user->last_name }}</td>
                    <td>{{ $opportunity->opportunity_category->name }}</td>
                    <td>{{ $opportunity->opportunity_country->name }}</td>
                    <td>{{ $opportunity->status == 1 ? 'Active' : 'Inactive' }}</td>
                    <td class="tb_last_column">Edit | Delete</td>
                </tr>
            @endforeach
            {{-- loop through each opportunity end --}}

        </tbody>
    </table>

    {{-- pagination section --}}
    {{ $all_opportunities->links('pagination::slice360-custom') }}
    {{-- pagination section end --}}

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
