@extends('layouts.frontend.main')

@section('main-section')

<script>
    const searchForm = document.getElementById('searchForm');
    const searchInput = document.getElementById('searchInput');

    if (searchInput.value) {
        searchForm.submit();
    }
</script>
</div>

@endsection
