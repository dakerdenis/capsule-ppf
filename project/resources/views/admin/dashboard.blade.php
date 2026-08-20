<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.components.head')
</head>

<body>

    <div class="admin__wrapper">
        @include('admin.components.sidebar')
        <div class="admin__wrapper__content">
            <!-- Burger button -->
            <button id="burger-toggle" class="burger-btn">
                <i class="fas fa-bars"></i>
            </button>

            <div class="admin__content_container">
                @include('admin.components.' . $section)
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script>
        setInterval(() => {
            fetch('{{ route('admin.dashboard') }}', {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.text())
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const newTime = doc.querySelector('#server-time-display')?.innerText;
                    if (newTime) {
                        document.getElementById('server-time-display').innerText = newTime;
                    }
                });
        }, 60000); 
    </script>

    @stack('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const burgerBtn = document.getElementById('burger-toggle');
            const sidebar = document.querySelector('.admin__wrapper__controlpanel');
    
            burgerBtn.addEventListener('click', () => {
                sidebar.classList.toggle('open');
            });
        });
    </script>
</body>

</html>
