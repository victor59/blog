<script type="text/javascript">


function envoyer(){
  // si la valeur du champ prenom est non vide
  if(document.formCom.pseudo.value && document.formCom.commentaire.value && document.formCom.mail.value!== "") {
    // les données sont ok, on peut envoyer le formulaire    
    return true;
  }
  else {
    // sinon on affiche ce message
    alert("Vous n'avez pas rempli tous les champs");
    // et on indique de ne pas envoyer le formulaire
    return false;
  }
}


</script>

<div class="span8">

      <div class="page-header well">   
      <h2> {$data['titre']}</h2>
      <img src = 'img/{$data['id_article']}.jpg' width = '1024' height = '768' alt = '1'/>
      {$data['date']} - {$data['contenu']}
      </div>
      <!-- Si on est connecté, on a la possibilité de modifier ou de supprimer un article-->
      {if $connexion == true}
          <a href ='formulaire.php?id_article={$data['id_article']}'> Modifier cet article </a>
          <a href ='supprimer.php?id_article={$data['id_article']}'> Supprimer cet article </a>
      {/if}
        
      {foreach from=$data_tab item=datajointure}          
      <div class="page-header well">   
          <h2> {$datajointure['pseudo']}</h2> {$datajointure['date']}
           - {$datajointure['commentaire']}
      </div>
        
     {/foreach}
      <center><h2><font color="red">Ajouter un commentaire</font></h2>

            <!-- AFFICHAGE DU FORMULAIRE D'AJOUT d'un commentaire -->
            <form name="formCom"action="commentaire.php?id_article={$data['id_article']}" method="post" enctype="multipart/form-data" onsubmit="return envoyer()">
                <input type="hidden" name="id_article" value="{$data['id_article']}" >
                Pseudonyme
                <br>
                <br><input type="text" name ="pseudo"  id = "pseudo"></input>
                <br>
                <br>
                E-Mail
                <br>
                <br><input type="text" name ="mail"  id="mail"> </input>
                <br>
                <br>
                Commentaire
                <br><textarea name ="commentaire"  id="commentaire"></textarea>
                <br>
                <br>
                <br><input type="submit" name="Envoyer" value="Envoyer" class="btn btn-large btn-primary"></input>
            </form>
        </center>
     
     
     </div>