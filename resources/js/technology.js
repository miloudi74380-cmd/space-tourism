// Données des technologies (récupérées depuis les traductions Laravel)
const getTechnologies = () => {
    const trans = window.translations?.technologies || {};
    return {
        launch: {
            name: trans.launch?.name || "Launch vehicle",
            description: trans.launch?.description || "",
            imageLandscape: "/assets/technology/image-launch-vehicle-landscape.jpg",
            imagePortrait: "/assets/technology/image-launch-vehicle-portrait.jpg"
        },
        spaceport: {
            name: trans.spaceport?.name || "Spaceport",
            description: trans.spaceport?.description || "",
            imageLandscape: "/assets/technology/image-spaceport-landscape.jpg",
            imagePortrait: "/assets/technology/image-spaceport-portrait.jpg"
        },
        capsule: {
            name: trans.capsule?.name || "Space capsule",
            description: trans.capsule?.description || "",
            imageLandscape: "/assets/technology/image-space-capsule-landscape.jpg",
            imagePortrait: "/assets/technology/image-space-capsule-portrait.jpg"
        }
    };
};

const technologies = getTechnologies();

// Fonction pour changer de technologie
function changeTechnology(techKey) {
    const tech = technologies[techKey];

    if (!tech) return;

    // Mettre à jour les images (landscape et portrait)
    const techImageLandscape = document.getElementById('tech-image-landscape');
    if (techImageLandscape) {
        techImageLandscape.src = tech.imageLandscape;
        techImageLandscape.alt = tech.name;
    }

    const techImagePortrait = document.getElementById('tech-image-portrait');
    if (techImagePortrait) {
        techImagePortrait.src = tech.imagePortrait;
        techImagePortrait.alt = tech.name;
    }

    // Mettre à jour le nom
    const techName = document.getElementById('tech-name');
    if (techName) {
        techName.textContent = tech.name;
    }

    // Mettre à jour la description
    const techDescription = document.getElementById('tech-description');
    if (techDescription) {
        techDescription.textContent = tech.description;
    }

    // Mettre à jour les boutons actifs
    document.querySelectorAll('[data-tech]').forEach(button => {
        const isActive = button.dataset.tech === techKey;

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
            const techKey = this.dataset.tech;
            changeTechnology(techKey);
        });
    });

    // Charger la première technologie (Launch vehicle) par défaut
    changeTechnology('launch');
});
