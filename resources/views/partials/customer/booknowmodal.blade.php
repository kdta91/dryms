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
                    <div class="form-row">
                        <div class="col-md-12">
                            <span class="invalid-feedback booking-form-error pb-2" role="alert"></span>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <input id="booking_date" name="booking_date" type="text" class="form-control @error('booking_date') is-invalid @enderror" placeholder="Date in - Date out">
                        </div>

                        <div class="form-group col-md-3">
                            <select id="adult" name="adult" class="form-control @error('adult') is-invalid @enderror">
                                <option value="1">1 Adult</option>
                                <option value="2">2 Adults</option>
                                <option value="3">3 Adults</option>
                                <option value="4">4 Adults</option>
                                <option value="5">5 Adults</option>
                            </select>
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
                        </div>

                        <div class="form-group col-md-2 text-right">
                            <button type="submit" id="btn-booknow" class="btn m-1 text-uppercase btn-book">{{ __('Search') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>