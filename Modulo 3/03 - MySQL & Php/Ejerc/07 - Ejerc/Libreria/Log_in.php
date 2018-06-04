
<!--Modal: Login / Register Form-->
<div class="modal fade" id="log_in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
        <!--Content-->
        <div class="modal-content">

            <!--Modal cascading tabs-->
            <div class="modal-c-tabs">

                <!-- Nav tabs -->
                <ul class="nav nav-tabs tabs-2 light-blue darken-3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class="fa fa-user mr-1"></i> Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#panel8" role="tab"><i class="fa fa-user-plus mr-1"></i> Register</a>
                    </li>
                </ul>

                <!-- Tab panels -->
                <div class="tab-content">
                    <!-- ********************** -->
                    <!--      Panel Log in      -->
                    <!-- ********************** -->
                    <!--Panel 7-->
                    <div class="tab-pane fade in show active" id="panel7" role="tabpanel">
                        <!-- Formulario -->
                        <form method="post">
                            <!--Body-->
                            <div class="modal-body mb-1">
                                <div class="md-form form-sm mb-5">
                                    <i class="fa fa-user prefix"></i>
                                    <input type="text" id="username" name="username" class="form-control form-control-sm validate">
                                    <label data-error="wrong" data-success="right" for="username">Nombre</label>
                                </div>

                                <div class="md-form form-sm mb-4">
                                    <i class="fa fa-lock prefix"></i>
                                    <input type="password" id="pasword" name="pasword" class="form-control form-control-sm validate">
                                    <label data-error="wrong" data-success="right" for="pasword">Your password</label>
                                </div>
                                <div class="text-center mt-2">
                                    <button type="submit" 
                                            class="btn btn-info" 
                                            name="log_in">
                                            Log in 
                                        <i class="fa fa-sign-in ml-1"></i>
                                    </button>
                                </div>
                            </div>
                            <!--Footer-->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                    <!--/.Panel 7-->
                    <!-- ********************** -->
                    <!--      Panel ALTA        -->
                    <!-- ********************** -->
                    <!--Panel 8-->
                    <div class="tab-pane fade" id="panel8" role="tabpanel">

                        <!--Body-->
                        <div class="modal-body">
                            <form method="post">
                                <div class="md-form form-sm mb-5">
                                    <i class="fa fa-user prefix"></i>
                                    <input type="text" id="username1" name="username1" class="form-control form-control-sm validate">
                                    <label data-error="wrong" data-success="right" for="username1">Nombre</label>
                                </div>

                                <div class="md-form form-sm mb-5">
                                    <i class="fa fa-envelope prefix"></i>
                                    <input type="email" id="email" name="email" class="form-control form-control-sm validate">
                                    <label data-error="wrong" data-success="right" for="email">Your email</label>
                                </div>

                                <div class="md-form form-sm mb-5">
                                    <i class="fa fa-lock prefix"></i>
                                    <input type="password" id="pasword1" name="pasword1" class="form-control form-control-sm validate">
                                    <label data-error="wrong" data-success="right" for="pasword1">Your password</label>
                                </div>

                                <div class="text-center form-sm mt-2">
                                    <button type="submit" 
                                            class="btn btn-info" 
                                            name="log_new">
                                            Sign up 
                                        <i class="fa fa-sign-in ml-1"></i></button>
                                </div>
                            </form>
                        </div>
                        <!--Footer-->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <!--/.Panel 8-->
                </div>

            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
  