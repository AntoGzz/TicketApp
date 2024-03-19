<!DOCTYPE html>
<html lang="en">

    @include('layouts/includes.header')

    <body class="hold-transition sidebar-mini layout-fixed">

        <div class="wrapper">

            @include('layouts/includes.loader')
            @include('layouts/includes.topBar')
            @include('layouts/includes.leftBar')

            <div class="content-wrapper">
                @yield('breadcrumb')
                @yield('content')
            </div>

            @include('layouts/includes.footer')
            @include('layouts/includes.rightBar')

        </div>

        @include('layouts/includes.bottom')

    </body>
</html>
