<?php include "includes/header.php"; ?>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form class="form-login" action="demo.php" method="POST">
                        <div class="p-4 form-body">
                            <h4 class="mb-2"><span>S</span>eja Bem-vindo ao </h4>
                            <h2 class="mb-4"><span>C</span>ypherTrust <span>T</span>okenization <span>S</span>erver <span>D</span>emo</h2>
                            <div class="form-group mb-3">
                                <label for="user" class="form-label ">Username</label>
                                <input type="text" class="form-control" placeholder="Username" id="user" name="user" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input class="form-control" placeholder="Password" type="password" id="password" name="password" required>
                            </div>
                            <div class="form-group mb-3 button">
                                <button type="submit" class="btn btn-primary btnLogin">Login</button>
                            </div>                    
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
<?php include "includes/footer.php"; ?>