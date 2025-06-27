
<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    @if (!session('status'))
    <script>
        window.location.href = "/";
    </script>
@endif
</x-guest-layout>
