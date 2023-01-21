<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form>
            <div class="modal-content">
                <div class="modal-header align-items-center">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Create New Account
                    </h1>
                    <button type="button" class="btn-close pt-0" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-item mb-2">
                        <input type="text" class="form-control" name="name" placeholder="Name" />
                    </div>

                    <div class="form-item mb-2">
                        <input type="email" class="form-control" name="email" placeholder="Email" />
                    </div>

                    <div class="form-item mb-2">
                        <input type="password" class="form-control" name="password" placeholder="Password" />
                    </div>

                    <div class="form-item mb-2">
                        <input type="password" class="form-control" name="passwordConfirm"
                            placeholder="Password Confirm" />
                    </div>

                    <div class="form-item mb-2">
                        <select type="password" class="form-control" name="gender">
                            <option value="" disabled selected>Gender</option>
                            <option value="">Male</option>
                            <option value="">Female</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-xl btn-success w-100">Register</button>
                </div>
            </div>
        </form>
    </div>
</div>
