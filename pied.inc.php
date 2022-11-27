<!-- footer -->
	<footer>
    <div class="footer-content">
    <!-- menu -->
      <ul class="footer-menu">
         <li><a href="index.php">Accueil</a></li>
            <?php
              if (isset($_SESSION["pseudo"])){
                 echo '
                    <li><a href="index.php?suivant=deconnexion">Déconnexion</a></li>
                    <li><a href="index.php">'.$_SESSION["pseudo"].'</a></li>';
              }
                  else {
                     echo '<li><a href="index.php?suivant=profil">Connexion</a></li>';
                  }
              ?>
            </ul>
    <!-- texte de pied -->
      <p class="footer-text">
          &copy; 2022 Analysaurus &nbsp; | &nbsp;
          Design by As &nbsp; &nbsp;
      </p>
    </div>
		</body>
	</footer>
</html>
