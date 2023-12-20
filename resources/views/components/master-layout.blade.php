<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MOVIE COLLECTION</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    @livewireStyles
</head>
<body>
<nav class="navbar navbar-expand-lg bg-info">
    <div class="container-fluid">
        <h1 style="text-align: center; width: 100%">Movie Collection</h1>
    </div>
</nav>
{{ $slot }}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
@livewireScripts
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<x-livewire-alert::scripts />
<script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('redirect', data => {
            setTimeout(function () {
                window.location.href = data;
            }, 2000);
        })
        Livewire.on('redirect:new', data => {
            let a = document.createElement('a');
            a.target = '_blank';
            a.href = data;
            a.click();
        })
    });
</script>
</body>
</html>
