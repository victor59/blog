<div class="span8">
    <!-- On informe le nombre d'article correspondant à notre recherche (nombre total d'articles si on ne recherche pas)-->
    {if ($total < 1)}
            Il n'y a pas d'article correspondant.
        {else}
            Il y a {$total} article(s).
        
    {/if}    
   
    <!-- On affiche chaque articles (titre, date, contenu et image)-->
    {foreach from=$data_tab item=data}        
        <div class="page-header well"> 
      <h2> {$data['titre']}</h2>
      <img src = 'img/{$data['id_article']}.jpg' width = '1024' height = '768' alt = '1'/>
      </div> 
      <div class="articleblog">{$data['date']} - {$data['contenu']}
      </div>
      <a href ='commentaire.php?id_article={$data['id_article']}'> ----Voir la suite/Ajouter un commentaire---- </a><br>
      <!-- Si on est connecté, on a la possibilité de modifier ou de supprimer un article-->
      {if $connexion == true}
          <a href ='formulaire.php?id_article={$data['id_article']}'> Modifier un article </a>
          <a href ='supprimer.php?id_article={$data['id_article']}'> Supprimer un article </a>
      {/if}
        
     {/foreach}
      <br>
      <!-- Affichage des liens vers les pages suivantes-->
     {for $i=1 to $nbTotalDePage}

         {if $recherche != null}
        <a href='index.php?page={$i}&titre={$recherche}'> page {$i} </a>
           {else}
                 <a href='index.php?page={$i}'> page {$i} </a>          
        {/if}
         
        
     {/for}
     
      
      <br><br>
    </div>