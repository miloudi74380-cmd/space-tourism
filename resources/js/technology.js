// Données des technologies
const technologies = {
    launch: {
        name: "Launch vehicle",
        description: "A launch vehicle or carrier rocket is a rocket-propelled vehicle used to carry a payload from Earth's surface to space, usually to Earth orbit or beyond. Our WEB-X carrier rocket is the most powerful in operation. Standing 150 metres tall, it's quite an awe-inspiring sight on the launch pad!",
        imageLandscape: "/assets/technology/image-launch-vehicle-landscape.jpg",
        imagePortrait: "/assets/technology/image-launch-vehicle-portrait.jpg"
    },
    spaceport: {
        name: "Spaceport",
        description: "A spaceport or cosmodrome is a site for launching (or receiving) spacecraft, by analogy to the seaport for ships or airport for aircraft. Based in the famous Cape Canaveral, our spaceport is ideally situated to take advantage of the Earth's rotation for launch.",
        imageLandscape: "/assets/technology/image-spaceport-landscape.jpg",
        imagePortrait: "/assets/technology/image-spaceport-portrait.jpg"
    },
    capsule: {
        name: "Space capsule",
        description: "A space capsule is an often-crewed spacecraft that uses a blunt-body reentry capsule to reenter the Earth's atmosphere without wings. Our capsule is where you'll spend your time during the flight. It includes a space gym, cinema, and plenty of other activities to keep you entertained.",
        imageLandscape: "/assets/technology/image-space-capsule-landscape.jpg",
        imagePortrait: "/assets/technology/image-space-capsule-portrait.jpg"
    }
};

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
