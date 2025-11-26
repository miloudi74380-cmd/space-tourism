// Données des membres d'équipage (récupérées depuis la base de données)
const getCrewMembers = () => {
    return window.crewData || {};
};

// Get current locale from HTML lang attribute
const getLocale = () => {
    return document.documentElement.lang || 'en';
};

// Get crew member role in current locale
const getCrewRole = (crew) => {
    const locale = getLocale();
    return crew[`role_${locale}`] || crew.role_en;
};

// Get crew member bio in current locale
const getCrewBio = (crew) => {
    const locale = getLocale();
    return crew[`bio_${locale}`] || crew.bio_en;
};

const crewMembers = getCrewMembers();

// Fonction pour changer de membre d'équipage
function changeCrew(crewId) {
    const crew = crewMembers[crewId];

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
        crewRole.textContent = getCrewRole(crew);
    }

    // Mettre à jour le nom
    const crewName = document.getElementById('crew-name');
    if (crewName) {
        crewName.textContent = crew.name;
    }

    // Mettre à jour la biographie
    const crewBio = document.getElementById('crew-bio');
    if (crewBio) {
        crewBio.textContent = getCrewBio(crew);
    }

    // Mettre à jour les dots actifs
    document.querySelectorAll('[data-crew]').forEach(dot => {
        const isActive = dot.dataset.crew == crewId;

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
            const crewId = this.dataset.crew;
            changeCrew(crewId);
        });
    });

    // Charger le premier membre d'équipage par défaut
    const firstCrewButton = document.querySelector('[data-crew]');
    if (firstCrewButton) {
        const firstCrewId = firstCrewButton.dataset.crew;
        changeCrew(firstCrewId);
    }
});
