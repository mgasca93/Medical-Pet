<?php require_once "../resources/Views/Templates/header.php"; ?>
<div class="container-fluid m-0 p-0">
    <div class="row m-0 p-0">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 m-0 p-0">
            <div class="d-flex flex-row-reverse">
                <div class="bg-pet pet-login shadow-sm"></div>
                <div class="form-content">
                    <div class="form">
                        <div class="row mb-3">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <h3 class="text-dark fw-light">Login</h3>
                                <div class="divider mb-3"></div>
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
                                <form action="/login/validate" method="POST" class="form">
                                    <div class="form-group">
                                        <label for="username">Username : </label>
                                        <input type="text" id="username" name="username" class="form-control-sm form-control rounded-pill mb-4" required autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="passwd">Password : </label>
                                        <input type="password" id="passwd" name="passwd" class="form-control-sm form-control rounded-pill mb-5 mt-2" required>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn primary-btn-outline rounded-pill">Login</button>
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
<?php require_once "../resources/Views/Templates/footer.php"; ?>