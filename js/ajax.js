jQuery(function ($) 
{ 
  $(document).ready(function () {  
   
    console.log("Ajax fonctionne correctement !") 

  var page = 1 // Page courante
  var nbre = 4 // Post par page
  var cat = ""
  var ordre = 'DESC' //On affiche les projets les plus récents avec DESC.
  var trier = 'date'

  var data = {
    'action': 'charger_demarrage',
    'page': page,
    'nbre': nbre,
    'trier': trier,
    'security': demarrage.security, // Clé de sécuité pour authentifier la transaction
  }  

  $.post(demarrage.ajaxurl, data, function(response)
  {
    if($.trim(response) != 0) // Si ajax envoi quelque chose
    {
      $('.afficher-requete').html(response)// On ajoute le résultat de la requête dans le contenaire ciblé sans tout rafraîchir !
      $('#charger-plus').html('Charger plus !')
      page = 1; // Au démarrage, la page repart à un.
    }
  
    else 
    {
      $('#charger-plus').html('Tout est chargé !') 
    }
  });

  // Cette fonction permet de charger plus de post lorsqu'on clique sur le bouton id='charger-plus'
  $('#charger-plus').click(function (e) 
  {
    e.preventDefault()
    page++ // On charge les pages suivantes.

    var data = {
    'action': 'charger_plus_ajax',
    'page': page,
    'cat': cat,
    'ordre': ordre,
    'nbre': nbre,
    'trier': trier,
    'security': blog.security, // Clé de sécurité pour authentifier la transaction 
    };

    $.post(blog.ajaxurl, data, function(response){
    if($.trim(response) != 0) // Si ajax envoi quelque chose
    {
      $('.afficher-requete').append(response);// On ajoute le résultat de la requête dans le contenaire ciblé sans tout rafraîchir !
    }
  
    else 
    {
      $('#charger-plus').html('Tout est chargé !') // Si on a tout chargé, le bouton l'indique.
    }
  
      });
    });

    // Cette fonction permet de filtrer par catégorie lorsqu'on sélectionne une catégorie spécifique. 
    $('.mes-filtres select').on('change', function (f) {
      f.preventDefault()
      cat = $('#select-categorie').val()
      chronologie = $('#select-trie').val()
      alpha = $('#select-alpha').val()
      page = 1 // On retourne sur la page 1 à chaque fois que le filtre est actif.

      if(alpha != "")
      {
        $('#select-trie').prop('selectedIndex', 0)
        ordre = alpha
        trier = 'title'
      }

      if(chronologie != "")
      {
        $('#select-alpha').prop('selectedIndex', 0)
        ordre = chronologie
        trier = 'date'
      }

      var data = 
      {
        action: 'filter_projet',
        cat: cat,
        ordre: ordre,
        page: page,
        nbre: nbre,
        trier: trier,
        security: blog.security, // Clé de sécurité pour authentifier la transaction
      }

      $.ajax ({
        url: varcat.ajax_url,
        type: 'POST',
        data: data,
        success: function (response)
        {
          $('.afficher-requete').html(response)
          $('#charger-plus').html('Charger plus !') // On change l'intitulé du bouton.
        }
      })
    });
  });

});