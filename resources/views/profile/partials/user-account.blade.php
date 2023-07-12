<div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
    <div class="card">
        <div class="card-header">
            <h5>Account Details</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('profile.update') }}" name="enq">
                @csrf
                @method('patch')
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>First Name <span class="required">*</span></label>
                        <input required="" class="form-control" name="fname" type="text" value="{{$user->fname}}"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Last Name <span class="required">*</span></label>
                        <input required="" class="form-control" name="lname" type="text"  value="{{$user->lname}}"/>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Email Address <span class="required">*</span></label>
                        <input required="" class="form-control" name="email" type="email" value="{{$user->email}}"/>
                    </div>
                    
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-fill-out submit font-weight-bold" name="submit" value="Submit">Save Change</button>
                    </div>
                </div>
            </form>

            <br><br>

            <div class="my-2">
                <h5>Delete Account</h5><br>
                <button type="button" class="btn btn-fill-out submit font-weight-bold" data-bs-toggle="modal" data-bs-target="#deleteModal">
                    Delete Account
                </button>
            </div>

            <!-- Add the modal markup -->
            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content p-5">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Delete Account</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="delete-account-form" action="{{ route('profile.destroy') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input id="password" type="password" name="password" placeholder="Current password" required>
                            </div>
                            <span id="password-error" class="text-danger"></span>
                            <button type="submit" class="btn btn-danger">Delete Account</button>
                        </form>

                        
                        <script>
                            document.getElementById('delete-account-form').addEventListener('submit', function(event) {
                                event.preventDefault(); // Prevent form submission

                                var passwordInput = document.getElementById('password');
                                var passwordError = document.getElementById('password-error');

                                
                                passwordError.textContent = '';

                                
                                $.ajax({
                                    url: "{{ route('profile.destroy') }}",
                                    type: "DELETE",
                                    data: $('#delete-account-form').serialize(),
                                    success: function(response) {
                                        
                                        if (response.status === 'success') {
                                            
                                            alert(response.message);

                                            window.location.href = "{{ route('main') }}";
                                            
                                            $('#delete-account-modal').modal('hide');
                                        }
                                    },
                                    error: function(response) {
                                        
                                        if (response.status === 422) {
                                            
                                            var errors = response.responseJSON.errors;
                                            if (errors.password) {
                                                passwordError.textContent = errors.password[0];
                                            }
                                        } else {
                                            
                                            alert('An error occurred. Please try again.');
                                        }
                                    }
                                });
                            });
                        </script>

                    </div>
                </div>
            </div>


        </div>
    </div>
</div>