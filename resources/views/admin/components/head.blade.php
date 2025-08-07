<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Admin Dashboard</title>
<link rel="stylesheet" href="{{ asset('public/css/admin/style.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<!-- Section-Specific CSS -->
@if ($section === 'home')
    <link rel="stylesheet" href="{{ asset('public/css/admin/home.css') }}">
@elseif ($section === 'products')
    <link rel="stylesheet" href="{{ asset('public/css/admin/products.css') }}">
@elseif ($section === 'services')
    <link rel="stylesheet" href="{{ asset('public/css/admin/services.css') }}">
@elseif ($section === 'warranties')
    <link rel="stylesheet" href="{{ asset('public/css/admin/warranties.css') }}">
@elseif ($section === 'sell_products')
    <link rel="stylesheet" href="{{ asset('public/css/admin/sell-products.css') }}">
@endif
