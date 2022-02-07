<?php require_once "../resources/Views/Templates/header.php"; ?>
<div class="container-fluid m-0 p-0">
    <div class="row m-0 p-0">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 m-0 p-0">
            <div class="d-lg-flex flex-row">
                <div class="bg-pet pet-register shadow-sm"></div>
                <div class="form-content">
                    <div class="form">
                        <div class="row mb-3">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <h3 class="text-dark fw-light">Register</h3>
                                <div class="divider mb-2"></div>
                                <?php if( strlen($message->status) > 0) : ?>
                                    <div class="alert text-center alert-dismissible fade show <?= ($message->status == 'success') ? 'success-alert' : 'danger-alert'; ?>" role="alert">
                                        <small><?= $message->text ?></small>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <form action="/register/validate" method="POST" class="form">
                                    <div class="form-group">
                                        <label for="firstname">Firstname : </label>
                                        <input type="text" id="firstname" name="firstname" class="form-control-sm form-control rounded-pill mb-2" required autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="lastname">Lastname : </label>
                                        <input type="text" id="lastname" name="lastname" class="form-control-sm form-control rounded-pill mb-2 mt-2" required autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username : </label>
                                        <input type="text" id="username" name="username" class="form-control-sm form-control rounded-pill mb-2 mt-2" required autocomplete="off">
                                        <div id="username-status" class=""></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">E-mail : </label>
                                        <input type="email" id="email" name="email" class="form-control-sm form-control rounded-pill mb-2 mt-2" required autocomplete="off">
                                        <div id="email-status" class=""></div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="passwd">Password : </label>
                                        <input type="password" id="passwd" name="passwd" class="form-control-sm form-control rounded-pill mt-2" required>
                                        <div id="passwd-status" class=""></div>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button type="submit" id="submit" class="btn primary-btn-outline rounded-pill">Register</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/validations/validateEmail.js"></script>
<script src="js/validations/validateUsername.js"></script>
<script src="js/validations/validatePasswd.js"></script>
<?php require_once "../resources/Views/Templates/footer.php"; ?>