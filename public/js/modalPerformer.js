document.addEventListener('DOMContentLoaded', function () {
    let currentOpenModal = null;

    document.querySelectorAll('[id^="modalOn_"]').forEach(btn => {
        btn.addEventListener("click", function() {
            let passageId = this.id.split("_")[1]; 
            let modalMockup = document.getElementById(`modalMockup_${passageId}`);
            let overlay = document.getElementById('modalOverlay');
            
            overlay.style.display = "block";
            
            if (currentOpenModal && currentOpenModal !== modalMockup) {
                currentOpenModal.style.display = "none";
            }
            
            modalMockup.style.display = "grid";
            
            currentOpenModal = modalMockup;
        });
    });

    document.getElementById('modalOff').addEventListener("click", function() {
        let overlay = document.getElementById('modalOverlay');
        
        if (currentOpenModal) {
            currentOpenModal.style.display = "none";
            currentOpenModal = null;
        }
        
        overlay.style.display = "none";
    });
});
