document.addEventListener("DOMContentLoaded", () => {
    if (window.location.pathname === "/", "accueil") {
      confetti({
        origin: {
          x: 0.1,
          y: 0.9,
        },
        particleCount: 700,
        zIndex: 1,
        spread: 100,
        ticks: 500,
      });
      confetti({
        origin: {
          x: 0.9,
          y: 0.9,
        },
        particleCount: 700,
        zIndex: 1,
        spread: 100,
        ticks: 500,
      });
    }
  });