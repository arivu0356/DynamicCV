@include('theme1.layout.head')
<body class="dark-vertion black-bg">
    <!-- Start Loader -->
    <div class="section-loader">
        <div class="loader">
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- End Loader -->
    @include('theme1.layout.header')
    @yield('content')

    @include('theme1.layout.script')
</body>
</html>