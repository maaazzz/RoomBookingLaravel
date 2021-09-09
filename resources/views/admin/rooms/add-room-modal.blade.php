<!-- Signup modal content -->
<div id="signup-modal" class="modal fade" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center mt-2 mb-4">
                    <h3 class="text-warning">Add Room</h3>
                </div>
                <form class="ps-3 pe-3" action="{{ route('room.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title">Title</label>
                        <input class="form-control" name="name" type="text" id="title" required placeholder="Room Title" >
                    </div>
                    <div class="mb-3">
                        <label for="price">Price</label>
                        <input class="form-control" name="price" type="text" id="price" required placeholder="Room Price">
                    </div>
                    <div class="mb-3">
                        <label for="price">Description</label>
                        <input class="form-control" name="description" type="text" id="description" required placeholder="Room Description">
                    </div>
                    <div class="mb-3">
                        <label for="attributes">Attributes</label>
                        <select class="form-control select2-with-tags" multiple=""  style="width: 100%">
                            <option value="red">red</option>
                            <option value="blue" >blue</option>
                            <option value="green" >green</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="Aminities">Aminities</label>
                        <select class="form-control select2-with-tags" multiple=""  style="width: 100%">
                            <option value="red">red</option>
                            <option value="blue" >blue</option>
                            <option value="green" >green</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="file" id="formFile" multiple>
                    </div>
                    <div class="mb-3 text-center">
                        <button class="btn btn-warning text-light font-weight-medium" type="submit">Add</button>
                    </div>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
