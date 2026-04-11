document.addEventListener("DOMContentLoaded", () => {
  const scribble = document.querySelector(".hero-scribble");
  const menuToggle = document.querySelector(".menu-toggle");
  const header = document.querySelector(".hero-header");

  if (scribble) {
    requestAnimationFrame(() => {
      scribble.classList.add("animate");
    });
  }

  if (menuToggle && header) {
    menuToggle.addEventListener("click", () => {
      header.classList.toggle("mobile-open");
    });
  }
});

document.addEventListener("DOMContentLoaded", () => {
  const reveals = document.querySelectorAll(".reveal");
  const menuToggle = document.querySelector(".menu-toggle");
  const nav = document.querySelector(".courses-nav");
  const actions = document.querySelector(".courses-actions");

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry, index) => {
        if (entry.isIntersecting) {
          setTimeout(() => {
            entry.target.classList.add("show");
          }, index * 120);
        }
      });
    },
    {
      threshold: 0.18
    }
  );

  reveals.forEach((item) => observer.observe(item));

  if (menuToggle && nav && actions) {
    menuToggle.addEventListener("click", () => {
      nav.classList.toggle("mobile-show");
      actions.classList.toggle("mobile-show");
    });
  }
});

const faqItems = document.querySelectorAll(".faq-item");

faqItems.forEach((item) => {
  const button = item.querySelector(".faq-question");

  button.addEventListener("click", () => {
    item.classList.toggle("active");
  });
});