// Données des technologies (récupérées depuis la base de données)
const getTechnologies = () => {
    return window.technologiesData || {};
};

// Get current locale from HTML lang attribute
const getLocale = () => {
    return document.documentElement.lang || 'en';
};

// Get technology name in current locale
const getTechName = (tech) => {
    const locale = getLocale();
    return tech[`name_${locale}`] || tech.name_en;
};

// Get technology description in current locale
const getTechDescription = (tech) => {
    const locale = getLocale();
    return tech[`description_${locale}`] || tech.description_en;
};

const technologies = getTechnologies();

// Fonction pour changer de technologie
function changeTechnology(techId) {
    const tech = technologies[techId];

    if (!tech) return;

    // Mettre à jour les images (landscape et portrait)
    const techImageLandscape = document.getElementById('tech-image-landscape');
    if (techImageLandscape) {
        techImageLandscape.src = tech.image_landscape;
        techImageLandscape.alt = getTechName(tech);
    }

    const techImagePortrait = document.getElementById('tech-image-portrait');
    if (techImagePortrait) {
        techImagePortrait.src = tech.image_portrait;
        techImagePortrait.alt = getTechName(tech);
    }

    // Mettre à jour le nom
    const techName = document.getElementById('tech-name');
    if (techName) {
        techName.textContent = getTechName(tech);
    }

    // Mettre à jour la description
    const techDescription = document.getElementById('tech-description');
    if (techDescription) {
        techDescription.textContent = getTechDescription(tech);
    }

    // Mettre à jour les boutons actifs
    document.querySelectorAll('[data-tech]').forEach(button => {
        const isActive = button.dataset.tech == techId;

        if (isActive) {
            button.classList.remove('border-white/25', 'bg-transparent', 'text-white');
            button.classList.add('border-white', 'bg-white', 'text-[#0B0D17]');
        } else {
            button.classList.remove('border-white', 'bg-white', 'text-[#0B0D17]');
            button.classList.add('border-white/25', 'bg-transparent', 'text-white');
        }
    });
}

// Initialisation au chargement de la page
document.addEventListener('DOMContentLoaded', function() {
    // Ajouter les événements de clic sur les boutons
    document.querySelectorAll('[data-tech]').forEach(button => {
        button.addEventListener('click', function() {
            const techId = this.dataset.tech;
            changeTechnology(techId);
        });
    });

    // Charger la première technologie par défaut
    const firstTechButton = document.querySelector('[data-tech]');
    if (firstTechButton) {
        const firstTechId = firstTechButton.dataset.tech;
        changeTechnology(firstTechId);
    }
});
