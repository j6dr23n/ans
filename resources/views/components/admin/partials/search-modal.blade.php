<!-- seach topbar Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content rounded">
            <div class="modal-header p-3">
                <div class="position-relative w-100">
                    <form action="{{ route('admin.search') }}"
                        class="md:flex hidden flex-row flex-wrap items-center lg:ml-auto mr-3" method="POST">
                        @csrf
                        <input type="text" class="form-control form-control-lg border-2" placeholder="Search..."
                            autocomplete="off" id="search-options" name="search">
                        <span class="bi bi-search search-widget-icon fs-17"></span>
                        <a href="javascript:void(0);"
                            class="search-widget-icon fs-14 link-secondary text-decoration-underline search-widget-icon-close d-none"
                            id="search-close-options">Clear</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
