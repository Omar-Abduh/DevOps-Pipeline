    document.addEventListener("DOMContentLoaded", () => {
        // Register GSAP plugins
        gsap.registerPlugin(CustomEase);
        CustomEase.create(
            "hop",
            "M0,0 C0.354,0 0.464,0.133 0.498,0.502 0.532,0.872 0.651,1 1,1"
        );

        // Get DOM elements
        const menuToggle = document.querySelector(".menu-toggle");
        const menu = document.querySelector(".menu");
        const links = document.querySelectorAll(".link");
        const socialLinks = document.querySelectorAll(".socials p");
        const videoWrapper = document.querySelector(".video-wrapper");
        const mainLogo = document.querySelector(".logo:not(.menu-logo)");
        const themeToggle = document.querySelector('.theme-switch input');
        let isAnimating = false;

        // Handle iOS safari viewport height issues
        const setViewportHeight = () => {
            let vh = window.innerHeight * 0.01;
            document.documentElement.style.setProperty('--vh', `${vh}px`);
        };

        window.addEventListener('resize', setViewportHeight);
        window.addEventListener('orientationchange', setViewportHeight);
        setViewportHeight();

        // Theme toggle functionality with localStorage
        const currentTheme = localStorage.getItem('theme');
        if (currentTheme === 'light') {
            document.body.classList.add('light-theme');
            themeToggle.checked = true;
        }

        themeToggle.addEventListener('change', () => {
            document.body.classList.toggle('light-theme');
            localStorage.setItem('theme', document.body.classList.contains('light-theme') ? 'light' : 'dark');
        });

        // Initial states
        gsap.set(links, { y: 30, opacity: 0 });
        gsap.set(socialLinks, { y: 30, opacity: 0 });
        gsap.set(videoWrapper, {
            clipPath: "polygon(0% 100%, 100% 100%, 100% 100%, 0% 100%)"
        });
        gsap.set(".menu .header h1 span", {
            y: 100,
            rotateY: 90,
            scale: 0.75,
            opacity: 0
        });

        // Split text function
        const splitTextIntoSpans = (selector) => {
            let elements = document.querySelectorAll(selector);
            elements.forEach((element) => {
                let text = element.innerText;
                let splitText = text
                    .split("")
                    .map(function (char) {
                        return `<span>${char === " " ? "&nbsp;" : char}</span>`;
                    })
                    .join("");
                element.innerHTML = splitText;
            });
        };

        // Split the header text
        splitTextIntoSpans(".menu .header h1");
        splitTextIntoSpans(".hero-header h1");



        
        // Close menu animation function
        const closeMenu = () => {
            return new Promise((resolve) => {
                if (!menuToggle.classList.contains("opened")) {
                    resolve();
                    return;
                }

                menuToggle.classList.remove("opened");
                menuToggle.classList.add("closed");
                document.body.classList.remove('menu-open');

                const tl = gsap.timeline({
                    onComplete: () => {
                        menu.style.pointerEvents = "none";
                        isAnimating = false;
                        resolve();
                    }
                });

                tl.to(".menu .header h1 span", {
                    y: 100,
                    rotateY: 90,
                    scale: 0.75,
                    opacity: 0,
                    stagger: 0.02,
                    duration: 0.5,
                    ease: "power3.in"
                })
                .to(socialLinks, {
                    y: 30,
                    opacity: 0,
                    stagger: 0.03,
                    duration: 0.5,
                    ease: "power3.in"
                }, "-=0.6")
                .to(links, {
                    y: 30,
                    opacity: 0,
                    stagger: 0.05,
                    duration: 0.5,
                    ease: "power3.in"
                }, "-=0.4")
                .to(videoWrapper, {
                    clipPath: "polygon(0% 100%, 100% 100%, 100% 100%, 0% 100%)",
                    duration: 0.5,
                    ease: "power3.inOut"
                }, "-=0.3")
                .to(menu, {
                    clipPath: "polygon(0% 100%, 100% 100%, 100% 100%, 0% 100%)",
                    duration: 0.6,
                    ease: "power3.inOut"
                }, "-=0.6");
            });
        };

        // Smooth scroll function with improved handling
        const smoothScroll = (target, duration = 1000) => {
            const targetPosition = target.getBoundingClientRect().top + window.pageYOffset;
            const startPosition = window.pageYOffset;
            const distance = targetPosition - startPosition;
            
            gsap.to(window, {
                duration: duration / 1000,
                scrollTo: targetPosition,
                ease: "power2.inOut",
                onComplete: () => {
                    // Ensure menu state is cleaned up
                    document.body.classList.remove('menu-open');
                    isAnimating = false;
                }
            });
        };
        
        // Add click event listeners to navigation links
        links.forEach(link => {
            link.addEventListener('click', async (e) => {
                e.preventDefault();
                if (isAnimating) return;
                
                const href = link.querySelector('a').getAttribute('href').substring(1);
                const targetSection = document.getElementById(href);
                
                if (targetSection) {
                    isAnimating = true;
                    await closeMenu();
                    smoothScroll(targetSection);
                }
            });
        });

        // Menu toggle click handler
        menuToggle.addEventListener("click", () => {
            if (isAnimating) return;
            isAnimating = true;

            if (menuToggle.classList.contains("closed")) {
                menuToggle.classList.remove("closed");
                menuToggle.classList.add("opened");
                document.body.classList.add('menu-open');

                const tl = gsap.timeline({
                    onComplete: () => {
                        isAnimating = false;
                    }
                });

                tl.to(menu, {
                    clipPath: "polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%)",
                    duration: 0.9,
                    ease: "hop",
                    onStart: () => {
                        menu.style.pointerEvents = "all";
                    }
                })
                .to(videoWrapper, {
                    clipPath: "polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%)",
                    duration: 0.8,
                    ease: "hop"
                }, "-=0.3")
                .to(links, {
                    y: 0,
                    opacity: 1,
                    stagger: 0.1,
                    duration: 0.7,
                    ease: "power3.out"
                }, "-=0.5")
                .to(socialLinks, {
                    y: 0,
                    opacity: 1,
                    stagger: 0.05,
                    duration: 0.7,
                    ease: "power3.out"
                }, "-=0.7")
                .to(".menu .header h1 span", {
                    y: 0,
                    rotateY: 0,
                    scale: 1,
                    opacity: 1,
                    stagger: 0.03,
                    duration: 1,
                    ease: "power3.out"
                }, "-=0.9");
            } else {
                closeMenu();
            }
        });

        // Hero section animations
        const initAnimations = () => {
            const timeline = gsap.timeline({
                defaults: { ease: "power3.inOut" }
            });

            timeline
                .to(".hero-section-main", {
                    clipPath: "polygon(0% 100%, 100% 100%, 100% 0%, 0% 0%)",
                    duration: 2,
                    ease: "hop"
                })
                .to(".hero-section-main", {
                    transform: "translate(-50%, -50%) scale(1)",
                    duration: 2.25,
                    ease: "power3.inOut"
                }, "-=1.75")
                .to(".hero-overlay", {
                    clipPath: "polygon(0% 0%, 100% 0%, 100% 0%, 0% 0%)",
                    duration: 2,
                    ease: "hop"
                }, "-=1.5")
                .to(".hero-img img", {
                    scale: 1,
                    duration: 2.25,
                    ease: "power3.inOut"
                }, "-=1.75")
                .to(".hero-header h1 span", {
                    y: 0,
                    stagger: 0.05,
                    duration: 1.5,
                    ease: "power3.out"
                }, "-=1.25");
        };

        // Handle window resize
        window.addEventListener('resize', () => {
            if (window.innerWidth <= 900) {
                menu.style.height = `${window.innerHeight}px`;
            } else {
                menu.style.height = '100vh';
            }
        });

        // Check if user prefers reduced motion
        const prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

        if (!prefersReducedMotion) {
            initAnimations();
        } else {
            // Simple fade in for reduced motion preference
            gsap.to(".hero-section-main", {
                opacity: 1,
                duration: 0.5,
                clipPath: "polygon(0% 100%, 100% 100%, 100% 0%, 0% 0%)"
            });
        }

        // Prevent iOS bounce effect when menu is open
        document.body.addEventListener('touchmove', (e) => {
            if (document.body.classList.contains('menu-open')) {
                e.preventDefault();
            }
        }, { passive: false });
    });







