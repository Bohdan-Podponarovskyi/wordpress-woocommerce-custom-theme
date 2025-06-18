import {gsap} from '../libs/gsap';

export const initSeatAnimation = () => {
    if (window.innerWidth < 1140) {
        return;
    }

    const wheelOffsetX = window.innerWidth > 1440 ? '60%' : '15%';

    const tl = gsap.timeline({
        scrollTrigger: {
            trigger: ".seat",
            start: "top top",
            end: "+=150%",
            pin: true,
            scrub: 1,
        }
    });

    tl.to(".seat__img-wrap", { // Scale the container instead
        scale: 0.3,
    }).to(".seat__img", {
        y: '-34%',
    }, '<').to(".wheel-left", {
        x: wheelOffsetX,
        scale: 0.7,
        opacity: 1,
    }).to(".wheel-right", {
        x: `-${wheelOffsetX}`,
        scale: 0.7,
        opacity: 1,
    }, "<");

    gsap.to(".seat__link", {
        scrollTrigger: {
            trigger: ".seat",
            start: "center center",
            end: "center center",
            scrub: 1,
        },
        y: '-96px',
        opacity: 1,
    });
}

export default initSeatAnimation;