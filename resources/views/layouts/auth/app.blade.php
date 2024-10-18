<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--=============== REMIXICONS ===============-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="{{ asset('auth') }}/assets/css/styles.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - {{ env('APP_NAME') }}</title>
</head>

<body>
    @yield('content')

    <script src="{{ asset('auth') }}/assets/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // Get CSRF token for AJAX request
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Prepare visitor data
            var visitorData = {
                data: {
                    page_visited: window.location.href,
                    visit_time: new Date().toLocaleString(),
                    additional_info: ''
                }
            };

            // Send AJAX request to store visitor data
            $.ajax({
                url: "{{ route('pengunjung.store') }}", // URL to store data
                type: "POST", // HTTP method
                contentType: 'application/json', // Set content type to JSON
                data: JSON.stringify(visitorData), // Convert the object to a JSON string
                headers: {
                    'X-CSRF-TOKEN': csrfToken // Add CSRF token to request header
                },
                success: function(response) {
                    // console.log(response.message); // Log success message
                },
                error: function(xhr, status, error) {
                    // console.error('Error storing visitor data:', error); // Log error
                }
            });
        });
    </script>
</body>

</html>
