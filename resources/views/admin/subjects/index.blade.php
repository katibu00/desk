@extends('admin.layout.app')
@section('pageTitle', 'Subjects')

@section('content')
    <main id="main-container">
        <div class="content">
            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h5 class="card-title align-self-center">Subjects</h5>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSubjectModal">Add
                                Subjects</button>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                @include('admin.subjects.table')
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        {{-- {{ $users->links() }} --}}
                    </div>

                </div>
            </div>
        </div>
    </main>

    <div class="modal" id="addSubjectModal" tabindex="-1" role="dialog" aria-labelledby="addSubjectModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title" id="addSubjectModalLabel">Add Subjects</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <span class="bi bi-x"></span>
                            </button>
                        </div>
                    </div>
                    <div class="block-content fs-sm my-3">
                        <form id="addSubjectForm">
                            <div class="form-group mb-2">
                                <label for="userRoles">User Roles</label>
                                <select class="form-control" id="userRoles" name="userRoles[]" multiple required>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div id="subjectRows">

                            </div>
                            <div class="mt-3">
                                <button type="button" class="btn btn-sm btn-primary" id="addSubjectRow">Add
                                    Subject</button>
                            </div>
                        </form>
                    </div>
                    <div class="block-content block-content-full block-content-sm text-end border-top">
                        <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="button" class="btn btn-alt-primary" id="submitAddSubjects">
                            Add Subjects
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal" id="editSubjectModal" tabindex="-1" role="dialog" aria-labelledby="editSubjectModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="block block-rounded shadow-none mb-0">
                    <div class="block-header block-header-default">
                        <h3 class="block-title" id="editSubjectModalLabel">Edit Subject</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                                <span class="bi bi-x"></span>
                            </button>
                        </div>
                    </div>
                    <div class="block-content fs-sm my-3">
                        <form id="editSubjectForm">
                            <input type="hidden" id="subjectId" />
                            <div class="form-group mb-2">
                                <label for="subjectName">Subject Name</label>
                                <input type="text" class="form-control" id="subjectName" name="subjectName" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="editUserRoles">User Roles</label>
                                <select class="form-control" id="editUserRoles" name="editUserRoles[]" multiple required>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="block-content block-content-full block-content-sm text-end border-top">
                        <button type="button" class="btn btn-alt-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="button" class="btn btn-alt-primary" id="submitEditSubject">
                            Save Changes
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



@section('js')



    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        $(document).ready(function() {
            // var roles = @json($roles);

            $('.edit-subject').click(function() {
                var subjectId = $(this).data('subject-id');
                var subjectName = $(this).data('subject-name');

                $('#subjectId').val(subjectId);
                $('#subjectName').val(subjectName);
                // Show the modal
                $('#editSubjectModal').modal('show');
            });

            // Add event listener to the Save Changes button
            $('#submitEditSubject').click(function() {
                var subjectId = $('#subjectId').val();
                var subjectName = $('#subjectName').val();
                var selectedRoles = $('#editUserRoles').val();

                // Create an object with the form data
                var formData = {
                    subjectId: subjectId,
                    subjectName: subjectName,
                    userRoles: selectedRoles
                };

                // Disable the Save Changes button
                $('#submitEditSubject').prop('disabled', true);

                // Show the loading spinner
                $('.loading-spinner').show();

                // Perform AJAX request to save the changes
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content') // Include CSRF token in the request headers
                    }
                });

                $.ajax({
                    url: '{{ route('subjects.update') }}', // Replace with your backend endpoint URL
                    type: 'POST', // Adjust the HTTP method as required (e.g., POST, PUT)
                    data: formData,
                    success: function(response) {
                        // Handle the successful response
                        console.log(response);

                        // Enable the Save Changes button
                        $('#submitEditSubject').prop('disabled', false);

                        // Hide the loading spinner
                        $('.loading-spinner').hide();

                        // Show toastr success message
                        toastr.success('Subject updated successfully', 'Success', {
                            timeOut: 3000
                        }); // Display success toast message for 3 seconds

                        $('.table').load(location.href+' .table');

                        $('#editSubjectModal').modal('hide');
                    },

                    error: function(xhr, status, error) {
                        // Handle the error response
                        console.error(error);

                        // Enable the Save Changes button
                        $('#submitEditSubject').prop('disabled', false);

                        // Hide the loading spinner
                        $('.loading-spinner').hide();

                        // Show validation errors as toast messages
                        var errors = xhr.responseJSON.errors;
                        if (errors) {
                            var errorMessage = '';
                            $.each(errors, function(field, messages) {
                                $.each(messages, function(index, message) {
                                    errorMessage += message + '<br>';
                                });
                            });
                            toastr.error(errorMessage, 'Validation Error', {
                                timeOut: 5000
                            }); // Display toast message for 5 seconds
                        }
                    }


                });
            });
        });
    </script>



    <script>
        $(document).ready(function() {
            // Add Subject Row
            $('#addSubjectRow').click(function() {
                var row = `<div class="form-row mb-2">
                            <div class="col">
                                <input type="text" class="form-control" name="subjects[]" placeholder="Subject" required>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-danger mt-1 remove-row">Remove</button>
                            </div>
                        </div>`;
                $('#subjectRows').append(row);
            });

            // Remove Subject Row
            $(document).on('click', '.remove-row', function() {
                $(this).closest('.form-row').remove();
            });

            // Submit Add Subjects
            // Submit Add Subjects
            $('#submitAddSubjects').click(function() {
                var userRoles = $('#userRoles').val();
                var subjects = $('input[name="subjects[]"]').map(function() {
                    return $(this).val();
                }).get();

                // Disable the button and show a loading indicator
                var submitBtn = $(this);
                submitBtn.prop('disabled', true).html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Adding...'
                );

                // Prepare the form data
                var formData = new FormData();
                formData.append('_token', '{{ csrf_token() }}');
                formData.append('userRoles', userRoles);
                formData.append('subjects', subjects.join(','));

                // AJAX request to submit the form data
                $.ajax({
                    url: '{{ route('subjects') }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // Handle the success response
                        console.log(response);
                        // Reset the form and remove the loading indicator
                        $('#addSubjectForm')[0].reset();
                        submitBtn.prop('disabled', false).text('Add Subjects');
                    },
                    error: function(xhr, status, error) {
                        // Handle the error response
                        console.log(xhr.responseText);
                        // Enable the button and show the original text
                        submitBtn.prop('disabled', false).text('Add Subjects');
                    }
                });
            });


        });
    </script>
@endsection
