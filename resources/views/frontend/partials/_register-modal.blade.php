<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="register-form">
            <div class="modal-content">
                <div class="modal-header align-items-center">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        {{ __('frontend.register_heading') }}
                    </h1>
                    <button type="button" class="btn-close pt-0" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-item mb-2">
                        <input type="text" class="form-control" name="name"
                            placeholder="{{ __('frontend.enter_name') }}" />
                        <div id="name-errors" class="errors-area"></div>
                    </div>

                    <div class="form-item mb-2">
                        <input type="email" class="form-control" name="email"
                            placeholder="{{ __('frontend.enter_email') }}" />
                        <div id="email-errors" class="errors-area"></div>
                    </div>

                    <div class="form-item mb-2">
                        <input type="password" class="form-control" name="password"
                            placeholder="{{ __('frontend.enter_password') }}" />
                        <div id="password-errors" class="errors-area"></div>
                    </div>

                    <div class="form-item mb-2">
                        <input type="password" class="form-control" name="password_confirmation"
                            placeholder="{{ __('frontend.enter_password_confirmation') }}" />
                        <div id="errors" class="errors-area"></div>
                    </div>

                    <div class="form-item mb-2">
                        <input type="text" class="form-control" name="age"
                            placeholder="{{ __('frontend.enter_age') }}" />
                        <div id="age-errors" class="errors-area"></div>
                    </div>

                    <div class="form-item mb-2">
                        <select class="form-control" name="gender">
                            <option value="" disabled selected>{{ __('frontend.enter_gender') }}</option>
                            <option value="male">
                                {{ __('frontend.male') }}
                            </option>
                            <option value="female">
                                {{ __('frontend.female') }}
                            </option>
                        </select>

                        <div id="gender-errors" class="errors-area"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-xl btn-success w-100">{{ __('frontend.register') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>


@section('scripts')
    <script>
        const registerForm = document.getElementById("register-form");

        registerForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const data = {
                name: this.name.value,
                email: this.email.value,
                password: this.password.value,
                password_confirmation: this.password_confirmation.value,
                age: this.age.value,
                gender: this.gender.value,
            }

            register(data)
        })

        function register(data) {
            const url = "{{ route('frontend.register') }}";
            data._token = '{{ csrf_token() }}';

            $.ajax({
                method: 'POST',
                url,
                data,
                success: function(response) {
                    location.reload()
                },
                error: function(response) {
                    if (response.status == 422)
                        showErrors(response.responseJSON.errors);
                }
            })
        }


        function showErrors(errors) {
            resetErrors();
            for (let fieldname in errors) {
                const errorsContainer = document.getElementById(`${fieldname}-errors`);
                // Reset first
                errorsContainer.innerHTML = "";
                const fieldErrors = errors[fieldname];
                const errorsElements = fieldErrors.map(message => `<small class='text-danger d-block'>${message}</small>`)
                    .join("");
                errorsContainer.innerHTML = errorsElements;
            }
        }

        function resetErrors() {
            const errorsContainer = document.querySelectorAll(".errors-area");
            errorsContainer.forEach(element => {
                element.innerHTML = ""
            });
        }
    </script>
@endsection
