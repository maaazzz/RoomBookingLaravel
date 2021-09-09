<!-- Signup modal content -->
<div id="signup-modal" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center mt-2 mb-4">
                    <h3 class="text-warning">Add User</h3>
                </div>
                <form class="ps-3 pe-3" action="{{ route('user.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="username">Name</label>
                        <input class="form-control" name="name" type="text" id="username" required placeholder="Michael Zenaty">
                    </div>

                    <div class="mb-3">
                        <label for="emailaddress">Email address</label>
                        <input class="form-control" name="email" type="email" id="emailaddress" required
                            placeholder="john@deo.com">
                    </div>

                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input class="form-control" name="password" type="password" required id="password"
                            placeholder="Enter your password" min="6">
                    </div>

                    <div class="mb-3 text-center">
                        <button class="btn btn-warning text-light font-weight-medium" type="submit">Add</button>
                    </div>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
