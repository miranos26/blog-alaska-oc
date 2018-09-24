
<!-- LOGIN -->
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4> Créer un compte </h4>
                    </div>
                    <div class="card-body">
                        <form action="index.php?p=users.add" method="post">
                            <div class="form-group">
                                <label for="username"> Pseudo </label>
                                <input name="username" type="text" class="form-control" id="username" size="30" required>
                            </div>
                            <div class="form-group">
                                <label for="user_email"> Email </label>
                                <input name="user_email" type="email" class="form-control" id="user_email" placeholder="adresse@example.com" size="50" required>
                            </div>
                            <div class="form-group">
                                <label for="password"> Mot de passe </label>
                                <input name="password" type="password" class="form-control" id="password" size="30" required>
                            </div>
                            <input type="submit" value="inscription" class="btn btn-primary btn-block">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>