<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>RegalDollars.com - {Slogan here}</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="VioletMedia" name="author" />
        @include('admin.includes.head')
    </head>
<body>
    <div id="wrapper">
         @include('client.includes.header')
         @include('client.includes.sidebar')
         <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                   @include('client.includes.settings')
                   @yield('content')
                </div>
            </div>
        </div>
        @include('client.includes.footer')
        @include('client.includes.footer-script')
    </div>
    </body>
</html>
