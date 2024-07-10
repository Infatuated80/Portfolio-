// Inclure les scripts js hormis AJAX

console.log("Le javascript fonctionne correctement !") //On teste via la console si javascript est reconnu par notre thème.

// Déclaration du tableau associatif pour la gestion des étoiles 

const competences_dev = 
[
    {
		"competence":"Wordpress",
		"note":4,
	},

    {
		"competence":"HTML/CSS",
		"note":5,
	},

    {
		"competence":"SQL",
		"note":4,
	},

    {
		"competence":"PHP",
		"note":4,
	},

    {
		"competence":"JS",
		"note":4,
	},  

    {
		"competence":"UE5",
		"note":5,
	},
];

const competences_graph = 
[
    {
		"competence":"Photoshop",
		"note":5,
	},

    {
		"competence":"3ds Max",
		"note":4,
	},

    {
		"competence":"Blender",
		"note":5,
	},

    {
		"competence":"Premiere Pro",
		"note":4,
	},

    {
		"competence":"After Effects",
		"note":3,
	},  

    {
		"competence":"Illustrator",
		"note":4,
	},
];

window.addEventListener("load", (event) => 
    {
        affiche_notations_dev(5)
        affiche_notations_graph(5)
    });


/* Début --> Gestion de la pop-up de contact */

    // On cible le lien contact dans le menu
    let cible_contact_li = document.querySelectorAll(".menu-item-66") //En inspectant, on trouve le id du li de contact.
    let cible_croix = document.querySelector(".contact-close")
    let cible_contact_modal = document.querySelector(".contact-modal")
    
    cible_contact_li.forEach(function (cible_li) 
    {

        cible_li.addEventListener("click", () => 
        {
            console.log("tu as cliqué sur me contacter !")
            cible_contact_modal.classList.remove("contact-modal-disparait") 
            cible_contact_modal.classList.add("contact-modal-apparait")
        });
        
    }); 

    // Lorsqu'on clique sur la croix, la modale de contact disparait.
    cible_croix.addEventListener("click", () => 
        {
            console.log("Tu cliques sur la croix !")   
            cible_contact_modal.classList.remove("contact-modal-apparait") 
            cible_contact_modal.classList.add("contact-modal-disparait") 
        });
/* Fin --> Gestion de la pop-up de contact */     



function affiche_notations_dev(note_max)
{
    let cible_competence_dev = document.querySelector('.competence-dev')
    let elementAjout = ""

    const url_etoile_eteinte = url_racine_theme + "/assets/img/etoile-off.png"
    const url_etoile_allumee = url_racine_theme + "/assets/img/etoile-on.png" 

    elementAjout += "<h3>Programmation / développement :</h3>"

    for(let i=0; i<competences_dev.length; i++)
		{
            elementAjout+="<p>" + competences_dev[i].competence + " : "

			for(let j=1; j<=note_max; j++)
			{
				if(competences_dev[i].note < j)
                    {
                        elementAjout+= "<img src='" + url_etoile_eteinte + "'>"
                    }
                else 
                    {
                        elementAjout+= "<img src='" + url_etoile_allumee + "'>" 
                    }    
			}

            elementAjout+= "</p>"
		}

    cible_competence_dev.innerHTML = elementAjout
}

function affiche_notations_graph(note_max)
{
    let cible_competence_graph = document.querySelector('.competence-graph')
    let elementAjout = ""

    const url_etoile_eteinte = url_racine_theme + "/assets/img/etoile-off.png"
    const url_etoile_allumee = url_racine_theme + "/assets/img/etoile-on.png" 

    elementAjout += "<h3>Graphisme :</h3>"

    for(let i=0; i<competences_graph.length; i++)
		{
            elementAjout+="<p>" + competences_graph[i].competence + " : "

			for(let j=1; j<=note_max; j++)
			{
				if(competences_graph[i].note < j)
                    {
                        elementAjout+= "<img src='" + url_etoile_eteinte + "'>"
                    }
                else 
                    {
                        elementAjout+= "<img src='" + url_etoile_allumee + "'>" 
                    }    
			}

            elementAjout+= "</p>"
		}

    cible_competence_graph.innerHTML = elementAjout
}