<div class="modal fade" id="book-now-modal" tabindex="-1" role="dialog" aria-labelledby="delete-booking-label"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- <form> -->
            <form action="/book" method="post" class="w-100">
            @csrf

                <div class="modal-header text-white">
                    <h5 class="modal-title" id="delete-booking-label">Enter Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="alert alert-info"></div>

                <div class="modal-body">
                    <!-- <div class="form-row">
                        <div class="form-group col-md-6">
                            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror"
                                name="first_name" value="{{ old('first_name') }}" autocomplete="first_name" autofocus placeholder="First Name">

                            <span class="invalid-feedback invalid-first_name" role="alert"></span>
                        </div>

                        <div class="form-group col-md-6">
                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                                name="last_name" value="{{ old('last_name') }}" autocomplete="last_name" autofocus placeholder="Last Name">

                            <span class="invalid-feedback invalid-last_name" role="alert"></span>
                        </div>
                    </div> -->

                    <!-- <div class="form-row">
                        <div class="form-group col-md-6">
                            <input id="contact_number" type="text"
                                class="form-control @error('contact_number') is-invalid @enderror" name="contact_number"
                                value="{{ old('contact_number') }}" autocomplete="contact_number" autofocus placeholder="Contact Number">

                            <span class="invalid-feedback invalid-contact_number" role="alert"></span>
                        </div>

                        <div class="form-group col-md-6">
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                                name="address" value="{{ old('address') }}" autocomplete="address" autofocus placeholder="Address">

                            <span class="invalid-feedback invalid-address" role="alert"></span>
                        </div>
                    </div> -->

                    <div class="form-row">
                        <div class="col-md-12">
                            <span class="invalid-feedback booking-form-error pb-2" role="alert"></span>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <input id="booking_date" name="booking_date" type="text" class="form-control @error('booking_date') is-invalid @enderror" placeholder="Date in - Date out">

                            <!-- <span class="invalid-feedback invalid-booking_date" role="alert"></span> -->
                        </div>

                        <div class="form-group col-md-3">
                            <select id="adult" name="adult" class="form-control @error('adult') is-invalid @enderror">
                                <option value="1">1 Adult</option>
                                <option value="2">2 Adults</option>
                                <option value="3">3 Adults</option>
                                <option value="4">4 Adults</option>
                                <option value="5">5 Adults</option>
                            </select>

                            <!-- <span class="invalid-feedback invalid-adult" role="alert"></span> -->
                        </div>

                        <div class="form-group col-md-3">
                            <select id="children" name="children" class="form-control @error('children') is-invalid @enderror">
                                <option value="0">0 Children</option>
                                <option value="1">1 Children</option>
                                <option value="2">2 Children</option>
                                <option value="3">3 Children</option>
                                <option value="4">4 Children</option>
                                <option value="5">5 Children</option>
                            </select>

                            <!-- <span class="invalid-feedback invalid-children" role="alert"></span> -->
                        </div>

                        <div class="form-group col-md-2 text-right">
                            <button type="submit" id="btn-booknow" class="btn m-1 text-uppercase btn-book">{{ __('Confirm') }}</button>
                        </div>
                    </div>

                    <!-- <div class="form-row float-right">
                        <div class="form-group col-md-6">
                            <textarea id="remarks" name="remarks" class="form-control @error('remarks') is-invalid @enderror" cols="30" rows="2" autofocus>{{ old('remarks') ?? 'Message' }}</textarea>

                            <span class="invalid-feedback invalid-remarks" role="alert"></span>
                        </div>

                        <div class="form-group">
                            <button type="submit" id="btn-booknow" class="btn m-1 text-uppercase btn-book">{{ __('Confirm') }}</button>
                        </div>
                    </div> -->
                </div>
            </form>
        </div>
    </div>
</div>