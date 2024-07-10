<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="The modern, accessible and dark theme ready HTML dashboard. Full of custom, reusable components to speed up the development of admin panels.">
    <meta name="author" content="abdulbasit-dev">
    <title>Admissions App</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('assets/css/tailwind.output.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/Chart.min.css') }}" />

    <!-- tailwind cdn  -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- fontawesome cdn  -->
    <script src="https://kit.fontawesome.com/8e5d576196.js" crossorigin="anonymous"></script>

    <!-- select cdn  -->

    <!-- Include Select2 CSS and JS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- tables cdn  -->

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>


    {{-- favicon --}}
    <link rel="icon" sizes="180x180" href="{{ asset('assets/img/windmill.png') }}">

</head>
<style>
    .select2-container {
        width: 100% !important;
        border: none;
    }

    .select2-selection {
        height: 38px !important;
        border: none;
    }

    .select2-selection__rendered {
        line-height: 38px !important;
        border: none;

    }

    .select2-selection__arrow {
        height: 38px !important;
    }

    .select2-container--default .select2-selection--single {
        background: none;
        /* Remove background */
        box-shadow: none;
        /* Remove shadow */
    }

    .select2-container .select2-search--inline .select2-search__field {
        width: 100% !important;
        /* Ensure search field width is 100% */
        padding: 0.5rem;
        /* Add padding for search field */
        border: none;
        /* Add border */
        border-radius: 0.375rem;
        /* Add border radius */
        background: inherit;
        /* Inherit background color */
        color: inherit;
        /* Inherit text color */
    }
</style>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- Desktop sidebar -->
        @include('includes.desktop-sidebar')

        <!-- Mobile sidebar -->
        @include('includes.mobile-sidebar')

        <div class="flex flex-col flex-1 w-full">
            @include('includes.header')
            <main class="h-full overflow-y-auto">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="{{ asset("assets/js/alpine.min.js") }}" defer></script>
    <script src="{{ asset("assets/js/Chart.min.js") }}" defer></script>
    <script src="{{ asset("assets/js/init-alpine.js") }}"></script>
    <script src="{{ asset("assets/js/charts-lines.js") }}" defer></script>
    <script src="{{ asset("assets/js/charts-pie.js") }}" defer></script>

    <script>
        $(document).ready(function() {
            $('#select').select2();
        });
    </script>


</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteBtns = document.querySelectorAll('.deleteBtn');
        const deleteModal = document.getElementById('deleteModal');
        const closeModal = document.getElementById('closeModal');
        const cancelBtn = document.getElementById('cancelBtn');
        const deleteForm = document.getElementById('deleteForm');

        deleteBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const streamId = this.getAttribute('data-id');
                deleteModal.classList.remove('hidden');
            });
        });

        closeModal.addEventListener('click', function() {
            deleteModal.classList.add('hidden');
        });

        cancelBtn.addEventListener('click', function() {
            deleteModal.classList.add('hidden');
        });
    });
</script>
<!-- table scripts -->
<script>
    $(document).ready(function() {
        $('#table').DataTable({
            responsive: true
        });
    });
</script>

</html>