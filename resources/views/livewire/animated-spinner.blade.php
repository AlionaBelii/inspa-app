<div
    x-data="{}"
    x-init="
        if (typeof gsap === 'undefined') {
            console.error('GSAP is not loaded. Please ensure the script is in layout.blade.php');
            return;
        }
        $nextTick(() => {
            const svg1 = document.getElementById('animated-svg-1');
            const svg2 = document.getElementById('animated-svg-2');

            if (!svg1 || !svg2) {
                console.error('One or both animated SVG elements not found in DOM.');
                return;
            }

            gsap.to(svg1,
            {
                rotation: 360,
                duration: 15, 
                ease: 'none',
                repeat: -1,
                transformOrigin: 'center center'
            });
            
            gsap.to(svg2,
            {
                rotation: -360,
                duration: 10, 
                ease: 'none',
                repeat: -1,
                transformOrigin: 'center center'
            });
        });
    "
    class="relative w-[200px] h-[200px] md:w-[500px] md:h-[500px] mx-auto overflow-hidden"
>

    <div id="animated-svg-1" class="absolute inset-0">
        <img src="{{ asset('storage/blob.svg') }}" class="w-full h-full" alt="">
    </div>
    
    <div id="animated-svg-2" class="absolute inset-0">
        <img src="{{ asset('storage/looper.svg') }}" class="w-full h-full" alt="">
    </div>

</div>
