import { gsap } from 'gsap';

import { GSDevTools } from 'gsap/GSDevTools';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import { ScrollSmoother } from 'gsap/ScrollSmoother';

gsap.registerPlugin(GSDevTools, ScrollTrigger, ScrollSmoother);

export { gsap, GSDevTools, ScrollTrigger, ScrollSmoother };
