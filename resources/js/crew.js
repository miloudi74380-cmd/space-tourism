// Données des membres d'équipage
const crewMembers = {
    douglas: {
        name: "Douglas Hurley",
        role: "Commander",
        bio: "Douglas Gerald Hurley is an American engineer, former Marine Corps pilot and former NASA astronaut. He launched into space for the third time as commander of Crew Dragon Demo-2.",
        image: "/assets/crew/image-douglas-hurley.png",
        imageWebp: "/assets/crew/image-douglas-hurley.webp"
    },
    mark: {
        name: "Mark Shuttleworth",
        role: "Mission Specialist",
        bio: "Mark Richard Shuttleworth is the founder and CEO of Canonical, the company behind the Linux-based Ubuntu operating system. Shuttleworth became the first South African to travel to space as a space tourist.",
        image: "/assets/crew/image-mark-shuttleworth.png",
        imageWebp: "/assets/crew/image-mark-shuttleworth.webp"
    },
    victor: {
        name: "Victor Glover",
        role: "Pilot",
        bio: "Pilot on the first operational flight of the SpaceX Crew Dragon to the International Space Station. Glover is a commander in the U.S. Navy where he pilots an F/A-18. He was a crew member of Expedition 64, and served as a station systems flight engineer.",
        image: "/assets/crew/image-victor-glover.png",
        imageWebp: "/assets/crew/image-victor-glover.webp"
    },
    anousheh: {
        name: "Anousheh Ansari",
        role: "Flight Engineer",
        bio: "Anousheh Ansari is an Iranian American engineer and co-founder of Prodea Systems. Ansari was the fourth self-funded space tourist, the first self-funded woman to fly to the ISS, and the first Iranian in space.",
        image: "/assets/crew/image-anousheh-ansari.png",
        imageWebp: "/assets/crew/image-anousheh-ansari.webp"
    }
};

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
