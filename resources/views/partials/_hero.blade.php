<div x-data="carousel" class="relative">
    <img class="h-96 w-full object-cover object-center shadow-md" :src="images[selected]" @mouseover="clearInterval(slideTimer)" @mouseout="init()" alt="mountains" />
    <div class="absolute bottom-0 w-full p-4 flex justify-center space-x-2">
        <template x-for="(image, index) in images" :key="index">
            <button @click="selected = index" :class="{'bg-gray-300': selected == index, 'bg-gray-500': selected != index}" class="h-2 w-2 rounded-full hover:bg-gray-300 ring-2 ring-gray-300"></button>
        </template>
    </div>
</div>

@push('scripts')
<script>
const carousel = () => {
    return {
        selected: 0,
        slideTimer: 0,
        init() {
             this.slideTimer = setInterval(() => {
                if (this.selected >= this.images.length-1) {
                    this.selected = 0
                } else {
                    this.selected++
                }
            }, 8000)
        },
        images: [
            "/images/hero/1.png",
            "/images/hero/2.png",
            "/images/hero/3.png",
            "/images/hero/4.png",
            "/images/hero/5.png"
        ]
    }
}
</script>
@endpush