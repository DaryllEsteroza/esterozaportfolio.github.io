const container = document.querySelector('.conproj');

// Update this line to target div elements with the correct class
const sections = gsap.utils.toArray('.conproj .my-div');
const texts = gsap.utils.toArray('.anim');
const mask = document.querySelector('.mask');

let scrollTween = gsap.to(sections, {
    xPercent: -100 * (sections.length - 1),
    ease: "none",
    scrollTrigger: {
        trigger: ".conproj",
        pin: true,
        scrub: 1,
        end: "+=3000"
    }
});

gsap.to(mask, {
    width: "100%",
    scrollTrigger: {
        trigger: ".wrapper",
        start: "top left",
        scrub: 1
    }
});




//
