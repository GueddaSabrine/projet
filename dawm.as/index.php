<?php
require_once "functions/app_functions.php";

build_header("login Page");
?>

      <div>
      <!-- Contenu de la page -->
      <h1>Page de login</h1>
          <form autocomplete="off">
              <div class="form-group">
                  <label for="email1">Identifiant au format@</label>
                  <input type="email" class="form-control" id="email">
              </div>
              <div class="form-group">
                  <label for="mdp">Password</label>
                  <input type="password" class="form-control" id="mdp">
              </div>
              <button type="submit" class="btn btn-primary">Login</button>
          </form>

      </div>

      <!-- Pied de page -->
  </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jQuery.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

  </body>
</html>

