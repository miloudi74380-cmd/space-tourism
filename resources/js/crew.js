// Données des membres d'équipage (récupérées depuis les traductions Laravel)
const getCrewMembers = () => {
    const trans = window.translations?.crewMembers || {};
    return {
        douglas: {
            name: trans.douglas?.name || "Douglas Hurley",
            role: trans.douglas?.role || "Commander",
            bio: trans.douglas?.bio || "",
            image: "/assets/crew/image-douglas-hurley.png",
            imageWebp: "/assets/crew/image-douglas-hurley.webp"
        },
        mark: {
            name: trans.mark?.name || "Mark Shuttleworth",
            role: trans.mark?.role || "Mission Specialist",
            bio: trans.mark?.bio || "",
            image: "/assets/crew/image-mark-shuttleworth.png",
            imageWebp: "/assets/crew/image-mark-shuttleworth.webp"
        },
        victor: {
            name: trans.victor?.name || "Victor Glover",
            role: trans.victor?.role || "Pilot",
            bio: trans.victor?.bio || "",
            image: "/assets/crew/image-victor-glover.png",
            imageWebp: "/assets/crew/image-victor-glover.webp"
        },
        anousheh: {
            name: trans.anousheh?.name || "Anousheh Ansari",
            role: trans.anousheh?.role || "Flight Engineer",
            bio: trans.anousheh?.bio || "",
            image: "/assets/crew/image-anousheh-ansari.png",
            imageWebp: "/assets/crew/image-anousheh-ansari.webp"
        }
    };
};

const crewMembers = getCrewMembers();

// Fonction pour changer de membre d'équipage
function changeCrew(crewKey) {
    const crew = crewMembers[crewKey];

    if (!crew) return;

    // Mettre à jour l'image
    const crewImage = document.getElementById('crew-image');
    if (crewImage) {
        crewImage.src = crew.image;
        crewImage.alt = crew.name;
    }

    // Mettre à jour le rôle
    const crewRole = document.getElementById('crew-role');
    if (crewRole) {
        crewRole.textContent = crew.role;
    }

    // Mettre à jour le nom
    const crewName = document.getElementById('crew-name');
    if (crewName) {
        crewName.textContent = crew.name;
    }

    // Mettre à jour la biographie
    const crewBio = document.getElementById('crew-bio');
    if (crewBio) {
        crewBio.textContent = crew.bio;
    }

    // Mettre à jour les dots actifs
    document.querySelectorAll('[data-crew]').forEach(dot => {
        const isActive = dot.dataset.crew === crewKey;

        if (isActive) {
            dot.classList.remove('bg-white/20');
            dot.classList.add('bg-white');
        } else {
            dot.classList.remove('bg-white');
            dot.classList.add('bg-white/20');
        }
    });
}

// Initialisation au chargement de la page
document.addEventListener('DOMContentLoaded', function() {
    // Ajouter les événements de clic sur les dots
    document.querySelectorAll('[data-crew]').forEach(dot => {
        dot.addEventListener('click', function() {
            const crewKey = this.dataset.crew;
            changeCrew(crewKey);
        });
    });

    // Charger le premier membre d'équipage (Douglas) par défaut
    changeCrew('douglas');
});
