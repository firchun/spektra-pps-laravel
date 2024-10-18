<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 36px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title">
                @yield('message')
            </div>
        </div>
    </div>
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
                url: "{{ route('pengunjung.store') }}",
                type: "POST",
                data: visitorData, // Tidak perlu JSON.stringify() karena 'processData: false'
                processData: false, // Jangan proses data karena format JSON
                contentType: 'application/json', // Set content type ke JSON
                headers: {
                    'X-CSRF-TOKEN': csrfToken // Tambahkan CSRF token ke header
                },
                success: function(response) {
                    console.log(response.message); // Log success message
                },
                error: function(xhr, status, error) {
                    console.error('Error storing visitor data:', error); // Log error
                }
            });
        });
    </script>
</body>

</html>
