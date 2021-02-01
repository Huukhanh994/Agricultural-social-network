<div class="modal fade" id="popup-write-rewiev" tabindex="-1" role="dialog" aria-labelledby="popup-write-rewiev"
    aria-hidden="true">
    <div class="modal-dialog window-popup popup-write-rewiev" role="document">
        <div class="modal-content">
            <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                <svg class="olymp-close-icon">
                    <use xlink:href="{{asset('site/svg-icons/sprites/icons.svg#olymp-close-icon')}}"></use>
                </svg>
            </a>

            <div class="modal-header">
                <h6 class="title">Write a Review</h6>
            </div>

            <div class="modal-body">
                <form class="form-write-rewiev">
                    <div class="row">
                        <div class="col col-xl-6 col-lg-6 col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">First Name</label>
                                <input class="form-control" placeholder="" type="text" value="Marina">
                            </div>
                        </div>
                        <div class="col col-xl-6 col-lg-6 col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Last Name</label>
                                <input class="form-control" placeholder="" type="text" value="Valentine">
                            </div>
                        </div>
                        <div class="col col-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group label-floating">
                                <label class="control-label">Email</label>
                                <input class="form-control" placeholder="" type="email" value="mvalentine@yourmail.com">
                            </div>

                            <div class="form-group label-floating is-select">
                                <label class="control-label">Select Rating</label>
                                <select class="selectpicker form-control">
                                    <option value="5">5 Stars Rating</option>
                                    <option value="4">4 Stars Rating</option>
                                    <option value="3">3 Stars Rating</option>
                                    <option value="2">2 Stars Rating</option>
                                    <option value="1">1 Stars Rating</option>
                                </select>
                            </div>

                            <div class="form-group label-floating">
                                <label class="control-label">Review Title</label>
                                <input class="form-control" placeholder="" type="text"
                                    value="The Best Mug I’ve Ever Bought!!">
                            </div>

                            <div class="form-group">
                                <textarea class="form-control"
                                    placeholder="Write a little description about the review">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor labore eter dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</textarea>
                            </div>

                            <a href="#" class="btn btn-primary btn-lg full-width">Post your Review</a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>