<!-- Signup modal content -->
<div id="signup-modal" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center mt-2 mb-4">
                    <h3 class="text-success">Add Category</h3>
                </div>
                <form class="ps-3 pe-3" action="{{ route('category.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="username">Name</label>
                        <input class="form-control" name="name" type="text" id="username" required placeholder="Category Name">
                    </div>

                    <div class="mb-3 text-center">
                        <button class="btn btn-light-info text-info font-weight-medium" type="submit">Add</button>
                    </div>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
