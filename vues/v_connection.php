
<section>
	<div class="row">
		<!--<div class="span8 offset2 connexion">-->
			<!--
				<legend>Connexion</legend>
				<div class="formulaire pagination-centered">
					<form action='index.php?lien=connexion' method='post'>
						<p><b>Identifiant :</b> <input type="text" name="login" size="20px" maxlength="60"></p>
						<p><b>Mot de passe :</b> <input type="password" name="mdp" size="20px" maxlength="30"></p>
						<input class="btn" type="submit" name="Submit" value="Connexion">
					</form>
				</div>
			
-->



    <form action='index.php?lien=connexion'  method='post' class="form-horizontal offset3 span6 connexion">
            <div class="control-group">
              <label for="inputId" class="control-label">Identifiant</label>
              <div class="controls">
                <input type="text" name="login" placeholder="Votre identifiant" id="inputId">
              </div>
            </div>
            <div class="control-group">
              <label for="inputPass" class="control-label">Mot de passe</label>
              <div class="controls">
                <input type="password" name="mdp" placeholder="Votre mot de passe" id="inputPass">
              </div>
            </div>
            <div class="control-group">
              <div class="controls">
                <button class="btn" type="submit">Connexion</button>
              </div>
            </div>
          </form>


	</div>
	<!--</div>-->
</section>

