@php
    $containerFooter =
        isset($configData['contentLayout']) && $configData['contentLayout'] === 'compact'
            ? 'container-xxl'
            : 'container-fluid';
    $aplikasi = Helper::aplikasi();
@endphp

<!-- Footer-->
<footer class="content-footer footer bg-footer-theme">
    <div class="{{ $containerFooter }}">
        <div class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
            <div>
                ©
                <script>
                    document.write(new Date().getFullYear())
                </script>, made with ❤️ by {{ $aplikasi->pemilik }}
            </div>
            <div class="d-none d-lg-inline-block">
                <a href="#" class="footer-link me-4">Access: {{ Helper::getProfileById()->rs_name }}</a>
                <a href="#" class="footer-link me-4">Versi: {{ $aplikasi->versi }}</a>

            </div>
        </div>
    </div>
</footer>
<!--/ Footer-->
