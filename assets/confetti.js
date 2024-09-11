document.addEventListener("DOMContentLoaded", () => {
    if (window.location.pathname === "/") {
      confetti({
        origin: {
          x: 0.1,
          y: 0.9,
        },
        particleCount: 800,
        zIndex: 1,
        spread: 120,
        ticks: 500,
      });
      confetti({
        origin: {
          x: 0.9,
          y: 0.9,
        },
        particleCount: 800,
        zIndex: 1,
        spread: 120,
        ticks: 500,
      });
    };
  });