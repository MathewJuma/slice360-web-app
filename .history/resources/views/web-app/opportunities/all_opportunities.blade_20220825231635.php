{{-- load the main web-app layout --}}
<x-app-general.main-web-app-layout :all_countries='$all_countries' :all_categories='$all_categories'>

    <!--component :: grow your wealth :: hero -->
    <x-app-general.hero-main title='Explore Opportunities' description='Discover investment opportunities across the globe that align with your vision' :all_countries='$all_countries' :all_categories='$all_categories' />
    <!--component end :: grow your wealth :: hero-->

</x-app-general.main-web-app-layout>
{{-- load the main web-app layout end --}}
