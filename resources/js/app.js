import './bootstrap';
 



// Modal
document.addEventListener('DOMContentLoaded', () => {
    // Select all open and close buttons
    const openModalBtns = document.querySelectorAll('[open-target]');
    const closeModalBtns = document.querySelectorAll('[close-target]');
 


    // Function to open a modal
    const openModal = (modalId) => {
        const modal = document.getElementById(modalId);
        if (modal) {
            modal.classList.remove('hidden');
        }
    };
    
    // Function to close a modal
    const closeModal = (modalId) => {
        const modal = document.getElementById(modalId);
 
        if (modal) {
            modal.classList.add('hidden');
        }
    };
    
 

 

    // Add event listeners to open modal buttons
    openModalBtns.forEach(button => {
        button.addEventListener('click', (e) => {
            const modalId = button.getAttribute('open-target');
            openModal(modalId);
        });
    });

    
    // Add event listeners to close modal buttons
    closeModalBtns.forEach(button => {
        button.addEventListener('click', (e) => {
            const modalId = button.getAttribute('close-target');
            closeModal(modalId);
        });
    });
});