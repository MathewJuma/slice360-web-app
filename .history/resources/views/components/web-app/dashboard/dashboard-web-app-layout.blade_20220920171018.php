@props(['all_countries', 'all_categories', 'user_details'])

{{-- load the main web-app layout --}}
<x-app-general.main-web-app-layout :all_countries='$all_countries' :all_categories='$all_categories' :user_details='$user_details'>

    @php
        $current_route_name = Route::currentRouteName();
        dd($user_details); exit();
    @endphp

    {{-- dashboard header section --}}
    <x-web-app.dashboard.dashboard-header :user_details='$user_details'/>
    {{-- dashboard header section end --}}

    <!--  section  -->
    <section class="gray-bg main-dashboard-sec" id="sec1" style="margin-bottom: -50px !important;">
        {{-- main container --}}
        <div class="container">
            <!--  dashboard-menu-->
            <div class="col-md-3">
                <!-- component :: dashboard-header-stats -->
                <x-web-app.dashboard.vertical-nav />
                <!--  component :: dashboard-header-stats  end -->
            </div>
            <!-- dashboard-menu  end-->

            <!-- new opportunity for content-->
            <div class="col-md-9">
                {{-- dashboard content --}}
                {{ $slot }}
                {{-- dashboard content end --}}
            </div>
            <!-- new opportunity for content end-->

        </div>
        {{-- main container end --}}
    </section>
    <!--  section  end-->
    <div class="limit-box fl-wrap"></div>

    {{-- push custom javascript into a components --}}
    @push('custom_javascript')

        <script type='text/javascript'>
            tinymce.init({
                selector: '#detailed_description',
                menubar: true,
                plugins: "link image",
                toolbar: 'undo redo | styleselect | forecolor | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | link image | code'
            });
        </script>

    @endpush
    {{-- push custom javascript into a components end--}}

</x-app-general.main-web-app-layout>
{{-- load the main web-app layout end --}}
