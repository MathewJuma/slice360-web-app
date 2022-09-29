@php

    //set inital values

@endphp

{{-- load the main web-app layout --}}
<x-app-general.main-web-app-layout :all_countries='$all_countries' :all_categories='$all_categories' :user_details='[]'>

    <!--component :: slice360 blog :: hero inner -->
    <x-app-general.hero-inner title='Slice360 Blog' description='Lastest news about all opportunities form emerging markets and around the globe' imageName='about-us.jpg'/>
    <!--component end :: slice360 blog :: hero inner-->



</x-app-general.main-web-app-layout>
{{-- load the main web-app layout end --}}
