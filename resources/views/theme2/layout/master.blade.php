@include('theme2.layout.head')
<body class="white-vertion black-bg">
    <!-- Start Loader -->
    <div class="section-loader">
        <div class="loader">
            <div></div>
            <div></div>
        </div>
    </div>
    @include('theme2.layout.header')
    @yield('content')

    @include('theme2.layout.script')
</body>
</html>